@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Total Mata Kuliah --}}
        <div class="flex flex-col justify-between rounded-xl bg-white p-5 shadow-lg border-l-[6px] border-blue-600 relative overflow-hidden h-full">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                         <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-gray-700 leading-tight">Total <br> Mata Kuliah</span>
                </div>
                <div class="mt-6 text-center">
                    <h3 class="text-5xl font-bold text-black">{{ $stats['total_mk'] }}</h3>
                </div>
            </div>
            <div class="mt-4 text-xs font-medium text-gray-500">
                Semester Aktif
            </div>
        </div>

        {{-- Rata-rata Kehadiran --}}
        <div class="flex flex-col justify-between rounded-xl bg-white p-5 shadow-lg border-l-[6px] border-green-600 relative overflow-hidden h-full">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-gray-700 leading-tight">Rata-rata <br> Kehadiran</span>
                </div>
                <div class="mt-6 text-center">
                    <h3 class="text-5xl font-bold text-black">{{ $stats['avg_attendance'] }}%</h3>
                </div>
            </div>
            <div class="mt-4 text-xs font-medium text-gray-500">
                Dari semua MK
            </div>
        </div>

        {{-- MK Dengan Data --}}
        <div class="flex flex-col justify-between rounded-xl bg-white p-5 shadow-lg border-l-[6px] border-purple-600 relative overflow-hidden h-full">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-gray-700 leading-tight">MK Dengan <br> Data</span>
                </div>
                <div class="mt-6 text-center">
                    <h3 class="text-5xl font-bold text-black">{{ $stats['mk_with_data'] }}</h3>
                </div>
            </div>
            <div class="mt-4 text-xs font-medium text-gray-500">
                Sudah ada absensi
            </div>
        </div>

        {{-- MK Kritis --}}
        <div class="flex flex-col justify-between rounded-xl bg-white p-5 shadow-lg border-l-[6px] border-red-600 relative overflow-hidden h-full">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 text-red-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-gray-700 leading-tight">MK Kritis</span>
                </div>
                <div class="mt-6 text-center">
                    <h3 class="text-5xl font-bold text-black">{{ $stats['mk_critical'] }}</h3>
                </div>
            </div>
            <div class="mt-4 text-xs font-medium text-gray-500">
                Kehadiran < 75%
            </div>
        </div>
    </div>

    {{-- Keterangan Legend --}}
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h3 class="text-base font-bold text-gray-900 mb-6 font-sans">Keterangan Status Kehadiran</h3>
        <div class="flex flex-wrap items-center justify-between px-0 sm:justify-start sm:gap-16">
            {{-- Hadir --}}
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#00B050] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="text-sm font-medium text-gray-800">H: Hadir</span>
            </div>
            {{-- Izin --}}
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#FFC000] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <span class="text-sm font-medium text-gray-800">I = Izin</span>
            </div>
            {{-- Alpha --}}
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#FF0000] text-white">
                     <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <span class="text-sm font-medium text-gray-800">A = Alpha</span>
            </div>
            {{-- Sakit --}}
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#0055FF] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-sm font-medium text-gray-800">S = Sakit</span>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        @forelse($courseAttendance as $index => $course)
        <div class="rounded-2xl bg-white shadow-sm overflow-hidden border-l-4 {{ $course['percentage'] >= 75 ? 'border-green-700' : 'border-red-600' }}">
            {{-- Header --}}
            <div class="{{ $course['percentage'] >= 75 ? 'bg-[#D4F0E1]' : 'bg-red-50' }} p-4 border-b {{ $course['percentage'] >= 75 ? 'border-green-100' : 'border-red-100' }}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full {{ $course['percentage'] >= 75 ? 'bg-green-700' : 'bg-red-600' }} text-sm font-bold text-white shadow-sm">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-gray-500">{{ $course['code'] }}</span>
                                <h3 class="text-base font-bold text-gray-900">{{ $course['name'] }}</h3>
                            </div>
                            <p class="text-xs text-gray-500">{{ $course['meetings_count'] }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="rounded-lg px-3 py-1 text-center 
                            {{ $course['percentage'] >= 75 ? 'bg-gradient-to-r from-[#1F653F] via-[#2F8054] to-[#47AF76]' : 'bg-gradient-to-r from-[#DC0000] via-[#FF1212] to-[#FFB433]' }} text-white">
                            <div class="text-sm font-bold text-white">{{ $course['status'] }}</div>
                            <div class="text-[10px] text-white/90">Kehadiran</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grid --}}
            <div class="p-4">
                <div class="grid grid-cols-15 gap-1 sm:gap-2">
                    @for($i = 1; $i <= 15; $i++)
                        @php 
                            $status = $course['data'][$i-1];
                            $bgColor = 'bg-gray-200';
                            if($status === 'H') $bgColor = 'bg-[#00B050]';
                            elseif($status === 'I') $bgColor = 'bg-[#FFC000]';
                            elseif($status === 'S') $bgColor = 'bg-[#0055FF]';
                            elseif($status === 'A') $bgColor = 'bg-[#FF0000]';
                        @endphp
                        <div class="text-center">
                            <div class="mb-1 text-[10px] font-bold text-gray-600">P{{ $i }}</div>
                            <div class="flex h-8 w-full items-center justify-center rounded text-xs font-bold text-white {{ $bgColor }} shadow-sm">
                                {{ $status }}
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-sm p-12 text-center">
            <p class="text-gray-500 italic">Belum ada mata kuliah yang terdaftar di KRS semester ini.</p>
        </div>
        @endforelse
    </div>

</div>

<style>
    /* Custom Grid for 15 columns if Tailwind doesn't have it by default */
    .grid-cols-15 {
        display: grid;
        grid-template-columns: repeat(15, minmax(0, 1fr));
    }
</style>
@endsection