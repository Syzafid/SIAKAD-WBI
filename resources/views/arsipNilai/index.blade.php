@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Arsip Nilai Mahasiswa</h1>
    <p class="text-gray-500 mt-2">Daftar rekapan nilai per semester yang telah diselesaikan.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @forelse($arsip as $item)
    <a href="{{ route('arsip-nilai.show', $item->khs_id) }}" class="group relative">
        {{-- Folder Back --}}
        <div class="absolute inset-0 bg-white rounded-[2rem] shadow-sm transform group-hover:-rotate-3 transition-transform duration-300"></div>
        
        {{-- Folder Front --}}
        <div class="relative bg-white border-2 border-gray-100 rounded-[2rem] p-6 shadow-md transform group-hover:translate-x-1 group-hover:-translate-y-2 transition-transform duration-300 overflow-hidden">
            {{-- Folder Tab --}}
            <div class="absolute top-0 right-0 w-24 h-8 bg-gradient-to-l from-[#1B5937] to-[#2F8054] rounded-bl-3xl flex items-center justify-center">
                <span class="text-[10px] font-bold text-white uppercase tracking-wider">{{ $item->semester }}</span>
            </div>

            <div class="flex flex-col items-center text-center mt-4">
                {{-- Folder Icon --}}
                <div class="w-20 h-20 bg-green-50 rounded-3xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-[#1B5937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-[#1B5937] transition-colors line-clamp-1">
                    {{ $item->tahun_ajaran }}
                </h3>
                <p class="text-sm text-gray-500 uppercase font-semibold tracking-wide mt-1">
                    {{ $item->semester }}
                </p>

                <div class="mt-6 flex items-center gap-4">
                    <div class="text-center">
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">IP</p>
                        <p class="text-lg font-black text-[#1B5937]">{{ number_format($item->ip, 2) }}</p>
                    </div>
                    <div class="w-px h-8 bg-gray-100"></div>
                    <div class="text-center">
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">SKS</p>
                        <p class="text-lg font-black text-blue-600">{{ $item->total_sks }}</p>
                    </div>
                </div>
            </div>

            {{-- Hover Decoration --}}
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#1B5937]/5 rounded-full blur-2xl group-hover:bg-[#1B5937]/10 transition-colors"></div>
        </div>

        {{-- Folder Label --}}
        <div class="absolute -bottom-2 inset-x-8 h-4 bg-gray-200/50 rounded-full blur-sm -z-10 group-hover:blur-md transition-all"></div>
    </a>
    @empty
    <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-gray-400">
        <svg class="w-20 h-20 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
        <p class="text-xl font-bold">Belum Ada Arsip Nilai</p>
        <p class="text-sm">Selesaikan semester untuk melihat rekapan nilai di sini.</p>
    </div>
    @endforelse
</div>

@endsection
