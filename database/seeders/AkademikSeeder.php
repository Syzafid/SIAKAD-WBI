<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\KurikulumMatkul;
use App\Models\PrasyaratMatkul;
use App\Models\Nilai;
use App\Models\Khs;
use App\Models\KhsDetail;
use App\Models\Jadwal;
use App\Models\DosenPengampu;
use App\Models\Pertemuan;
use App\Models\Presensi;
use App\Models\PembayaranUkt;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\SemesterAjaran;
use App\Models\User;

class AkademikSeeder extends Seeder
{
    public function run(): void
    {
        $prodi = Prodi::where('kode_prodi', 'TRPL')->first();
        $user = User::where('role', 'dosen')->first(); 
        $mahasiswa = Mahasiswa::first();
        $dosen = Dosen::first();

        // 1. Kurikulum
        $kurikulum = Kurikulum::updateOrCreate(
            ['nama_kurikulum' => 'Kurikulum TRPL 2024'],
            [
                'prodi_id' => $prodi->prodi_id,
                'tahun_berlaku' => 2024,
                'created_by' => $user->id
            ]
        );

        // 2. Kurikulum Matkul & Kelas Setup
        $matkuls = Matakuliah::all();
        foreach ($matkuls as $mk) {
            KurikulumMatkul::updateOrCreate(
                ['kurikulum_id' => $kurikulum->kurikulum_id, 'matkul_id' => $mk->matakuliah_id],
                [
                    'semester_ke' => $mk->semester_paket ?? 1,
                    'tipe_semester' => ($mk->semester_paket % 2 == 0) ? 'genap' : 'ganjil',
                    'wajib' => true
                ]
            );
        }

        // 3. Populate KHS for multiple semesters (Semester 1, 2, & 3)
        // Current student is in semester 3, but let's assume they've finished 3 semesters for visual impact.
        $semesters = SemesterAjaran::orderBy('semester_ajaran_id', 'asc')->take(3)->get();
        
        $cumulativeSks = 0;
        $cumulativePoints = 0;

        foreach ($semesters as $index => $sem) {
            $semesterNum = $index + 1;
            $matkulsInSemester = Matakuliah::where('semester_paket', $semesterNum)->get();
            
            $semesterSks = 0;
            $semesterPoints = 0;

            $khs = Khs::updateOrCreate(
                ['mahasiswa_id' => $mahasiswa->mahasiswa_id, 'semester_ajaran_id' => $sem->semester_ajaran_id],
                [
                    'total_sks' => 0, // placeholder
                    'total_bobot' => 0, // placeholder
                    'ip' => 0, // placeholder
                    'ipk' => 0, // placeholder
                    'nasehat' => 'Tetap semangat, perbaiki nilai yang masih kurang di semester ini. Jangan lupa konsultasi dengan dosen wali.',
                    'show_nasehat' => true
                ]
            );

            foreach ($matkulsInSemester as $mkIdx => $mk) {
                // Introduce some failing grades for testing
                if ($semesterNum == 2 && $mkIdx == 0) {
                    $bobot = 1.0; // D
                    $nilaiHuruf = 'D';
                } elseif ($semesterNum == 2 && $mkIdx == 1) {
                    $bobot = 0.0; // E
                    $nilaiHuruf = 'E';
                } else {
                    $gradePoints = [4.0, 3.75, 3.5, 3.0, 2.75]; // A, A-, B+, B, B-
                    $bobot = $gradePoints[array_rand($gradePoints)];
                    
                    $nilaiHuruf = 'B';
                    if ($bobot == 4.0) $nilaiHuruf = 'A';
                    elseif ($bobot == 3.75) $nilaiHuruf = 'A-';
                    elseif ($bobot == 3.5) $nilaiHuruf = 'B+';
                    elseif ($bobot == 3.0) $nilaiHuruf = 'B';
                    elseif ($bobot == 2.75) $nilaiHuruf = 'B-';
                }

                KhsDetail::updateOrCreate(
                    ['khs_id' => $khs->khs_id, 'matakuliah_id' => $mk->matakuliah_id],
                    [
                        'sks' => $mk->sks,
                        'nilai_angka' => $bobot * 25, // simple mapping
                        'nilai_huruf' => $nilaiHuruf,
                        'bobot' => $bobot
                    ]
                );

                $semesterSks += $mk->sks;
                $semesterPoints += ($bobot * $mk->sks);

                // Initialize Nilai record too
                // Find or create a class for this matkul in this semester
                $kelas = Kelas::updateOrCreate(
                    ['matakuliah_id' => $mk->matakuliah_id, 'prodi_id' => $prodi->prodi_id, 'semester_ajaran_id' => $sem->semester_ajaran_id],
                    ['kode_kelas' => $mk->kode_mk . '-A-' . $sem->semester_ajaran_id]
                );

                Nilai::updateOrCreate(
                    ['mahasiswa_id' => $mahasiswa->mahasiswa_id, 'kelas_id' => $kelas->kelas_id],
                    [
                        'dosen_id' => $dosen->dosen_id,
                        'nilai_angka' => $bobot * 25,
                        'nilai_huruf' => $nilaiHuruf,
                        'bobot' => $bobot,
                        'status_kunci' => true
                    ]
                );
            }

            $cumulativeSks += $semesterSks;
            $cumulativePoints += $semesterPoints;

            $khs->update([
                'total_sks' => $semesterSks,
                'total_bobot' => $semesterPoints,
                'ip' => $semesterPoints / $semesterSks,
                'ipk' => $cumulativePoints / $cumulativeSks
            ]);

            // Payment for this semester
            PembayaranUkt::updateOrCreate(
                ['mahasiswa_id' => $mahasiswa->mahasiswa_id, 'semester_ajaran_id' => $sem->semester_ajaran_id],
                [
                    'nominal' => 4500000,
                    'tanggal_bayar' => now()->subMonths((3 - $semesterNum) * 6),
                    'status' => 'lunas',
                    'metode' => 'Virtual Account'
                ]
            );
        }

        // 4. Seed Notifications
        \App\Models\Notifikasi::updateOrCreate(
            ['user_id' => $mahasiswa->user_id, 'judul' => 'KRS Disetujui'],
            [
                'pesan' => 'KRS Anda untuk semester 3 telah disetujui oleh dosen wali. Silakan cek jadwal perkuliahan.',
                'tipe' => 'krs',
                'is_read' => false,
                'link' => route('KRS.index')
            ]
        );

        \App\Models\Notifikasi::updateOrCreate(
            ['user_id' => $mahasiswa->user_id, 'judul' => 'Mata Kuliah Mengulang'],
            [
                'pesan' => 'Ada 2 mata kuliah dari semester 2 yang perlu Anda ambil kembali karena nilai di bawah C. Segera hubungi dosen wali.',
                'tipe' => 'info',
                'is_read' => false,
                'link' => route('KRS.create')
            ]
        );

        \App\Models\Notifikasi::updateOrCreate(
            ['user_id' => $mahasiswa->user_id, 'judul' => 'Pembayaran Terverifikasi'],
            [
                'pesan' => 'Pembayaran UKT Semester Ganjil 2024/2025 telah berhasil diverifikasi oleh tim keuangan.',
                'tipe' => 'pembayaran',
                'is_read' => true,
                'link' => '#'
            ]
        );
    }
}
