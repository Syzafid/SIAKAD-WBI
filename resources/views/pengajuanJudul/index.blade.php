@extends('layouts.app')

@section('content')


{{-- SKS Status Card --}}
<div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-2xl p-6 mb-6">
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg">
            <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm text-gray-600 mb-1">Status SKS Anda</p>
            <p class="text-lg font-semibold text-gray-800 mb-2">
                Jumlah SKS Anda masih di bawah 120 SKS 
                <span class="text-blue-600">(Jumlah SKS lulus = 82)</span>
            </p>
            <div class="flex items-center gap-6 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                    <span class="text-gray-700">SKS Terkumpul: <strong>82 SKS</strong></span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                    <span class="text-gray-700">SKS Dibutuhkan: <strong>120 SKS</strong></span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                    <span class="text-gray-700">Kurang: <strong>38 SKS</strong></span>
                </div>
            </div>
        </div>
        <div class="text-right">
            <div class="text-5xl font-bold text-blue-600">82</div>
            <p class="text-sm text-gray-600 mt-1">dari 120 SKS</p>
        </div>
    </div>

    {{-- Progress Bar --}}
    <div class="mt-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-semibold text-gray-700">Progress SKS</span>
            <span class="text-sm font-bold text-blue-600">68.3%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-4 rounded-full shadow-lg" style="width: 68.3%"></div>
        </div>
    </div>
</div>

{{-- Info Alert --}}
<div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border-2 border-yellow-300 rounded-2xl p-6 mb-6">
    <div class="flex items-start gap-4">
        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="flex-1">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Persyaratan Pengajuan Tugas Akhir</h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Minimal telah menyelesaikan <strong>120 SKS</strong> dengan status <strong>LULUS</strong></span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>IPK minimal <strong>2.50</strong> untuk dapat mengajukan judul</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Tidak memiliki tunggakan administrasi atau akademik</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Telah berkonsultasi dengan dosen pembimbing akademik</span>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- Action Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    {{-- Current Status --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-800">Status Pengajuan</h3>
                <p class="text-sm text-gray-500">Kondisi saat ini</p>
            </div>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4">
            <p class="text-red-800 font-semibold mb-2">❌ Belum Memenuhi Syarat</p>
            <p class="text-sm text-red-700">Anda belum dapat mengajukan judul tugas akhir karena SKS yang terkumpul masih kurang dari persyaratan minimal.</p>
        </div>
        <div class="space-y-2">
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-600">SKS Terkumpul</span>
                <span class="font-bold text-gray-800">82 / 120 SKS</span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-600">Kekurangan</span>
                <span class="font-bold text-red-600">38 SKS</span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-600">IPK Saat Ini</span>
                <span class="font-bold text-green-600">3.57</span>
            </div>
        </div>
    </div>

    {{-- Next Steps --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-800">Langkah Selanjutnya</h3>
                <p class="text-sm text-gray-500">Yang harus dilakukan</p>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                <div class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 mt-0.5">1</div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Selesaikan SKS yang tersisa</p>
                    <p class="text-xs text-gray-600 mt-1">Ambil dan selesaikan 38 SKS lagi untuk mencapai minimal 120 SKS</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                <div class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 mt-0.5">2</div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Konsultasi dengan Dosen PA</p>
                    <p class="text-xs text-gray-600 mt-1">Diskusikan rencana studi dan persiapan tugas akhir</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                <div class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 mt-0.5">3</div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Mulai riset topik</p>
                    <p class="text-xs text-gray-600 mt-1">Cari referensi dan tentukan area minat untuk tugas akhir</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Disabled Form Section --}}
<div class="bg-white rounded-2xl shadow-sm border-2 border-gray-300 overflow-hidden opacity-60">
    <div class="bg-gradient-to-r from-gray-100 to-gray-200 px-6 py-5 border-b border-gray-300">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Form Pengajuan Judul</h2>
                <p class="text-sm text-gray-600 mt-1">Formulir akan aktif setelah memenuhi syarat</p>
            </div>
            <span class="px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                Tidak Tersedia
            </span>
        </div>
    </div>

    <div class="p-6">
        <div class="text-center py-12">
            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Form Terkunci</h3>
            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                Anda perlu menyelesaikan minimal 120 SKS untuk dapat mengajukan judul tugas akhir. 
                Silakan fokus menyelesaikan mata kuliah yang tersisa terlebih dahulu.
            </p>
            <div class="inline-flex items-center gap-2 bg-gray-100 px-6 py-3 rounded-lg">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm text-gray-700">Estimasi: 2-3 semester lagi</span>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
<div class="mt-8 text-center text-sm text-gray-500 pb-6">
    <p>2025 Bagian Teknologi Informasi Wimar Bisnis Indonesia</p>
</div>

@endsection