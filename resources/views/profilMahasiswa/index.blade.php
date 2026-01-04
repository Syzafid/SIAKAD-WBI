@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="mb-4 flex items-center gap-3 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-xl shadow-sm animate-fade-in">
        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span class="text-sm font-bold text-green-800">{{ session('success') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl shadow-sm">
        <div class="flex items-center gap-3 mb-2">
            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-bold text-red-800">Terdapat kesalahan input:</span>
        </div>
        <ul class="list-disc list-inside text-xs text-red-700 font-medium">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="profile-form" action="{{ route('profilMahasiswa.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

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
        <div class="flex-shrink-0 group relative">
            <div class="h-48 w-48 rounded-[1.5rem] border border-white/40 bg-white/5 flex flex-col items-center justify-center backdrop-blur-sm relative shadow-2xl overflow-hidden">
                @if($mahasiswa->foto)
                    <img id="profile-preview" src="{{ asset('storage/' . $mahasiswa->foto) }}" class="h-full w-full object-cover">
                @else
                    <div id="profile-placeholder" class="flex flex-col items-center justify-center">
                        <div class="rounded-full border border-white/50 p-4 mb-2">
                            <svg class="h-12 w-12 text-white/90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-white/90 tracking-widest uppercase">{{ $mahasiswa->npm }}</span>
                    </div>
                @endif
                
                {{-- Only visible in edit mode --}}
                <div id="photo-overlay" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center cursor-pointer hidden">
                    <svg class="h-8 w-8 text-white mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-[10px] font-bold text-white uppercase tracking-wider">Ubah Foto</span>
                </div>
                <input type="file" name="foto" id="foto-input" class="hidden" accept="image/*" onchange="previewPhoto(this)">
            </div>
        </div>

        {{-- Profile Info --}}
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-[2.5rem] font-bold uppercase tracking-tight leading-none mb-2">{{ $mahasiswa->nama }}</h1>
            <p class="text-xl font-medium text-white/80 mb-6">{{ $mahasiswa->prodi->nama_prodi }} - Angkatan {{ $mahasiswa->angkatan }}</p>
            
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-x-8 gap-y-3 text-sm font-semibold text-white/90 mb-8">
                <div class="flex items-center gap-2.5 bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $mahasiswa->tempat_lahir ?? 'Medan' }}</span>
                </div>
                 <div class="flex items-center gap-2.5 bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $mahasiswa->tanggal_lahir ? \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d F Y') : '-' }}</span>
                </div>
                <div class="flex items-center gap-2.5 bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <svg class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $user->email }}</span>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
                <button type="button" onclick="enableEditing()" class="flex items-center gap-2 bg-white text-[#2E7D55] px-6 py-3 rounded-xl font-bold text-sm hover:scale-105 transition-all shadow-lg active:scale-95">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Profil
                </button>
                <button type="button" onclick="showPasswordModal()" class="flex items-center gap-2 bg-[#1F653F] border border-white/30 text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-[#1B5937] transition-all shadow-lg active:scale-95">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Ubah Password
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Tab Navigation --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 mb-8">
    <div class="flex items-center justify-between gap-2">
        <button type="button" onclick="showTab('personal')" id="tab-personal" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Personal
        </button>
        <button type="button" onclick="showTab('keluarga')" id="tab-keluarga" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Keluarga
        </button>
        <button type="button" onclick="showTab('alamat')" id="tab-alamat" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Alamat
        </button>
        <button type="button" onclick="showTab('kontak')" id="tab-kontak" class="flex-1 px-6 py-3 rounded-xl text-sm font-bold text-gray-400 hover:text-gray-600 transition-all duration-300">
            Data Kontak
        </button>
    </div>
</div>

{{-- Tab Content --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    
    {{-- Tab 1: Data Personal --}}
    <div id="content-personal" class="tab-content">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-[#2F8054]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Personal</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">NPM / NIM</label>
                <div class="text-base font-bold text-gray-400 border-b border-gray-100 pb-2 bg-gray-50/50 cursor-not-allowed">{{ $mahasiswa->npm }}</div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent h-10" disabled>
                    <option value="L" {{ $mahasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $mahasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $mahasiswa->nik) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Agama</label>
                <input type="text" name="agama" value="{{ old('agama', $mahasiswa->agama) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', $mahasiswa->kewarganegaraan) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>
        </div>

        <div class="mt-12 group">
             <div class="flex items-center gap-2 mb-6">
                <svg class="w-5 h-5 text-[#2F8054]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <h2 class="text-lg font-bold text-gray-800">Informasi Akademik</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-gray-50 rounded-2xl p-8 border-2 border-dashed border-gray-200">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Program Studi</label>
                    <div class="text-base font-extrabold text-[#1F653F]">{{ $mahasiswa->prodi->nama_prodi }}</div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Dosen Wali</label>
                    <div class="text-base font-extrabold text-[#1F653F]">{{ $mahasiswa->dosenWali ? $mahasiswa->dosenWali->nama : '-' }}</div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Semester Sekarang</label>
                    <div class="text-base font-extrabold text-gray-800">Semester {{ $mahasiswa->semester_sekarang }}</div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Status Beasiswa</label>
                    <div class="inline-flex items-center px-3 py-1 bg-green-100 text-[#1F653F] rounded-full text-xs font-bold">Potongan {{ $mahasiswa->status_beasiswa }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tab 2: Data Keluarga --}}
    <div id="content-keluarga" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-[#2F8054]" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Keluarga</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Ayah</label>
                <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $mahasiswa->nama_ayah) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Ibu Kandung</label>
                <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $mahasiswa->nama_ibu) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nomor Telepon Orang Tua</label>
                <input type="text" name="no_hp_ortu" value="{{ old('no_hp_ortu', $mahasiswa->no_hp_ortu) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>
        </div>
    </div>

    {{-- Tab 3: Data Alamat --}}
    <div id="content-alamat" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-[#2F8054]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Alamat</h2>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Lengkap</label>
                <textarea name="alamat_detail" rows="2" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent resize-none" readonly>{{ old('alamat_detail', $mahasiswa->alamat_detail) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Provinsi</label>
                    <div class="text-base font-bold text-gray-800 border-b border-gray-100 pb-2">Sumatera Utara</div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kabupaten/Kota</label>
                    <div class="text-base font-bold text-gray-800 border-b border-gray-100 pb-2">Medan</div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kecamatan</label>
                    <div class="text-base font-bold text-gray-800 border-b border-gray-100 pb-2">Medan Deli</div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kelurahan</label>
                    <div class="text-base font-bold text-gray-800 border-b border-gray-100 pb-2">Kota Bangun</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tab 4: Data Kontak --}}
    <div id="content-kontak" class="tab-content hidden">
        <div class="flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-[#2F8054]" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
            </svg>
            <h2 class="text-lg font-bold text-gray-800">Informasi Kontak</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email Pribadi</label>
                <input type="email" name="email_pribadi" value="{{ old('email_pribadi', $mahasiswa->email_pribadi) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email WBI</label>
                <div class="text-base font-bold text-gray-400 border-b border-gray-100 pb-2 bg-gray-50/50 cursor-not-allowed">{{ $user->email }}</div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nomor Telepon</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" class="editable-input w-full text-base font-bold text-gray-800 border-b border-gray-100 pb-2 focus:outline-none focus:border-[#2F8054] transition-colors bg-transparent" readonly>
            </div>
        </div>
    </div>

</div>

</form>

<div id="edit-actions" class="hidden flex items-center justify-end gap-3 mt-6 pb-6">
    <button type="button" onclick="window.location.reload()" class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span>Batal</span>
    </button>
    <button type="submit" form="profile-form" class="px-6 py-2.5 bg-[#1B5937] hover:bg-green-700 text-white rounded-lg font-semibold transition shadow-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
        </svg>
        <span>Simpan Perubahan</span>
    </button>
</div>

{{-- Password Modal --}}
<div id="password-modal" class="fixed inset-0 z-[60] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closePasswordModal()"></div>
        
        <div class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="bg-gradient-to-r from-[#1F653F] to-[#2F8054] p-6 text-white relative">
                <h3 class="text-xl font-bold">Ubah Kata Sandi</h3>
                <p class="text-white/70 text-sm">Ganti kata sandi Anda secara berkala untuk keamanan.</p>
                <button onclick="closePasswordModal()" class="absolute right-6 top-6 text-white/50 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form action="{{ route('profilMahasiswa.password') }}" method="POST" class="p-8">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2F8054] focus:ring-0 transition-all font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kata Sandi Baru</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2F8054] focus:ring-0 transition-all font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2F8054] focus:ring-0 transition-all font-bold text-gray-700">
                    </div>
                </div>
                
                <div class="mt-8 flex gap-3">
                    <button type="button" onclick="closePasswordModal()" class="flex-1 px-6 py-3 border-2 border-gray-100 text-gray-500 rounded-xl font-bold hover:bg-gray-50 transition-all">Batal</button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-[#2E7D55] text-white rounded-xl font-bold shadow-lg hover:shadow-green-900/20 active:scale-95 transition-all">Update Password</button>
                </div>
            </form>
        </div>
    </div>
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

function enableEditing() {
    const inputs = document.querySelectorAll('.editable-input');
    inputs.forEach(input => {
        input.removeAttribute('readonly');
        input.removeAttribute('disabled');
        input.classList.add('border-b-2', 'border-green-500', 'bg-green-50/10');
    });
    
    document.getElementById('edit-actions').classList.remove('hidden');
    document.getElementById('photo-overlay').classList.remove('hidden');
    
    // Smooth scroll to fields
    document.getElementById('content-personal').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function showPasswordModal() {
    document.getElementById('password-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePasswordModal() {
    document.getElementById('password-modal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            let preview = document.getElementById('profile-preview');
            let placeholder = document.getElementById('profile-placeholder');
            
            if (!preview) {
                preview = document.createElement('img');
                preview.id = 'profile-preview';
                preview.className = 'h-full w-full object-cover';
                placeholder.parentNode.prepend(preview);
                placeholder.classList.add('hidden');
            }
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Add event listener for photo overlay
document.getElementById('photo-overlay').addEventListener('click', () => {
    document.getElementById('foto-input').click();
});
</script>
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.3s ease-out forwards;
    }
</style>
@endpush