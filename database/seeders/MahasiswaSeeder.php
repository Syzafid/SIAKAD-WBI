<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $userId = DB::table('users')
                ->where('email', 'mahasiswa@gmail.com')
                ->value('id');

            if (!$userId) {
                throw new \Exception('User mahasiswa belum ada. Jalankan UserSeeder dulu.');
            }


            // 2. PRODI
            $prodiId = DB::table('prodi')->insertGetId([
                'kode_prodi' => 'TI',
                'nama_prodi' => 'Teknik Informatika',
                'jenjang' => 'S1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 3. WILAYAH (kelurahan dummy)
            $wilayahProvinsi = DB::table('wilayah')->insertGetId([
                'nama' => 'Jawa Barat',
                'tipe' => 'provinsi',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $wilayahKabupaten = DB::table('wilayah')->insertGetId([
                'nama' => 'Bandung',
                'tipe' => 'kabupaten',
                'parent_id' => $wilayahProvinsi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $wilayahKecamatan = DB::table('wilayah')->insertGetId([
                'nama' => 'Coblong',
                'tipe' => 'kecamatan',
                'parent_id' => $wilayahKabupaten,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $wilayahKelurahan = DB::table('wilayah')->insertGetId([
                'nama' => 'Dago',
                'tipe' => 'kelurahan',
                'parent_id' => $wilayahKecamatan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 4. DOSEN (wali)
            $dosenUserId = DB::table('users')
                ->where('email', 'dosen@gmail.com')
                ->value('id');

            if (!$dosenUserId) {
                throw new \Exception('User dosen belum ada.');
            }


            $dosenId = DB::table('dosen')->insertGetId([
                'user_id' => $dosenUserId,
                'nip' => '1987654321',
                'nama' => 'Dr. Dosen Wali',
                'prodi_id' => $prodiId,
                'is_wali' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 5. MAHASISWA
            DB::table('mahasiswa')->insert([
                'user_id' => $userId,
                'npm' => '2023010001',
                'nama' => 'Rajif Fandi',
                'angkatan' => 2023,
                'semester_sekarang' => 3,
                'prodi_id' => $prodiId,
                'wilayah_id' => $wilayahKelurahan,
                'dosen_wali_id' => $dosenId,
                'ukt_nominal' => 4500000,
                'status_beasiswa' => '0%',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
