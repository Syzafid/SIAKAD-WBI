<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'mahasiswa_id';

    protected $fillable = [
        'user_id',
        'npm',
        'nama',
        'angkatan',
        'semester_sekarang',
        'prodi_id',
        'dosen_wali_id',
        'wilayah_id',
        'ukt_nominal',
        'status_beasiswa'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function dosenWali()
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali_id');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'mahasiswa_id');
    }

    public function activeKrs()
    {
        return $this->hasOne(Krs::class, 'mahasiswa_id')
            ->whereHas('semesterAjaran', function($q) {
                $q->where('is_active', true);
            });
    }
}
