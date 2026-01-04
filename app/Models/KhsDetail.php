<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhsDetail extends Model
{
    use HasFactory;

    protected $table = 'khs_detail';
    protected $fillable = ['khs_id', 'matakuliah_id', 'sks', 'nilai_angka', 'nilai_huruf', 'bobot'];

    public function khs()
    {
        return $this->belongsTo(Khs::class, 'khs_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}
