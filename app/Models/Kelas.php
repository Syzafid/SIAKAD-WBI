<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $fillable = ['kode_kelas', 'nama_matakuliah', 'sks', 'prodi_id', 'semester_ajaran_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function semesterAjaran()
    {
        return $this->belongsTo(SemesterAjaran::class, 'semester_ajaran_id');
    }
}
