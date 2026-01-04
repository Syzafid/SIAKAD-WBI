<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurikulumMatkul extends Model
{
    use HasFactory;

    protected $table = 'kurikulum_matkul';
    protected $fillable = ['kurikulum_id', 'matkul_id', 'semester_ke', 'tipe_semester', 'wajib'];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'kurikulum_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }
}
