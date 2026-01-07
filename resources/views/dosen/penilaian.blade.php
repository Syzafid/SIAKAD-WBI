@extends('layouts.app')

@section('content')


<div class="">
    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white p-6 rounded-2xl mb-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-1">Penilaian Mahasiswa</h2>
                <p class="text-indigo-100 text-sm">Input dan kelola nilai mata kuliah</p>
            </div>
            <div class="text-right">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-6 py-3">
                    <p class="text-sm opacity-90">Deadline Input Nilai</p>
                    <p class="text-xl font-bold">15 Januari 2025</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert Warning --}}
    <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-lg mb-6">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <h3 class="font-semibold text-orange-800 mb-1">Perhatian!</h3>
                <p class="text-sm text-orange-700">Anda memiliki <strong>8 kelas</strong> yang belum menginput nilai. Mohon segera lengkapi sebelum deadline <strong>15 Januari 2025</strong>.</p>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-5 rounded-2xl shadow-lg relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <p class="text-sm opacity-90 mb-1">Nilai Selesai</p>
                <p class="text-4xl font-bold">5</p>
                <p class="text-xs opacity-75 mt-1">Kelas sudah dinilai</p>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
        </div>

        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-5 rounded-2xl shadow-lg relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <p class="text-sm opacity-90 mb-1">Belum Input</p>
                <p class="text-4xl font-bold">8</p>
                <p class="text-xs opacity-75 mt-1">Kelas menunggu</p>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 rounded-2xl shadow-lg relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                </div>
                <p class="text-sm opacity-90 mb-1">Total Mahasiswa</p>
                <p class="text-4xl font-bold">142</p>
                <p class="text-xs opacity-75 mt-1">Mahasiswa aktif</p>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-5 rounded-2xl shadow-lg relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                <p class="text-sm opacity-90 mb-1">Rata-rata Nilai</p>
                <p class="text-4xl font-bold">B+</p>
                <p class="text-xs opacity-75 mt-1">Semester ini</p>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 mb-6">
        <div class="flex items-center gap-4">
            <div class="flex-1">
                <div class="relative">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Cari mata kuliah atau kelas..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option>Semua Status</option>
                <option>Sudah Dinilai</option>
                <option>Belum Dinilai</option>
            </select>
            <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export Nilai
            </button>
        </div>
    </div>

    {{-- Class List Cards --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        @php
            $classes = [
                [
                    'course' => 'Pemrograman Web Lanjut',
                    'code' => 'PWL301',
                    'class' => 'RPL 3A',
                    'students' => 32,
                    'graded' => 32,
                    'status' => 'complete',
                    'color' => 'green',
                    'avg_grade' => 'A'
                ],
                [
                    'course' => 'Basis Data',
                    'code' => 'BD201',
                    'class' => 'RPL 2B',
                    'students' => 35,
                    'graded' => 35,
                    'status' => 'complete',
                    'color' => 'green',
                    'avg_grade' => 'B+'
                ],
                [
                    'course' => 'Mobile Programming',
                    'code' => 'MPR401',
                    'class' => 'RPL 4A',
                    'students' => 28,
                    'graded' => 0,
                    'status' => 'pending',
                    'color' => 'red',
                    'avg_grade' => '-'
                ],
                [
                    'course' => 'Agile Development',
                    'code' => 'AD401',
                    'class' => 'RPL 4B',
                    'students' => 30,
                    'graded' => 0,
                    'status' => 'pending',
                    'color' => 'red',
                    'avg_grade' => '-'
                ],
            ];
        @endphp

        @foreach($classes as $class)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
            <div class="border-l-4 border-{{ $class['color'] }}-500">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{ $class['course'] }}</h3>
                                @if($class['status'] == 'complete')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Selesai</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Pending</span>
                                @endif
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="font-mono font-semibold">{{ $class['code'] }}</span>
                                <span>•</span>
                                <span class="font-medium">{{ $class['class'] }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="w-16 h-16 bg-{{ $class['color'] }}-100 rounded-xl flex items-center justify-center">
                                <span class="text-2xl font-bold text-{{ $class['color'] }}-600">{{ $class['avg_grade'] }}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Rata-rata</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Total Mahasiswa</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $class['students'] }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Sudah Dinilai</p>
                            <p class="text-2xl font-bold text-{{ $class['color'] }}-600">{{ $class['graded'] }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Progress</span>
                            <span class="font-semibold text-gray-900">{{ $class['graded'] }}/{{ $class['students'] }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-{{ $class['color'] }}-500 h-2 rounded-full" style="width: {{ ($class['graded'] / $class['students']) * 100 }}%"></div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        @if($class['status'] == 'pending')
                            <button class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Input Nilai
                            </button>
                        @else
                            <button class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-lg transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat Detail
                            </button>
                            <button class="flex-1 bg-orange-100 hover:bg-orange-200 text-orange-700 font-semibold py-2.5 rounded-lg transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Recent Graded Students --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Nilai Terbaru</h3>
                    <p class="text-sm text-gray-500">Mahasiswa yang baru dinilai</p>
                </div>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-700 font-semibold">
                    Lihat Semua →
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nama Mahasiswa</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Mata Kuliah</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Nilai Angka</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Nilai Huruf</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Waktu Input</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $recentGrades = [
                            ['2301010001', 'Ahmad Fadli', 'Pemrograman Web Lanjut', 88, 'A', '2 jam lalu'],
                            ['2301010002', 'Budi Santoso', 'Pemrograman Web Lanjut', 85, 'A-', '2 jam lalu'],
                            ['2301010003', 'Citra Dewi', 'Basis Data', 78, 'B+', '3 jam lalu'],
                            ['2301010004', 'Dian Purnama', 'Basis Data', 92, 'A', '3 jam lalu'],
                            ['2301010005', 'Eka Saputra', 'Pemrograman Web Lanjut', 76, 'B', '5 jam lalu'],
                        ];
                    @endphp

                    @foreach($recentGrades as $grade)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-mono font-medium text-gray-900">{{ $grade[0] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $grade[1] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $grade[2] }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-bold text-gray-900">{{ $grade[3] }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @php
                                $gradeColor = 'green';
                                if($grade[4] == 'A' || $grade[4] == 'A-') $gradeColor = 'green';
                                elseif($grade[4] == 'B+' || $grade[4] == 'B') $gradeColor = 'blue';
                                elseif($grade[4] == 'B-' || $grade[4] == 'C+') $gradeColor = 'yellow';
                                else $gradeColor = 'red';
                            @endphp
                            <span class="inline-block px-3 py-1 bg-{{ $gradeColor }}-100 text-{{ $gradeColor }}-700 rounded-full text-sm font-bold">
                                {{ $grade[4] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-500">{{ $grade[5] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Footer --}}
    <div class="mt-8 text-center text-sm text-gray-500">
        <p>© 2025 Bagian Teknologi Informasi Wiyata Bhakti Indonesia</p>
    </div>
</div>

@endsection