<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\SemesterAjaran;
use App\Models\Kelas;
use App\Models\Kurikulum;

class KrsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $krsList = Krs::with(['semesterAjaran'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->orderBy('semester_ajaran_id', 'desc')
            ->get();

        $activeSemester = SemesterAjaran::where('is_active', true)->first();
        $hasActiveKrs = false;
        if ($activeSemester) {
            $hasActiveKrs = Krs::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
                ->where('semester_ajaran_id', $activeSemester->semester_ajaran_id)
                ->exists();
        }

        return view('KRS.index', compact('mahasiswa', 'krsList', 'activeSemester', 'hasActiveKrs'));
    }

    public function create()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $activeSemester = SemesterAjaran::where('is_active', true)->first();
        if (!$activeSemester) {
            return redirect()->route('KRS.index')->with('error', 'Semester aktif tidak ditemukan.');
        }

        // Check if student already has KRS for this active semester
        $existingKrs = Krs::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('semester_ajaran_id', $activeSemester->semester_ajaran_id)
            ->first();

        if ($existingKrs) {
             return redirect()->route('KRS.index')->with('info', 'Anda sudah memiliki KRS untuk semester ini.');
        }

        // Fetch available classes based on Prodi, Active Semester, AND student's Semester Sekarang
        $availableClasses = Kelas::with(['matakuliah', 'dosenPengampu.dosen', 'jadwals'])
            ->where('prodi_id', $mahasiswa->prodi_id)
            ->where('semester_ajaran_id', $activeSemester->semester_ajaran_id)
            ->whereHas('matakuliah', function($q) use ($mahasiswa, $activeSemester) {
                // 1. Must match student's current semester paket
                $q->where('semester_paket', $mahasiswa->semester_sekarang);
                
                // 2. Must match the active semester type (Ganjil/Genap)
                $q->whereHas('kurikulum', function($sq) use ($activeSemester) {
                    $sq->where('kurikulum_matkul.tipe_semester', $activeSemester->semester);
                });
            })
            ->get();

        return view('KRS.create', compact('mahasiswa', 'activeSemester', 'availableClasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_ids' => 'required|array',
            'kelas_ids.*' => 'exists:kelas,kelas_id',
        ]);

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        $activeSemester = SemesterAjaran::where('is_active', true)->first();

        if (!$activeSemester) {
            return back()->with('error', 'Semester aktif tidak ditemukan.');
        }

        // Check again to be safe
        $existingKrs = Krs::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('semester_ajaran_id', $activeSemester->semester_ajaran_id)
            ->first();

        if ($existingKrs) {
             return redirect()->route('KRS.index')->with('error', 'Anda sudah memiliki KRS untuk semester ini.');
        }

        $krs = Krs::create([
            'mahasiswa_id' => $mahasiswa->mahasiswa_id,
            'semester_ajaran_id' => $activeSemester->semester_ajaran_id,
            'status' => 'belum disetujui', 
            'total_sks' => 0, 
            'tanggal_pengajuan' => now(),
        ]);

        $totalSks = 0;
        foreach ($request->kelas_ids as $kelasId) {
            $kelas = Kelas::with('matakuliah')->find($kelasId);
            KrsDetail::create([
                'krs_id' => $krs->krs_id,
                'kelas_id' => $kelasId,
                'tipe_pengambilan' => 'normal',
                'status' => 'diambil'
            ]);
            $totalSks += $kelas->matakuliah->sks;
        }

        $krs->update(['total_sks' => $totalSks]);

        return redirect()->route('KRS.index')->with('success', 'KRS berhasil diajukan.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        $krs = Krs::with(['semesterAjaran', 'details.kelas.matakuliah', 'details.kelas.dosenPengampu.dosen'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->findOrFail($id);

        if (request()->wantsJson()) {
            return response()->json($krs);
        }

        return view('KRS.show', compact('krs'));
    }
}
