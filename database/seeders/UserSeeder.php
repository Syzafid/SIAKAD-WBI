<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Mahasiswa
        User::updateOrCreate(
            ['email' => 'mahasiswa@gmail.com'],
            [
                'name' => 'Syafrizal',
                'password' => Hash::make('123456'),
                'role' => 'mahasiswa',
            ]
        );

        // Dosen
        User::updateOrCreate(
            ['email' => 'dosen@gmail.com'],
            [
                'name' => 'Rahmat',
                'password' => Hash::make('123456'),
                'role' => 'dosen',
            ]
        );
    }
}
