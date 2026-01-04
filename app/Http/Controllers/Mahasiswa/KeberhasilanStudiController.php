<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Khs;
use App\Models\SemesterAjaran;
use Barryvdh\DomPDF\Facade\Pdf;

class KeberhasilanStudiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        $mahasiswa = Mahasiswa::with('prodi')->where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $khsHistory = Khs::with('semesterAjaran')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->orderBy('semester_ajaran_id', 'asc')
            ->get();

        $ipk = 0;
        $totalIps = 0;
        $sksDitempuh = 0;
        $countSemester = $khsHistory->count();

        if ($countSemester > 0) {
            $latestKhs = $khsHistory->last();
            $ipk = $latestKhs->ipk;
            $totalIps = $khsHistory->avg('ip');
            $sksDitempuh = $khsHistory->sum('total_sks');
        }

        return view('keberhasilanStudi.index', [
            'mahasiswa' => $mahasiswa,
            'khsHistory' => $khsHistory,
            'ipk' => number_format($ipk, 2),
            'avgIps' => number_format($totalIps, 2),
            'sksDitempuh' => $sksDitempuh,
            'countSemester' => $countSemester
        ]);
    }

    public function exportPdf()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        $mahasiswa = Mahasiswa::with(['prodi', 'dosenWali'])->where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $khsHistory = Khs::with(['semesterAjaran', 'details.matakuliah'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->orderBy('semester_ajaran_id', 'asc')
            ->get();

        $data = [
            'mahasiswa' => $mahasiswa,
            'khsHistory' => $khsHistory,
            'date' => now()->format('d F Y')
        ];

        $pdf = Pdf::loadView('keberhasilanStudi.pdf', $data);
        return $pdf->download('Transkrip_Akademik_' . $mahasiswa->npm . '.pdf');
    }
}
