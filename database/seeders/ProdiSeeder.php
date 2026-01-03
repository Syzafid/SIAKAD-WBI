<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            [
                'kode_prodi' => 'MP',
                'nama_prodi' => 'Manajemen Pemasaran',
                'jenjang' => 'D3',
            ],
            [
                'kode_prodi' => 'AP',
                'nama_prodi' => 'Akuntansi & Perpajakan',
                'jenjang' => 'D4',
            ],
            [
                'kode_prodi' => 'AH',
                'nama_prodi' => 'Agricultur hortikultura',
                'jenjang' => 'D4',
            ],
            [
                'kode_prodi' => 'PKA',
                'nama_prodi' => 'Pengeloalaan kovensi dan acara',
                'jenjang' => 'D4',
            ],
            [
                'kode_prodi' => 'TRPL',
                'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'jenjang' => 'D4',
            ],
        ];

        foreach ($prodis as $prodi) {
            DB::table('prodi')->updateOrInsert(
                ['kode_prodi' => $prodi['kode_prodi']],
                [
                    'nama_prodi' => $prodi['nama_prodi'],
                    'jenjang' => $prodi['jenjang'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
