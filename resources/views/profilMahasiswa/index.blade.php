@extends('layouts.app')

@section('content')

<div class="mb-8 rounded-[2rem] bg-gradient-to-r from-[#1F653F] via-[#2F8054] to-[#47AF76] p-8 text-white relative overflow-hidden shadow-lg">
    {{-- Decorative Dots Pattern (Right Bottom) --}}
    <div class="absolute right-0 bottom-0 p-8 opacity-30 pointer-events-none">
         <div class="grid grid-cols-6 gap-3">
            @for($i=0; $i<24; $i++)
                <div class="h-1.5 w-1.5 rounded-full bg-white/60"></div>
            @endfor
        </div>
    </div>

    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
        {{-- Profile Image Placeholder --}}
        <div class="flex-shrink-0">
            <div class="h-48 w-48 rounded-[1.5rem] border border-white/40 bg-white/5 flex flex-col items-center justify-center backdrop-blur-sm relative">
                <div class="rounded-full border border-white/50 p-4 mb-2">
                    <svg class="h-12 w-12 text-white/90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold text-white/90 tracking-wide">No Image</span>
            </div>
        </div>

        {{-- Profile Info --}}
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-[2.5rem] font-bold uppercase tracking-wide leading-tight mb-3">BUDI DOREMI</h1>
            
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-x-8 gap-y-2 text-base font-medium text-white/90 mb-6">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>NIM: 2305010034</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Medan</span>
                </div>
                 <div class="flex items-center gap-2">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>10-10-2004</span>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                <button class="flex items-center gap-2 bg-white text-[#2E7D55] px-5 py-2.5 rounded-lg font-bold text-sm hover:bg-gray-100 transition shadow-sm">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Profil
                </button>
                <button class="flex items-center gap-2 bg-[#488A6B] text-white px-5 py-2.5 rounded-lg font-bold text-sm hover:bg-[#5da07e] transition shadow-sm border border-transparent">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload File
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Tab Navigation --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 mb-8">
    <div class="flex items-center justify-between gap-2">
        <button onclick="showTab('personal')" id="tab-personal" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Personal
        </button>
        <button onclick="showTab('keluarga')" id="tab-keluarga" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Keluarga
        </button>
        <button onclick="showTab('alamat')" id="tab-alamat" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Alamat
        </button>
        <button onclick="showTab('kontak')" id="tab-kontak" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Kontak
        </button>
    </div>
</div>

{{-- Tab Content --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    
    {{-- Tab 1: Data Personal --}}
    <div id="content-personal" class="tab-content">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Personal</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" value="BUDI DOREMI" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                <input type="text" value="Medan" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                <input type="text" value="2305010034" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                    <option>Laki-laki</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                <div class="relative">
                    <input type="text" value="10-10-2004" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                    <svg class="w-5 h-5 text-gray-400 absolute right-3 top-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                <input type="text" value="1277687030604002" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Agama</label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                    <option>Islam</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kewarganegaraan</label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                    <option>Indonesia</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Tab 2: Data Keluarga --}}
    <div id="content-keluarga" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Keluarga</h2>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ayah</label>
                <input type="text" value="HERMAN BAPAK BUDI" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu Kandung</label>
                <input type="text" value="MARTA IBU BUDI" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon Orang Tua</label>
                <input type="text" value="082274646271" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>
        </div>
    </div>

    {{-- Tab 3: Data Alamat --}}
    <div id="content-alamat" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Alamat</h2>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                <input type="text" value="JL BOKIT DUS PERUMAHAN 2/28 LAT" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">RT</label>
                    <input type="text" value="0" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">RW</label>
                    <input type="text" value="0" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                        <option>Prov.Sumatera Utara</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                        <option>Kota Medan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                        <option>Kec. Medan Deli</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                    <input type="text" value="Kota Bangun" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dusun</label>
                    <input type="text" value="Kec. Medan Deli" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                    <input type="text" value="Kota Bangun" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Tinggal</label>
                    <input type="text" value="Dengan Orang Tua" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Kos</label>
                    <input type="text" value="Jalan purnawirawan no. 58 kanugan" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kost</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                        <option>Deli serdang</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alat Transport</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                        <option>Jalan Kaki</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Tab 4: Data Kontak --}}
    <div id="content-kontak" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Kontak</h2>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Pribadi</label>
                <input type="email" value="Budidoremi2004@gmail.com" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email WBI</label>
                <input type="email" value="2305010034.@wbi.ac.id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Riwayat KIP</label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" disabled>
                    <option>Tidak</option>
                </select>
            </div>
        </div>
    </div>

</div>

{{-- Action Buttons --}}
<div class="flex items-center justify-end gap-3 mt-6 pb-6">
    <button class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span>Batal</span>
    </button>
    <button class="px-6 py-2.5 bg-[#1B5937] hover:bg-green-700 text-white rounded-lg font-semibold transition shadow-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
        </svg>
        <span>Simpan Perubahan</span>
    </button>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Set default tab
    showTab('personal');
});

function showTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });

    // Reset all tabs to inactive state
    document.querySelectorAll('[id^="tab-"]').forEach(tab => {
        // Remove active classes
        tab.classList.remove('bg-[#2E7D55]', 'text-white', 'shadow-md');
        // Add inactive classes
        tab.classList.add('text-gray-400', 'hover:text-gray-600');
    });

    // Show selected tab content
    document.getElementById('content-' + tabName).classList.remove('hidden');

    // Set active tab style
    const activeTab = document.getElementById('tab-' + tabName);
    // Remove inactive classes
    activeTab.classList.remove('text-gray-400', 'hover:text-gray-600');
    // Add active classes
    activeTab.classList.add('bg-[#2E7D55]', 'text-white', 'shadow-md');
}
</script>
@endpush