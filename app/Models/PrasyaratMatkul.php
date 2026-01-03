<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasyaratMatkul extends Model
{
    use HasFactory;

    protected $table = 'prasyarat_matkul';
    protected $fillable = ['matkul_id', 'prasyarat_matkul_id', 'minimum_nilai'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }

    public function prasyarat()
    {
        return $this->belongsTo(Matakuliah::class, 'prasyarat_matkul_id');
    }
}
