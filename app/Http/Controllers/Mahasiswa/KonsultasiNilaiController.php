<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Khs;
use App\Models\KhsDetail;

class KonsultasiNilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenWali'])->where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Get latest KHS
        $latestKhs = Khs::with('semesterAjaran')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->orderBy('semester_ajaran_id', 'desc')
            ->first();

        // Get all failed courses (D, E, or TL)
        // Usually D and E are considered failing or needing retake.
        $failedDetails = KhsDetail::with('matakuliah')
            ->whereHas('khs', function($q) use ($mahasiswa) {
                $q->where('mahasiswa_id', $mahasiswa->mahasiswa_id);
            })
            ->whereIn('nilai_huruf', ['D', 'E', 'TL'])
            ->get();

        return view('konsultasiNilai.index', [
            'mahasiswa' => $mahasiswa,
            'latestKhs' => $latestKhs,
            'failedDetails' => $failedDetails,
        ]);
    }
}
