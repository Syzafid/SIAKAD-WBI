<?php
use Illuminate\Support\Facades\Route;

/* halaman login */
Route::get('/', function () {
    return view('login');
});


Route::post('/login', function () {
    return redirect('/dashboard');
});

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// jadwal
Route::get('/jadwal', function () {
    return view('jadwal.index');
})->name('jadwal.index');

// KRS
Route::get('KRS', function () {
    return view('KRS.index');
})->name('KRS.index');

//Keberhasilan Studi
Route::get('keberhasilanStudi', function () {
    return view(('keberhasilanStudi.index'));
})->name('keberhasilanStudi.index');

// Konsultasi Nilai
Route::get('konsultasiNilai', function () {
    return view(('konsultasiNilai.index'));
})->name('konsultasiNilai.index');

// Kehadiran
Route::get('kehadiran', function () {
    return view(('kehadiran.index'));
})->name('kehadiran.index');

// profil Mahaiswa
Route::get('profilMahasiswa', function () {
    return view(('profilMahasiswa.index'));
})->name('profilMahasiswa.index');

// Kuliah Mahasiswa
Route::get('kuliahMahasiswa', function () {
    return view(('kuliahMahasiswa.index'));
})->name('kuliahMahasiswa.index');

// transfer Nilai
Route::get('nilaiTransfer', function () {
    return view(('nilaiTransfer.index'));
})->name('nilaiTransfer.index');

// 2023/2024 Ganjil
Route::get('2023-2024Ganjil', function () {
    return view(('2023-2024Ganjil.index'));
})->name('2023-2024Ganjil.index');

// 2023/2024 Genap
Route::get('2023-2024Genap', function () {
    return view(('2023-2024Genap.index'));
})->name('2023-2024Genap.index');

// 2024/2025 Ganjil
Route::get('2024-2025Ganjil', function () {
    return view(('2024-2025Ganjil.index'));
})->name('2024-2025Ganjil.index');

// 2024/2025 Genap
Route::get('2024-2025Genap', function () {
    return view(('2024-2025Genap.index'));
})->name('2024-2025Genap.index');

// Pengajuan Judul
Route::get('pengajuanJudul', function (){
    return view(('pengajuanJudul.index'));
})->name('pengajuanJudul.index');

