@extends('layouts.app')

@section('content')

{{-- Summary Cards --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
    {{-- Total Semester --}}
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Total Semester</p>
            <p class="text-4xl font-bold">5</p>
            <p class="text-xs opacity-75 mt-1">Semester Ditempuh</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- IPK Kumulatif --}}
    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">IPK Kumulatif</p>
            <p class="text-4xl font-bold">3.42</p>
            <p class="text-xs opacity-75 mt-1">Sangat Memuaskan</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- Total SKS --}}
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Total SKS</p>
            <p class="text-4xl font-bold">101</p>
            <p class="text-xs opacity-75 mt-1">SKS Terkumpul</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>

    {{-- Rata-rata IPS --}}
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm opacity-90 mb-1">Rata-rata IPS</p>
            <p class="text-4xl font-bold">3.35</p>
            <p class="text-xs opacity-75 mt-1">Performa Konsisten</p>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    </div>
</div>

{{-- Academic Performance Chart --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Grafik Perkembangan Akademik</h2>
            <p class="text-sm text-gray-500 mt-1">Visualisasi IPS dan IPK per semester</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                <span class="text-sm text-gray-600">IPS</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                <span class="text-sm text-gray-600">IPK</span>
            </div>
        </div>
    </div>
    <div class="h-64">
        <canvas id="performanceChart"></canvas>
    </div>
</div>

{{-- Data Table with Cards --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">Detail Per Semester</h2>
        <p class="text-sm text-gray-500 mt-1">Informasi lengkap prestasi akademik</p>
    </div>

    <div class="p-6">
        @php
            $semesters = [
                [
                    'no' => 1,
                    'semester' => '2023/2024 Ganjil',
                    'ips' => '3.48',
                    'sks' => '20',
                    'ipk' => '3.48',
                    'sks_total' => '20',
                    'status' => 'Lulus',
                    'badge_color' => 'green'
                ],
                [
                    'no' => 2,
                    'semester' => '2023/2024 Genap',
                    'ips' => '3.57',
                    'sks' => '21',
                    'ipk' => '3.52',
                    'sks_total' => '41',
                    'status' => 'Lulus',
                    'badge_color' => 'green'
                ],
                [
                    'no' => 3,
                    'semester' => '2024/2025 Ganjil',
                    'ips' => '3.64',
                    'sks' => '21',
                    'ipk' => '3.56',
                    'sks_total' => '62',
                    'status' => 'Lulus',
                    'badge_color' => 'green'
                ],
                [
                    'no' => 4,
                    'semester' => '2024/2025 Genap',
                    'ips' => '3.58',
                    'sks' => '20',
                    'ipk' => '3.57',
                    'sks_total' => '82',
                    'status' => 'Lulus',
                    'badge_color' => 'green'
                ],
                [
                    'no' => 5,
                    'semester' => '2025/2026 Ganjil',
                    'ips' => '0',
                    'sks' => '19',
                    'ipk' => '2.9',
                    'sks_total' => '101',
                    'status' => 'Aktif',
                    'badge_color' => 'blue'
                ],
            ];
        @endphp

        <div class="space-y-4">
            @foreach($semesters as $sem)
            <div class="bg-gradient-to-r from-gray-50 to-white border-2 border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg">
                            {{ $sem['no'] }}
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ $sem['semester'] }}</h3>
                            <p class="text-sm text-gray-500">Semester {{ $sem['no'] }}</p>
                        </div>
                    </div>
                    <span class="px-4 py-2 bg-{{ $sem['badge_color'] }}-100 text-{{ $sem['badge_color'] }}-700 rounded-full text-sm font-semibold">
                        {{ $sem['status'] }}
                    </span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">IPS</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $sem['ips'] }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">SKS Semester</p>
                        <p class="text-2xl font-bold text-purple-600">{{ $sem['sks'] }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">IPK</p>
                        <p class="text-2xl font-bold text-green-600">{{ $sem['ipk'] }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">Total SKS</p>
                        <p class="text-2xl font-bold text-orange-600">{{ $sem['sks_total'] }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">Progress</p>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full" style="width: {{ ($sem['sks_total'] / 144) * 100 }}%"></div>
                            </div>
                            <span class="text-xs font-semibold text-gray-700">{{ round(($sem['sks_total'] / 144) * 100) }}%</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Achievement Summary --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">
    <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-200 p-6 rounded-2xl">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-600">IPS Tertinggi</p>
                <p class="text-3xl font-bold text-gray-800">3.64</p>
            </div>
        </div>
        <p class="text-sm text-gray-600">Semester 2024/2025 Ganjil</p>
    </div>

    <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 p-6 rounded-2xl">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-600">Semester Lulus</p>
                <p class="text-3xl font-bold text-gray-800">4</p>
            </div>
        </div>
        <p class="text-sm text-gray-600">Dari 5 semester</p>
    </div>

    <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-200 p-6 rounded-2xl">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-600">Estimasi Lulus</p>
                <p class="text-3xl font-bold text-gray-800">3</p>
            </div>
        </div>
        <p class="text-sm text-gray-600">Semester lagi (berdasarkan 144 SKS)</p>
    </div>
</div>

{{-- Footer --}}
<div class="mt-8 text-center text-sm text-gray-500 pb-6">
    <p>2025 Bagian Teknologi Informasi Wimar Bisnis Indonesia</p>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2023/2024 Ganjil', '2023/2024 Genap', '2024/2025 Ganjil', '2024/2025 Genap', '2025/2026 Ganjil'],
            datasets: [{
                label: 'IPS',
                data: [3.48, 3.57, 3.64, 3.58, 0],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointBackgroundColor: '#3b82f6',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }, {
                label: 'IPK',
                data: [3.48, 3.52, 3.56, 3.57, 2.9],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    borderRadius: 8,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    min: 0,
                    max: 4,
                    ticks: {
                        stepSize: 0.5
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
});
</script>
@endpush