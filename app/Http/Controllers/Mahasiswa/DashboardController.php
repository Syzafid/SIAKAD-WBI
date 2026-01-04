<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = \App\Models\Mahasiswa::with(['prodi', 'dosenWali', 'khs.semesterAjaran', 'khs.details.matakuliah', 'activeKrs.semesterAjaran'])
            ->where('user_id', $user->id)
            ->first();

        if (!$mahasiswa) {
            return redirect('/')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // IPK - Latest KHS usually has the latest IPK
        $latestKhs = $mahasiswa->khs()->orderBy('created_at', 'desc')->first();
        $ipk = $latestKhs ? $latestKhs->ipk : 0;

        // SKS Lulus - Sum of SKS where grade is not E
        $sksLulus = \App\Models\KhsDetail::whereIn('khs_id', $mahasiswa->khs->pluck('khs_id'))
            ->where('nilai_huruf', '!=', 'E')
            ->sum('sks');

        // Academic Progress (Chart)
        $progressLabels = $mahasiswa->khs->map(function($k) {
            return $k->semesterAjaran->semester . ' ' . $k->semesterAjaran->tahun_ajaran;
        });
        $ipsData = $mahasiswa->khs->pluck('ip');
        $ipkData = $mahasiswa->khs->pluck('ipk');

        // Grade Distribution (Pie Chart)
        $allDetails = \App\Models\KhsDetail::whereIn('khs_id', $mahasiswa->khs->pluck('khs_id'))->get();
        $distribution = $allDetails->groupBy('nilai_huruf')->map->count();
        $totalGrades = $allDetails->count();
        $distributionData = $distribution->map(function($count) use ($totalGrades) {
            return ($count / $totalGrades) * 100;
        });

        // Grade Stats (Bar Chart)
        $gradeStats = $allDetails->groupBy('nilai_huruf')->map->sum('sks');
        
        // Ensure some common grades exist for chart labels even if 0
        $commonGrades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'D', 'E'];
        $gradeStatsFinal = [];
        foreach ($commonGrades as $g) {
            $gradeStatsFinal[$g] = $gradeStats->get($g, 0);
        }

        return view('dashboard.index', compact(
            'mahasiswa', 
            'ipk', 
            'sksLulus', 
            'progressLabels', 
            'ipsData', 
            'ipkData', 
            'distributionData', 
            'gradeStatsFinal'
        ));
    }
}
