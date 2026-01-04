<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPengampu extends Model
{
    use HasFactory;

    protected $table = 'dosen_pengampu';
    protected $fillable = ['kelas_id', 'dosen_id', 'is_ketua'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
