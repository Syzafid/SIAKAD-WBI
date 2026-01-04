<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Pertemuan;
use App\Models\Presensi;
use App\Models\SemesterAjaran;

class KehadiranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $activeSemester = SemesterAjaran::where('is_active', true)->first();

        if (!$activeSemester) {
            return redirect('/dashboard')->with('error', 'Semester aktif tidak ditemukan.');
        }

        // Get student's active KRS
        $krs = Krs::with(['details.kelas.matakuliah', 'details.kelas.jadwals.pertemuan.presensi' => function($q) use ($mahasiswa) {
                $q->where('mahasiswa_id', $mahasiswa->mahasiswa_id);
            }])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('semester_ajaran_id', $activeSemester->semester_ajaran_id)
            ->first();

        if (!$krs) {
            return view('kehadiran.index', [
                'stats' => [
                    'total_mk' => 0,
                    'avg_attendance' => 0,
                    'mk_with_data' => 0,
                    'mk_critical' => 0
                ],
                'courseAttendance' => []
            ]);
        }

        $courseAttendance = [];
        $totalMk = $krs->details->count();
        $mkWithData = 0;
        $mkCritical = 0;
        $totalAttendancePercentage = 0;

        foreach ($krs->details as $detail) {
            $kelas = $detail->kelas;
            $matkul = $kelas->matakuliah;

            // Gather all meetings for this class
            $meetings = Pertemuan::whereHas('jadwal', function($q) use ($kelas) {
                $q->where('kelas_id', $kelas->kelas_id);
            })->orderBy('pertemuan_ke', 'asc')->get();

            $attendanceData = array_fill(0, 15, '-');
            $presentCount = 0;
            $recordedCount = 0;

            foreach ($meetings as $meeting) {
                $presensi = Presensi::where('pertemuan_id', $meeting->pertemuan_id)
                    ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
                    ->first();

                if ($presensi) {
                    $recordedCount++;
                    $status = strtoupper(substr($presensi->status, 0, 1)); // H, I, S, A
                    $attendanceData[$meeting->pertemuan_ke - 1] = $status;
                    
                    if ($status === 'H') {
                        $presentCount++;
                    }
                }
            }

            $percentage = $recordedCount > 0 ? ($presentCount / $recordedCount) * 100 : 0;
            
            if ($recordedCount > 0) {
                $mkWithData++;
                $totalAttendancePercentage += $percentage;
            }

            if ($recordedCount > 0 && $percentage < 75) {
                $mkCritical++;
            }

            $courseAttendance[] = [
                'id' => $matkul->matakuliah_id,
                'name' => $matkul->nama_mk,
                'code' => $matkul->kode_mk,
                'meetings_count' => $recordedCount . ' pertemuan tercatat',
                'percentage' => round($percentage, 2),
                'status' => round($percentage, 1) . '%',
                'data' => $attendanceData
            ];
        }

        $avgAttendance = $mkWithData > 0 ? $totalAttendancePercentage / $mkWithData : 0;

        return view('kehadiran.index', [
            'stats' => [
                'total_mk' => $totalMk,
                'avg_attendance' => round($avgAttendance, 2),
                'mk_with_data' => $mkWithData,
                'mk_critical' => $mkCritical
            ],
            'courseAttendance' => $courseAttendance
        ]);
    }
}
