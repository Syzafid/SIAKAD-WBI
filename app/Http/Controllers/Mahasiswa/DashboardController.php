<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $mahasiswa = DB::table('mahasiswa')
            ->where('user_id', $userId)
            ->first();

        $dosenWali = DB::table('dosen')
            ->where('dosen_id', $mahasiswa->dosen_wali_id)
            ->first();

        $prodi = DB::table('prodi')
            ->where('prodi_id', $mahasiswa->prodi_id)
            ->first();

        return view('dashboard.index', compact('mahasiswa', 'dosenWali', 'prodi'));
    }
}
