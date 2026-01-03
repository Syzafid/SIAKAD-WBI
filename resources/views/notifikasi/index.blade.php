@extends('layouts.app')

@section('content')

<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Riwayat Notifikasi</h1>
        <p class="text-gray-500 mt-2">Daftar semua pesan dan pemberitahuan akademik Anda.</p>
    </div>
    @if($notifications->where('is_read', false)->count() > 0)
    <form action="{{ route('notifikasi.readAll') }}" method="POST">
        @csrf
        <button type="submit" class="bg-emerald-50 text-emerald-600 px-4 py-2 rounded-xl font-bold text-sm hover:bg-emerald-100 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            Tandai Semua Selesai
        </button>
    </form>
    @endif
</div>

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="divide-y divide-gray-50">
        @forelse($notifications as $notif)
        <div class="p-6 transition-all {{ !$notif->is_read ? 'bg-blue-50/20 border-l-4 border-blue-500' : 'bg-white' }} hover:bg-gray-50 group">
            <div class="flex items-start gap-6">
                {{-- Status Icon --}}
                <div class="flex-shrink-0">
                    @php
                        $iconColor = $notif->tipe == 'krs' ? 'blue' : ($notif->tipe == 'pembayaran' ? 'orange' : 'emerald');
                        $iconData = [
                            'krs' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                            'pembayaran' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
                            'info' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                        ];
                    @endphp
                    <div class="w-12 h-12 rounded-2xl bg-{{ $iconColor }}-100 flex items-center justify-center text-{{ $iconColor }}-600 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconData[$notif->tipe] ?? $iconData['info'] }}"></path>
                        </svg>
                    </div>
                </div>

                {{-- Content --}}
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-1">
                        <h3 class="text-lg font-bold text-gray-800">{{ $notif->judul }}</h3>
                        <span class="text-xs text-gray-400 font-medium">{{ $notif->created_at->translatedFormat('d M Y, H:i') }}</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4 max-w-3xl">
                        {{ $notif->pesan }}
                    </p>

                    <div class="flex items-center gap-4">
                        @if($notif->link)
                        <a href="{{ route('notifikasi.read', $notif->id) }}" class="text-sm font-bold text-{{ $iconColor }}-600 hover:underline flex items-center gap-1">
                            Lihat Detail
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        @endif
                        
                        @if(!$notif->is_read)
                        <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-[10px] font-bold uppercase tracking-widest">Belum Dibaca</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="py-20 text-center text-gray-400">
            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <p class="text-xl font-bold">Belum Ada Notifikasi</p>
            <p class="text-sm">Semua pemberitahuan akademik akan muncul di sini.</p>
        </div>
        @endforelse
    </div>

    @if($notifications->hasPages())
    <div class="p-6 bg-gray-50 border-t border-gray-100 italic">
        {{ $notifications->links() }}
    </div>
    @endif
</div>

@endsection
