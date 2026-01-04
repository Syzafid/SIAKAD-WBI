@extends('layouts.app')

@section('content')

{{-- Header Section --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Konsultasi Nilai</h1>
</div>

{{-- Info Alert Card --}}
<div class="bg-[#2d6a4f] text-white p-6 rounded-xl mb-6 relative overflow-hidden shadow-lg">
    {{-- Decorative Dots --}}
    <div class="absolute top-0 right-0 p-4 opacity-20">
        <div class="grid grid-cols-5 gap-1">
            @for($i=0; $i<25; $i++)
                <div class="w-1 h-1 bg-white rounded-full"></div>
            @endfor
        </div>
    </div>
    
    <div class="flex items-start gap-4 relative z-10">
        <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center flex-shrink-0 mt-1">
            <span class="font-bold text-lg">!</span>
        </div>
        <div class="flex-1">
            <h3 class="text-lg font-bold mb-2">Keterangan</h3>
            <ul class="space-y-1 text-sm text-gray-100">
                <li class="flex items-start gap-2">
                    <span class="mt-1.5 w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                    <span class="leading-relaxed">Menu Konsultasi Nilai Merupakan Wadah Untuk Melakukan Perbaikan Terhadap Nilai Mahasiswa Perwakilan</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-1.5 w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                    <span class="leading-relaxed">Nilai Yang Dibesar Adalah Nilai Mata Kuliah Tidak Lulus</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-1.5 w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                    <span class="leading-relaxed">Dalam Hal Perwatian, Dosen Wali Akan Melakukan Konsultasi Perwatian Dengan Bertanya ke Mahasiswa Mengenai Nilai Tidak Lulus</span>
                </li>
            </ul>
        </div>
    </div>
</div>

@if($failedDetails->count() > 0)
<div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-xl shadow-sm">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-red-700 font-bold">
                Peringatan: Kamu memiliki {{ $failedDetails->count() }} mata kuliah yang belum lulus. Segera lakukan konsultasi dengan Dosen Wali.
            </p>
        </div>
    </div>
</div>
@endif

{{-- Student Card --}}
<div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6 border-l-[6px] border-l-[#1a5c38]">
    {{-- Card Header --}}
    <div class="bg-[#D4F0E1] p-4 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-[#1a5c38] text-white rounded-full flex items-center justify-center font-bold text-lg shadow-sm">
                1
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 uppercase">{{ $mahasiswa->nama }}</h3>
                <p class="text-sm text-gray-500">NIM: {{ $mahasiswa->npm }}</p>
            </div>
        </div>
        <button onclick="openModal()" class="bg-[#1a5c38] hover:bg-[#14452a] text-white px-5 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            <span>Lihat Detail</span>
        </button>
    </div>

    {{-- Card Stats --}}
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Red Box --}}
            <div class="bg-[#fff5f5] border border-red-100 rounded-lg p-4">
                <p class="text-sm text-gray-600 mb-1">Jumlah MK Tidak Lulus</p>
                <p class="text-3xl font-bold text-red-600">{{ $failedDetails->count() }}</p>
            </div>
            
            {{-- Blue Box --}}
            <div class="bg-[#e0f2fe] border border-blue-100 rounded-lg p-4">
                <p class="text-sm text-gray-600 mb-1">KRS Terakhir</p>
                <p class="text-2xl font-bold text-blue-600">{{ $latestKhs ? $latestKhs->semesterAjaran->tahun_ajaran . ' ' . ucfirst($latestKhs->semesterAjaran->semester) : '-' }}</p>
            </div>

            {{-- White/Gray Box --}}
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <p class="text-sm text-gray-600 mb-1">Status Nasihat</p>
                <p class="text-2xl font-bold {{ $latestKhs && $latestKhs->show_nasehat ? 'text-green-600' : 'text-gray-500' }}">
                    {{ $latestKhs && $latestKhs->show_nasehat ? 'Tersedia' : 'Belum Ada' }}
                </p>
            </div>
        </div>
    </div>
</div>

@if($failedDetails->count() == 0)
    {{-- Decorative Empty State if no failures --}}
    <div class="bg-white rounded-xl shadow-sm p-12 text-center">
        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Luar Biasa!</h3>
        <p class="text-gray-500">Kamu tidak memiliki mata kuliah yang mengulang. Pertahankan prestasimu!</p>
    </div>
@endif

{{-- Modal Overlay --}}
<div id="catatanModal" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm font-sans transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[95vh] overflow-y-auto transform scale-100 transition-all flex flex-col">
        
        {{-- Modal Header --}}
        <div class="bg-gradient-to-r from-[#1F653F] via-[#2F8054] to-[#47AF76] text-white px-6 py-4 flex justify-between items-center rounded-t-2xl shrink-0">
            <div>
                <h2 class="text-xl font-bold tracking-tight">Catatan Konsultasi Akademik</h2>
                <p class="text-green-50 text-sm font-medium opacity-90">Detail nilai dan nasihat akademik</p>
            </div>
            <button onclick="closeModal()" class="text-white/80 hover:text-white hover:bg-white/10 rounded-full p-2 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 md:p-8 space-y-6 overflow-y-auto">
            
            {{-- Student Info Card --}}
            <div class="bg-[#E6FFF1] rounded-2xl p-6 relative overflow-hidden">
                {{-- Left Green Accent --}}
                <div class="absolute left-0 top-0 bottom-0 w-2 bg-[#2d6a4f] rounded-l-2xl"></div>
                
                <div class="pl-4 grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-0.5">NIM</p>
                        <p class="text-lg font-bold text-gray-900">{{ $mahasiswa->npm }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-0.5">Nama</p>
                        <p class="text-lg font-bold text-gray-900">{{ $mahasiswa->nama }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-0.5">KRS Terakhir</p>
                        <p class="text-base font-bold text-[#43A972]">{{ $latestKhs ? $latestKhs->semesterAjaran->tahun_ajaran . ' ' . ucfirst($latestKhs->semesterAjaran->semester) : '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-0.5">Jumlah Mata Kuliah Tidak Lulus</p>
                        <p class="text-base font-bold text-[#d32f2f]">{{ $failedDetails->count() }} Mata Kuliah</p>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Mata Kuliah Tidak Lulus</h3>
                
                <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-[#DC0000] via-[#FF1212] to-[#FFB433] text-white">
                                <th class=" px-4 py-3.5 text-center font-bold w-16">No</th>
                                <th class=" px-4 py-3.5 text-left font-bold">Kode MK | Nama MK</th>
                                <th class=" px-4 py-3.5 text-left font-bold w-32 border-l border-white/20">UTS|UAS</th>
                                <th class=" px-4 py-3.5 text-left font-bold w-40 border-l border-white/20">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($failedDetails as $index => $detail)
                            <tr class="group hover:bg-gray-50 transition-colors {{ $index % 2 != 0 ? 'bg-[#FFF3F3]' : '' }}">
                                <td class="px-4 py-4 align-top text-center font-bold">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <div class="font-bold text-[#E40404] mb-0.5">{{ $detail->matakuliah->kode_mk }}</div>
                                    <div class="font-bold text-gray-900 text-base">{{ $detail->matakuliah->nama_mk }}</div>
                                    <div class="text-xs text-gray-500 mt-1 italic">{{ $detail->khs->semesterAjaran->tahun_ajaran }} ({{ ucfirst($detail->khs->semesterAjaran->semester) }})</div>
                                </td>
                                <td class="px-4 py-4 align-top text-gray-600 font-medium">
                                    <div class="whitespace-nowrap">SKS : {{ $detail->sks }}</div>
                                    <div class="whitespace-nowrap italic text-xs mt-1">Status: Mengulang</div>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <div class="text-gray-600 font-medium">Angka : <span class="text-[#E40404] font-bold">{{ number_format($detail->nilai_angka, 2) }}</span></div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-gray-600 font-medium">Huruf :</span>
                                        <span class="w-8 h-8 rounded-lg bg-[#FFD4D4] text-[#E40404] flex items-center justify-center font-bold text-sm shadow-sm ring-1 ring-red-200">{{ $detail->nilai_huruf }}</span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-12 text-center text-gray-500 italic">
                                    Selamat! Tidak ada mata kuliah yang perlu diulang.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Nasihat Akademik --}}
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Nasihat Akademik (Dosen Wali)</h3>
                <div class="bg-[#fff8e1] rounded-xl p-6 border border-[#ffecb3] shadow-inner font-medium text-gray-700 leading-relaxed italic">
                    @if($latestKhs && $latestKhs->show_nasehat && $latestKhs->nasehat)
                        "{{ $latestKhs->nasehat }}"
                    @else
                        <span class="text-gray-400">Belum ada nasihat dari dosen wali untuk periode ini.</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Modal Footer --}}
        <div class="px-8 py-5 flex items-center justify-end gap-3 pb-8 rounded-b-2xl shrink-0">
            <button onclick="closeModal()" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition-colors">
                Batal
            </button>
            <button class="px-6 py-2.5 bg-[#2E7D55] text-white rounded-lg font-bold hover:bg-[#246343] transition-colors shadow-lg shadow-green-900/20">
                Simpan
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openModal() {
    const modal = document.getElementById('catatanModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('catatanModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('catatanModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endpush
