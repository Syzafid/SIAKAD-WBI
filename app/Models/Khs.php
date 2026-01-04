<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $table = 'khs';
    protected $primaryKey = 'khs_id';
    protected $fillable = ['mahasiswa_id', 'semester_ajaran_id', 'total_sks', 'total_bobot', 'ip', 'ipk', 'nasehat', 'show_nasehat'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function semesterAjaran()
    {
        return $this->belongsTo(SemesterAjaran::class, 'semester_ajaran_id');
    }

    public function details()
    {
        return $this->hasMany(KhsDetail::class, 'khs_id');
    }
}
