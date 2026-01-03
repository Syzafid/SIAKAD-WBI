<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matkuls = [
            // Semester 1
            ['kode_mk' => 'TRPL101', 'nama_mk' => 'Pemrograman Dasar', 'sks' => 3, 'semester_paket' => 1, 'deskripsi' => 'Dasar-dasar pemrograman menggunakan logika dan algoritma.'],
            ['kode_mk' => 'TRPL102', 'nama_mk' => 'Basis Data', 'sks' => 3, 'semester_paket' => 1, 'deskripsi' => 'Pengenalan sistem manajemen basis data.'],
            ['kode_mk' => 'TRPL103', 'nama_mk' => 'Matematika Diskrit', 'sks' => 2, 'semester_paket' => 1, 'deskripsi' => 'Matematika untuk ilmu komputer.'],
            ['kode_mk' => 'MKU101', 'nama_mk' => 'Pendidikan Agama', 'sks' => 2, 'semester_paket' => 1, 'deskripsi' => 'Pembentukan karakter melalui nilai agama.'],
            ['kode_mk' => 'MKU102', 'nama_mk' => 'Bahasa Inggris I', 'sks' => 2, 'semester_paket' => 1, 'deskripsi' => 'English for Academic Purposes.'],

            // Semester 2
            ['kode_mk' => 'TRPL104', 'nama_mk' => 'Struktur Data', 'sks' => 3, 'semester_paket' => 2, 'deskripsi' => 'Implementasi struktur data dalam pemrograman.'],
            ['kode_mk' => 'TRPL105', 'nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'semester_paket' => 2, 'deskripsi' => 'Dasar-dasar jaringan komputer dan protokol.'],
            ['kode_mk' => 'TRPL106', 'nama_mk' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'semester_paket' => 2, 'deskripsi' => 'Konsep OOP menggunakan Java/C#.'],
            ['kode_mk' => 'MKU103', 'nama_mk' => 'Pancasila', 'sks' => 2, 'semester_paket' => 2, 'deskripsi' => 'Ideologi negara Republik Indonesia.'],
            ['kode_mk' => 'MKU104', 'nama_mk' => 'Bahasa Indonesia', 'sks' => 2, 'semester_paket' => 2, 'deskripsi' => 'Tata bahasa Indonesia yang baik dan benar.'],

            // Semester 3
            ['kode_mk' => 'TRPL201', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester_paket' => 3, 'deskripsi' => 'Dasar-dasar pengembangan web (HTML, CSS, JS).'],
            ['kode_mk' => 'TRPL202', 'nama_mk' => 'Sistem Operasi', 'sks' => 3, 'semester_paket' => 3, 'deskripsi' => 'Manajemen proses, memori, dan storage.'],
            ['kode_mk' => 'TRPL203', 'nama_mk' => 'Arsitektur Komputer', 'sks' => 2, 'semester_paket' => 3, 'deskripsi' => 'Struktur dan organisasi komputer.'],
            ['kode_mk' => 'TRPL204', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester_paket' => 3, 'deskripsi' => 'Metodologi pengembangan software.'],

            // Semester 4
            ['kode_mk' => 'TRPL205', 'nama_mk' => 'Pemrograman Mobile', 'sks' => 3, 'semester_paket' => 4, 'deskripsi' => 'Pengembangan aplikasi Android/iOS.'],
            ['kode_mk' => 'TRPL206', 'nama_mk' => 'Manajemen Proyek TI', 'sks' => 2, 'semester_paket' => 4, 'deskripsi' => 'Pengelolaan proyek perangkat lunak.'],
            ['kode_mk' => 'TRPL207', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'semester_paket' => 4, 'deskripsi' => 'Konsep dasar AI dan Machine Learning.'],
            ['kode_mk' => 'TRPL208', 'nama_mk' => 'Keamanan Informasi', 'sks' => 3, 'semester_paket' => 4, 'deskripsi' => 'Kriptografi dan keamanan jaringan.'],

            // Semester 5
            ['kode_mk' => 'TRPL301', 'nama_mk' => 'Cloud Computing', 'sks' => 3, 'semester_paket' => 5, 'deskripsi' => 'Infrastruktur dan layanan cloud.'],
            ['kode_mk' => 'TRPL302', 'nama_mk' => 'Analisis Data', 'sks' => 3, 'semester_paket' => 5, 'deskripsi' => 'Pengolahan dan visualisasi data Big Data.'],
            ['kode_mk' => 'TRPL303', 'nama_mk' => 'Interaksi Manusia & Komputer', 'sks' => 2, 'semester_paket' => 5, 'deskripsi' => 'Desain UI/UX yang user-friendly.'],
            ['kode_mk' => 'TRPL304', 'nama_mk' => 'Kewirausahaan TI', 'sks' => 2, 'semester_paket' => 5, 'deskripsi' => 'Bisnis dan stratup di bidang teknologi.'],

            // Semester 6
            ['kode_mk' => 'TRPL305', 'nama_mk' => 'Kerja Praktek', 'sks' => 4, 'semester_paket' => 6, 'deskripsi' => 'Magang industri selama 1 semester.'],
            ['kode_mk' => 'TRPL306', 'nama_mk' => 'Etika Profesi TI', 'sks' => 2, 'semester_paket' => 6, 'deskripsi' => 'Etika dan hukum dalam dunia teknologi.'],
            ['kode_mk' => 'TRPL307', 'nama_mk' => 'Metodologi Penelitian', 'sks' => 2, 'semester_paket' => 6, 'deskripsi' => 'Persiapan tugas akhir/skripsi.'],

            // Semester 7
            ['kode_mk' => 'TRPL401', 'nama_mk' => 'Tugas Akhir I / Pre-Skripsi', 'sks' => 2, 'semester_paket' => 7, 'deskripsi' => 'Proposal dan perancangan sistem TA.'],
            ['kode_mk' => 'TRPL402', 'nama_mk' => 'Audit Teknologi Informasi', 'sks' => 3, 'semester_paket' => 7, 'deskripsi' => 'Prosedur pemeliharaan dan audit sistem.'],
        ];

        foreach ($matkuls as $mk) {
            Matakuliah::updateOrCreate(['kode_mk' => $mk['kode_mk']], $mk);
        }
    }
}
