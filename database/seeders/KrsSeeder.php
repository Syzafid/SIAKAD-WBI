<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\SemesterAjaran;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\KrsDetail;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Semester Ajaran
        $semesters = [
            ['tahun_ajaran' => '2023/2024', 'semester' => 'ganjil', 'is_active' => false],
            ['tahun_ajaran' => '2023/2024', 'semester' => 'genap', 'is_active' => false],
            ['tahun_ajaran' => '2024/2025', 'semester' => 'ganjil', 'is_active' => false],
            ['tahun_ajaran' => '2024/2025', 'semester' => 'genap', 'is_active' => false],
            ['tahun_ajaran' => '2025/2026', 'semester' => 'ganjil', 'is_active' => true],
        ];

        foreach ($semesters as $sem) {
            SemesterAjaran::updateOrCreate(
                ['tahun_ajaran' => $sem['tahun_ajaran'], 'semester' => $sem['semester']],
                ['is_active' => $sem['is_active']]
            );
        }

        $activeSemester = SemesterAjaran::where('is_active', true)->first();
        $trplProdi = Prodi::where('kode_prodi', 'TRPL')->first();

        // 2. Mata Kuliah/Kelas
        $kelasData = [
            ['kode_kelas' => 'TRPL101', 'nama_matakuliah' => 'Pemrograman Dasar', 'sks' => 3],
            ['kode_kelas' => 'TRPL102', 'nama_matakuliah' => 'Basis Data', 'sks' => 3],
            ['kode_kelas' => 'TRPL103', 'nama_matakuliah' => 'Matematika Diskrit', 'sks' => 2],
            ['kode_kelas' => 'TRPL104', 'nama_matakuliah' => 'Struktur Data', 'sks' => 3],
            ['kode_kelas' => 'TRPL105', 'nama_matakuliah' => 'Jaringan Komputer', 'sks' => 3],
        ];

        foreach ($kelasData as $kd) {
            Kelas::updateOrCreate(
                ['kode_kelas' => $kd['kode_kelas']],
                [
                    'nama_matakuliah' => $kd['nama_matakuliah'],
                    'sks' => $kd['sks'],
                    'prodi_id' => $trplProdi->prodi_id,
                    'semester_ajaran_id' => $activeSemester->semester_ajaran_id
                ]
            );
        }

        // 3. KRS for student Syafrizal
        $mahasiswa = Mahasiswa::where('nama', 'Rajif Fandi')->first(); // Corrected from Syafrizal alias in Seeder

        if ($mahasiswa) {
            $krs = Krs::updateOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                    'semester_ajaran_id' => $activeSemester->semester_ajaran_id
                ],
                [
                    'status' => 'final',
                    'total_sks' => 14,
                    'tanggal_pengajuan' => now(),
                    'tanggal_validasi' => now(),
                ]
            );

            // 4. KRS Details
            $allKelas = Kelas::all();
            foreach ($allKelas as $kls) {
                KrsDetail::updateOrCreate(
                    [
                        'krs_id' => $krs->krs_id,
                        'kelas_id' => $kls->kelas_id
                    ],
                    [
                        'tipe_pengambilan' => 'normal',
                        'status' => 'diambil'
                    ]
                );
            }
        }
    }
}
