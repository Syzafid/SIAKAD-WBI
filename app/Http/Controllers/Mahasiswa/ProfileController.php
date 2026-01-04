<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenWali'])
            ->where('user_id', $user->id)
            ->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        return view('profilMahasiswa.index', compact('mahasiswa', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'nik' => 'nullable|string|max:20',
            'agama' => 'nullable|string|max:20',
            'kewarganegaraan' => 'nullable|string|max:50',
            'nama_ayah' => 'nullable|string|max:150',
            'nama_ibu' => 'nullable|string|max:150',
            'no_hp_ortu' => 'nullable|string|max:30',
            'no_hp' => 'nullable|string|max:30',
            'email_pribadi' => 'nullable|email|max:150',
            'alamat_detail' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $path = $request->file('foto')->store('mahasiswa/foto', 'public');
            $validated['foto'] = $path;
        }

        $mahasiswa->update($validated);

        return back()->with('success', 'Profil Anda telah berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
