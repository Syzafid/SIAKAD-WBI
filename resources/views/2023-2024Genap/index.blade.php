@extends('layouts.app')

@section('content')



{{-- Action Bar --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 mb-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Semester</p>
            <p class="text-xl font-bold text-gray-800">2023/2024 Genap</p>
        </div>
        <button class="bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white px-6 py-2.5 rounded-lg font-semibold transition shadow-md flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>Download PDF</span>
        </button>
    </div>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
    {{-- Total Mata Kuliah --}}
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Total Mata Kuliah</p>
            <p class="text-4xl font-bold">9</p>
            <p class="text-xs opacity-75 mt-1">Semester ini</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- Total SKS --}}
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Total SKS</p>
            <p class="text-4xl font-bold">21</p>
            <p class="text-xs opacity-75 mt-1">Kredit semester</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- Total SKS x Indeks --}}
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">SKS × Indeks</p>
            <p class="text-4xl font-bold">75</p>
            <p class="text-xs opacity-75 mt-1">Total poin</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- Indeks Prestasi --}}
    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Indeks Prestasi</p>
            <p class="text-4xl font-bold">3.57</p>
            <p class="text-xs opacity-75 mt-1">Sangat Memuaskan</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>
</div>

{{-- Grade Distribution Chart --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Distribusi Nilai</h2>
    <div class="grid grid-cols-5 gap-4">
        @php
            $gradeDistribution = [
                ['grade' => 'A', 'count' => 5, 'color' => 'green', 'percentage' => 56],
                ['grade' => 'B+', 'count' => 2, 'color' => 'blue', 'percentage' => 22],
                ['grade' => 'B', 'count' => 1, 'color' => 'yellow', 'percentage' => 11],
                ['grade' => 'C+', 'count' => 1, 'color' => 'orange', 'percentage' => 11],
                ['grade' => 'D/E', 'count' => 0, 'color' => 'red', 'percentage' => 0],
            ];
        @endphp

        @foreach($gradeDistribution as $grade)
        <div class="text-center">
            <div class="bg-{{ $grade['color'] }}-100 rounded-xl p-6 mb-3">
                <p class="text-4xl font-bold text-{{ $grade['color'] }}-600">{{ $grade['count'] }}</p>
            </div>
            <p class="text-sm font-semibold text-gray-700 mb-1">Grade {{ $grade['grade'] }}</p>
            <p class="text-xs text-gray-500">{{ $grade['percentage'] }}%</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Grades List --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">Nilai Semester 2023/2024 Genap</h2>
        <p class="text-sm text-gray-500 mt-1">Detail nilai per mata kuliah</p>
    </div>

    <div class="p-6">
        @php
            $courses = [
                [
                    'no' => 1,
                    'kode' => 'RPL22206',
                    'nama' => 'Algoritma dan Struktur Data',
                    'nilai_angka' => '78.50',
                    'nilai_huruf' => 'B+',
                    'indeks' => '3.50',
                    'sks' => '2.00',
                    'sks_indeks' => '7',
                    'grade_color' => 'blue'
                ],
                [
                    'no' => 2,
                    'kode' => 'RPL22207',
                    'nama' => 'Analisis dan Desain Perangkat Lunak',
                    'nilai_angka' => '71.00',
                    'nilai_huruf' => 'B',
                    'indeks' => '3.00',
                    'sks' => '2.00',
                    'sks_indeks' => '6',
                    'grade_color' => 'yellow'
                ],
                [
                    'no' => 3,
                    'kode' => 'RPL22302',
                    'nama' => 'Bahasa Inggris',
                    'nilai_angka' => '84.50',
                    'nilai_huruf' => 'A',
                    'indeks' => '4.00',
                    'sks' => '3.00',
                    'sks_indeks' => '12',
                    'grade_color' => 'green'
                ],
                [
                    'no' => 4,
                    'kode' => 'RPL22208',
                    'nama' => 'Interaksi Manusia dan Komputer',
                    'nilai_angka' => '85.30',
                    'nilai_huruf' => 'A',
                    'indeks' => '4.00',
                    'sks' => '2.00',
                    'sks_indeks' => '8',
                    'grade_color' => 'green'
                ],
                [
                    'no' => 5,
                    'kode' => 'RPL22205',
                    'nama' => 'Logika Informatika',
                    'nilai_angka' => '90.25',
                    'nilai_huruf' => 'A',
                    'indeks' => '4.00',
                    'sks' => '2.00',
                    'sks_indeks' => '8',
                    'grade_color' => 'green'
                ],
                [
                    'no' => 6,
                    'kode' => 'RPL22204',
                    'nama' => 'Matematika Lanjut',
                    'nilai_angka' => '82.55',
                    'nilai_huruf' => 'A',
                    'indeks' => '4.00',
                    'sks' => '2.00',
                    'sks_indeks' => '8',
                    'grade_color' => 'green'
                ],
                [
                    'no' => 7,
                    'kode' => 'RPL22303',
                    'nama' => 'Pengembangan Model Bisnis',
                    'nilai_angka' => '69.87',
                    'nilai_huruf' => 'C+',
                    'indeks' => '2.50',
                    'sks' => '3.00',
                    'sks_indeks' => '7.5',
                    'grade_color' => 'orange'
                ],
                [
                    'no' => 8,
                    'kode' => 'RPL22309',
                    'nama' => 'Pengembangan Web Dasar',
                    'nilai_angka' => '76.00',
                    'nilai_huruf' => 'B+',
                    'indeks' => '3.50',
                    'sks' => '3.00',
                    'sks_indeks' => '10.5',
                    'grade_color' => 'blue'
                ],
                [
                    'no' => 9,
                    'kode' => 'RPL22201',
                    'nama' => 'Seni dan Olahraga',
                    'nilai_angka' => '100.00',
                    'nilai_huruf' => 'A',
                    'indeks' => '4.00',
                    'sks' => '2.00',
                    'sks_indeks' => '8',
                    'grade_color' => 'green'
                ],
            ];
        @endphp

        <div class="space-y-4">
            @foreach($courses as $course)
            <div class="bg-gradient-to-r from-gray-50 to-white border-2 border-gray-200 rounded-xl p-5 hover:shadow-lg transition duration-200">
                <div class="flex items-center gap-5">
                    {{-- Number Badge --}}
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-md flex-shrink-0">
                        {{ $course['no'] }}
                    </div>

                    {{-- Course Info --}}
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <p class="text-sm font-semibold text-gray-500">{{ $course['kode'] }}</p>
                                <h3 class="text-lg font-bold text-gray-800">{{ $course['nama'] }}</h3>
                            </div>
                            <span class="px-4 py-2 bg-{{ $course['grade_color'] }}-100 text-{{ $course['grade_color'] }}-700 rounded-full text-lg font-bold">
                                {{ $course['nilai_huruf'] }}
                            </span>
                        </div>

                        {{-- Metrics Grid --}}
                        <div class="grid grid-cols-5 gap-4">
                            <div class="bg-white p-3 rounded-lg border border-gray-200">
                                <p class="text-xs text-gray-500 mb-1">Nilai Angka</p>
                                <p class="text-lg font-bold text-gray-800">{{ $course['nilai_angka'] }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-gray-200">
                                <p class="text-xs text-gray-500 mb-1">Nilai Huruf</p>
                                <p class="text-lg font-bold text-{{ $course['grade_color'] }}-600">{{ $course['nilai_huruf'] }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-gray-200">
                                <p class="text-xs text-gray-500 mb-1">Indeks</p>
                                <p class="text-lg font-bold text-purple-600">{{ $course['indeks'] }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-gray-200">
                                <p class="text-xs text-gray-500 mb-1">SKS</p>
                                <p class="text-lg font-bold text-blue-600">{{ $course['sks'] }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-gray-200">
                                <p class="text-xs text-gray-500 mb-1">SKS × Indeks</p>
                                <p class="text-lg font-bold text-orange-600">{{ $course['sks_indeks'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Summary Footer --}}
        <div class="mt-6 bg-gradient-to-r from-teal-50 to-teal-100 border-2 border-teal-200 rounded-xl p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">TOTAL SKS</p>
                        <p class="text-3xl font-bold text-gray-800">21</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">TOTAL SKS × INDEKS</p>
                        <p class="text-3xl font-bold text-orange-600">75</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600 mb-1">INDEKS PRESTASI SEMESTER</p>
                    <p class="text-5xl font-bold text-green-600">3.57</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
<div class="mt-8 text-center text-sm text-gray-500 pb-6">
    <p>2025 Bagian Teknologi Informasi Wimar Bisnis Indonesia</p>
</div>

@endsection