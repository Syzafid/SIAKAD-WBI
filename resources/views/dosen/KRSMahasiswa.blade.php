@extends('layouts.app')

@section('content')


{{-- Filter Section --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 mb-6">
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3 flex-1">
            <div class="relative flex-1 max-w-md">
                <input type="text" placeholder="Cari mahasiswa (nama/NIM)..." class="w-full border-2 border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <select class="border-2 border-gray-300 rounded-lg px-4 py-2.5 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                <option value="all">Semua Status</option>
                <option value="pending" selected>Pending</option>
                <option value="approved">Disetujui</option>
                <option value="rejected">Ditolak</option>
            </select>

            <select class="border-2 border-gray-300 rounded-lg px-4 py-2.5 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                <option value="">Semua Semester</option>
                <option selected>2025/2026 Ganjil</option>
                <option>2024/2025 Genap</option>
            </select>
        </div>

        <div class="flex items-center gap-2 text-sm">
            <span class="text-gray-600">Tampilkan:</span>
            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option>10</option>
                <option selected>20</option>
                <option>50</option>
            </select>
        </div>
    </div>
</div>

{{-- Summary Stats --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-5 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm opacity-90">Pending Review</p>
            <svg class="w-6 h-6 opacity-75" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold">12</p>
    </div>

    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-5 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm opacity-90">Disetujui</p>
            <svg class="w-6 h-6 opacity-75" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold">85</p>
    </div>

    <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-5 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm opacity-90">Ditolak</p>
            <svg class="w-6 h-6 opacity-75" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold">3</p>
    </div>

    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 rounded-xl shadow-lg">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm opacity-90">Total KRS</p>
            <svg class="w-6 h-6 opacity-75" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold">100</p>
    </div>
</div>

{{-- KRS List --}}
<div class="space-y-5">
    @php
        $krsList = [
            [
                'id' => 1,
                'name' => 'Budi Doremi',
                'nim' => '2305010034',
                'semester' => '2025/2026 Ganjil',
                'total_sks' => 20,
                'total_mk' => 8,
                'ipk' => 3.57,
                'submitted_at' => '2 jam yang lalu',
                'status' => 'pending',
                'photo' => 'BD'
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
                'nim' => '2305010045',
                'semester' => '2025/2026 Ganjil',
                'total_sks' => 21,
                'total_mk' => 9,
                'ipk' => 3.42,
                'submitted_at' => '3 jam yang lalu',
                'status' => 'pending',
                'photo' => 'SA'
            ],
            [
                'id' => 3,
                'name' => 'Ahmad Fadli',
                'nim' => '2305010056',
                'semester' => '2025/2026 Ganjil',
                'total_sks' => 19,
                'total_mk' => 7,
                'ipk' => 3.25,
                'submitted_at' => '5 jam yang lalu',
                'status' => 'pending',
                'photo' => 'AF'
            ],
            [
                'id' => 4,
                'name' => 'Dewi Lestari',
                'nim' => '2305010067',
                'semester' => '2025/2026 Ganjil',
                'total_sks' => 22,
                'total_mk' => 9,
                'ipk' => 3.68,
                'submitted_at' => '1 hari yang lalu',
                'status' => 'pending',
                'photo' => 'DL'
            ],
        ];
    @endphp

    @foreach($krsList as $krs)
    <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-200 hover:shadow-lg transition overflow-hidden">
        {{-- Header Card --}}
        <div class="bg-gradient-to-r from-orange-50 to-orange-100 p-5 border-b-2 border-orange-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        {{ $krs['photo'] }}
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $krs['name'] }}</h3>
                        <p class="text-sm text-gray-600">NIM: {{ $krs['nim'] }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $krs['semester'] }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-semibold inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        Pending
                    </span>
                    <p class="text-xs text-gray-500 mt-2">{{ $krs['submitted_at'] }}</p>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="p-6">
            {{-- KRS Summary --}}
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-center">
                    <p class="text-sm text-gray-600 mb-1">Total SKS</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $krs['total_sks'] }}</p>
                </div>
                <div class="bg-purple-50 border border-purple-200 rounded-xl p-4 text-center">
                    <p class="text-sm text-gray-600 mb-1">Mata Kuliah</p>
                    <p class="text-3xl font-bold text-purple-600">{{ $krs['total_mk'] }}</p>
                </div>
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-center">
                    <p class="text-sm text-gray-600 mb-1">IPK Saat Ini</p>
                    <p class="text-3xl font-bold text-green-600">{{ $krs['ipk'] }}</p>
                </div>
            </div>

            {{-- Mata Kuliah List Preview --}}
            <div class="mb-6">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="font-bold text-gray-800">Daftar Mata Kuliah ({{ $krs['total_mk'] }} MK)</h4>
                    <button onclick="toggleDetail({{ $krs['id'] }})" class="text-orange-600 hover:text-orange-700 font-semibold text-sm">
                        Lihat Detail →
                    </button>
                </div>
                
                {{-- Hidden Detail --}}
                <div id="detail-{{ $krs['id'] }}" class="hidden space-y-2 bg-gray-50 rounded-lg p-4">
                    @php
                        $courses = [
                            ['code' => 'IFI-322507', 'name' => 'Pemrograman Web Lanjut', 'sks' => 3],
                            ['code' => 'IFI-322203', 'name' => 'Analisis dan Desain Perangkat Lunak', 'sks' => 2],
                            ['code' => 'IFI-332308', 'name' => 'Perancangan Antarmuka Pengguna', 'sks' => 3],
                            ['code' => 'IFI-322302', 'name' => 'Metode Pengembangan Perangkat Lunak', 'sks' => 2],
                            ['code' => 'IFI-322401', 'name' => 'Basis Data Lanjut', 'sks' => 3],
                        ];
                    @endphp
                    
                    @foreach($courses as $course)
                    <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <span class="text-indigo-600 font-bold text-xs">{{ $course['sks'] }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $course['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $course['code'] }}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-600 font-medium">{{ $course['sks'] }} SKS</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Catatan Section --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan untuk Mahasiswa (Opsional)</label>
                <textarea id="notes-{{ $krs['id'] }}" rows="3" class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Tambahkan catatan atau saran untuk mahasiswa..."></textarea>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-3">
                <button onclick="approveKRS({{ $krs['id'] }})" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-xl font-semibold transition shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Setujui KRS</span>
                </button>

                <button onclick="rejectKRS({{ $krs['id'] }})" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl font-semibold transition shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Tolak KRS</span>
                </button>

                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold transition border-2 border-gray-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between mt-6 pb-6">
    <div class="text-sm text-gray-600">
        Menampilkan <strong>1-4</strong> dari <strong>12</strong> pengajuan
    </div>
    <div class="flex items-center gap-2">
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
            Previous
        </button>
        <button class="px-4 py-2 bg-orange-600 text-white rounded-lg text-sm font-semibold">
            1
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
            2
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
            3
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
            Next
        </button>
    </div>
</div> 

@endsection

@push('scripts')
<script>
function toggleDetail(id) {
    const detail = document.getElementById('detail-' + id);
    detail.classList.toggle('hidden');
}

function approveKRS(id) {
    const notes = document.getElementById('notes-' + id).value;
    
    if (confirm('Apakah Anda yakin ingin menyetujui KRS ini?')) {
        // Here you would send the approval to backend
        alert('KRS berhasil disetujui!' + (notes ? '\nCatatan: ' + notes : ''));
        // Reload or update UI
    }
}

function rejectKRS(id) {
    const notes = document.getElementById('notes-' + id).value;
    
    if (!notes.trim()) {
        alert('Silakan berikan catatan alasan penolakan terlebih dahulu.');
        document.getElementById('notes-' + id).focus();
        return;
    }
    
    if (confirm('Apakah Anda yakin ingin menolak KRS ini?')) {
        // Here you would send the rejection to backend
        alert('KRS ditolak.\nCatatan: ' + notes);
        // Reload or update UI
    }
}
</script>
@endpush