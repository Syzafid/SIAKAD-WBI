<aside class="fixed bottom-0 left-0 top-[73px] z-40 h-[calc(100vh-73px)] w-64 -translate-x-full bg-[#1b4d36] transition-transform lg:translate-x-0 hidden lg:block overflow-y-auto">
    <div class="h-full px-4 py-6">
        <div class="overflow-hidden rounded-lg bg-[#245d43]/50">
              <button
        data-accordion-button
        class="flex w-full items-center justify-between bg-[#2d6a4f] px-4 py-3 text-sm font-bold text-white hover:bg-[#367c5d]">
        <span>PERKULIAHAN</span>
        <svg class="h-4 w-4 transition-transform" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" fill="none" stroke="currentColor" stroke-width="2"/>
        </svg>
    </button>

            <div data-accordion-button class="hidden">
                <a href="{{ route('dashboard') }}"
   class="block px-4 py-2.5 text-sm transition
   {{ request()->routeIs('dashboard')
        ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
        : 'pl-5 font-medium text-green-100/70 hover:text-white' }}">
    Beranda
</a>
<a href="{{ route('jadwal.index') }}"
   class="block px-4 py-2.5 text-sm transition
   {{ request()->routeIs('jadwal.*')
        ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
        : 'pl-5 font-medium text-green-100/70 hover:text-white' }}">
    Jadwal
</a>
<a href="{{ route('KRS.index') }}"
class="block px-4 py-2.5 text-sm transition
{{ request()->routeIs('KRS.*')
 ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
 : 'pl-5 font-medium text-green-100/70 hover:text-white' }}">
 Rencana Studi
</a>

                <a href="{{ route('keberhasilanStudi.index') }}" 
                class="block px-4 py-2.5 text-sm transition
{{ request()->routeIs('keberhasilanStudi.*')
 ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
 : 'pl-5 font-medium text-green-100/70 hover:text-white' }}">
                    Keberhasilan Studi
                </a>

                <a href="{{ route('konsultasiNilai.index')}}"
                class="block px-4 py-2.5 text-sm transition
                {{ request()->routeIs('konsultasiNilai.*')
                 ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
                 : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
                    Konsultasi Nilai
                </a>

                <a href="{{ route('kehadiran.index')}}"
                class="block px-4 py-2.5 text-sm transition
                {{ request()->routeIs('kehadiran.*')
                 ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
                 : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
                    Kehadiran
                </a>

                <a href="{{ route('profilMahasiswa.index')}}"
                class="block px-4 py-2.5 text-sm transition
                {{ request()->routeIs('profilMahasiswa.*')
                 ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
                 : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
                    Profil Mahasiswa
                </a>
            </div>

             <button
        data-accordion-button
        class="mt-2 flex w-full items-center justify-between bg-[#2d6a4f] px-4 py-3 text-sm font-bold text-white hover:bg-[#367c5d]">
        <span>E-TUGAS AKHIR</span>
        <svg class="h-4 w-4 transition-transform" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" fill="none" stroke="currentColor" stroke-width="2"/>
        </svg>
    </button>

    
    <div data-accordion-content class="hidden">
        <a href="{{ route('pengajuanJudul.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('pengajuanJudul.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            Pengajuan Judul
        </a>
        <a href="{{ route('nilaiTransfer.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('nilaiTransfer.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            Files/Template
        </a>
    </div>

                <button
        data-accordion-button
        class="mt-2 flex w-full items-center justify-between bg-[#2d6a4f] px-4 py-3 text-sm font-bold text-white hover:bg-[#367c5d]">
        <span>ARSIP NILAI WBI</span>
        <svg class="h-4 w-4 transition-transform" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" fill="none" stroke="currentColor" stroke-width="2"/>
        </svg>
    </button>

    
    <div data-accordion-content class="hidden">
        <a href="{{ route('kuliahMahasiswa.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('kuliahMahasiswa.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            Kuliah Mahasiswa
        </a>
        <a href="{{ route('nilaiTransfer.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('nilaiTransfer.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            Nilai Transfer
        </a>
        <a href="{{ route('2023-2024Ganjil.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('2023-2024Ganjil.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            2023/2024 Ganjil
        </a>
        <a href="{{ route('2023-2024Genap.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('2023-2024Genap.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            2023/2024 Genap
        </a>
        <a href="{{ route('2024-2025Ganjil.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('2024-2025Ganjil.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            2024/2025 Ganjil
        </a>
        <a href="{{ route('2024-2025Genap.index')}}"
            class="block px-4 py-2.5 text-sm transition
            {{ request()->routeIs('2024-2025Genap.*')
            ? 'bg-[#3da76e]/20 border-l-4 border-green-400 font-semibold text-white'
            : 'pl-5 font-medium text-green-100/70 hover:text-white'}}">
            2024/2025 Genap
        </a>
        
    </div>

            
        </div>
        

    </div>
    <script>
document.querySelectorAll('[data-accordion-button]').forEach((button) => {
    button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        document.querySelectorAll('[data-accordion-content]').forEach((el) => {
            if (el !== content) {
                el.classList.add('hidden');
                el.previousElementSibling
                    .querySelector('svg')
                    .classList.remove('rotate-180');
            }
        });

        content.classList.toggle('hidden');
        button.querySelector('svg').classList.toggle('rotate-180');
    });
});
</script>

</aside>