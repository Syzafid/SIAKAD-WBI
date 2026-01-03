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
        // 2. Kelas pointing to Matakuliah
        $kelasData = [
            ['kode_kelas' => 'TRPL101-A', 'kode_mk' => 'TRPL101'],
            ['kode_kelas' => 'TRPL102-A', 'kode_mk' => 'TRPL102'],
            ['kode_kelas' => 'TRPL103-A', 'kode_mk' => 'TRPL103'],
            ['kode_kelas' => 'TRPL104-A', 'kode_mk' => 'TRPL104'],
            ['kode_kelas' => 'TRPL105-A', 'kode_mk' => 'TRPL105'],
        ];

        foreach ($kelasData as $kd) {
            $mk = \App\Models\Matakuliah::where('kode_mk', $kd['kode_mk'])->first();
            Kelas::updateOrCreate(
                ['kode_kelas' => $kd['kode_kelas'] . '-' . $activeSemester->semester_ajaran_id],
                [
                    'matakuliah_id' => $mk->matakuliah_id,
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
