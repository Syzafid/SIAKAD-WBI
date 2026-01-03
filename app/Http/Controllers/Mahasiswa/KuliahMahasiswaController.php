<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class KuliahMahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Fetch all KHS records for this student
        $khsRecords = DB::table('khs')
            ->join('semester_ajaran', 'khs.semester_ajaran_id', '=', 'semester_ajaran.semester_ajaran_id')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->orderBy('semester_ajaran.tahun_ajaran', 'asc')
            ->orderBy('semester_ajaran.semester', 'asc')
            ->get();

        $semestersData = [];
        $ipsLabels = [];
        $ipsData = [];
        $ipkData = [];
        
        $totalSks = 0;
        $maxIps = 0;
        $maxIpsSemester = '-';
        $lulusCount = 0;

        foreach ($khsRecords as $index => $khs) {
            $semesterName = $khs->tahun_ajaran . ' ' . ucfirst($khs->semester);
            $totalSks += $khs->total_sks;
            
            if ($khs->ip > $maxIps) {
                $maxIps = $khs->ip;
                $maxIpsSemester = $semesterName;
            }

            // Assume status is 'Lulus' if it's a past semester KHS
            // Usually we'd check if all grades are finalized, but for this demo,
            // if a KHS exists, we count it as a completed semester.
            $status = 'Lulus';
            $badgeColor = 'green';
            $lulusCount++;

            $semestersData[] = [
                'no' => $index + 1,
                'semester' => $semesterName,
                'ips' => $khs->ip,
                'sks' => $khs->total_sks,
                'ipk' => $khs->ipk,
                'sks_total' => $totalSks,
                'status' => $status,
                'badge_color' => $badgeColor
            ];

            $ipsLabels[] = $semesterName;
            $ipsData[] = $khs->ip;
            $ipkData[] = $khs->ipk;
        }

        $avgIps = count($khsRecords) > 0 ? $khsRecords->avg('ip') : 0;
        $latestIpk = count($khsRecords) > 0 ? $khsRecords->last()->ipk : 0;
        $totalSemester = count($khsRecords);

        return view('kuliahMahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'stats' => [
                'total_semester' => $totalSemester,
                'ipk_kumulatif' => $latestIpk,
                'total_sks' => $totalSks,
                'avg_ips' => round($avgIps, 2),
                'max_ips' => $maxIps,
                'max_ips_semester' => $maxIpsSemester,
                'lulus_count' => $lulusCount,
                'estimasi_lulus' => max(0, 8 - $totalSemester) // Simplified estimation
            ],
            'semestersData' => $semestersData,
            'chart' => [
                'labels' => $ipsLabels,
                'ips' => $ipsData,
                'ipk' => $ipkData
            ]
        ]);
    }
}
