<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Khs;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ArsipNilaiController extends Controller
{
    /**
     * Display a listing of completed semesters (the "Folder" view).
     */
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Fetch all KHS records for this student with semester information
        $arsip = Khs::with('semesterAjaran')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->join('semester_ajaran', 'khs.semester_ajaran_id', '=', 'semester_ajaran.semester_ajaran_id')
            ->orderBy('semester_ajaran.tahun_ajaran', 'desc')
            ->orderBy('semester_ajaran.semester', 'desc')
            ->get();

        return view('arsipNilai.index', compact('arsip', 'mahasiswa'));
    }

    /**
     * Display the detailed grades for a specific semester.
     */
    public function show($id)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $khs = Khs::with(['semesterAjaran', 'details.matakuliah'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('khs_id', $id)
            ->firstOrFail();

        // Calculate Grade Distribution
        $details = $khs->details;
        $totalCourses = $details->count();
        
        $distribution = [
            'A' => ['count' => 0, 'color' => 'green'],
            'B+' => ['count' => 0, 'color' => 'blue'],
            'B' => ['count' => 0, 'color' => 'yellow'],
            'C' => ['count' => 0, 'color' => 'orange'],
            'D/E' => ['count' => 0, 'color' => 'red'],
        ];

        foreach ($details as $detail) {
            $grade = $detail->nilai_huruf;
            if (in_array($grade, ['A', 'A-'])) {
                $distribution['A']['count']++;
            } elseif (in_array($grade, ['B+', 'B'])) {
                $distribution['B+']['count']++; // Simplified for UI
            } elseif ($grade == 'B-') {
                $distribution['B']['count']++;
            } elseif (in_array($grade, ['C+', 'C'])) {
                $distribution['C']['count']++;
            } else {
                $distribution['D/E']['count']++;
            }
        }

        return view('arsipNilai.show', compact('khs', 'mahasiswa', 'distribution', 'totalCourses'));
    }

    public function exportPdf($id)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenWali'])->where('user_id', $user->id)->firstOrFail();

        $khs = Khs::with(['semesterAjaran', 'details.matakuliah'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('khs_id', $id)
            ->firstOrFail();

        $data = [
            'mahasiswa' => $mahasiswa,
            'khs' => $khs,
            'date' => now()->translatedFormat('d F Y')
        ];

        $pdf = Pdf::loadView('arsipNilai.pdf', $data);
        $fileName = 'KHS_' . str_replace('/', '-', $khs->semesterAjaran->tahun_ajaran) . '_' . $khs->semesterAjaran->semester . '_' . $mahasiswa->npm . '.pdf';
        
        return $pdf->download($fileName);
    }
}
