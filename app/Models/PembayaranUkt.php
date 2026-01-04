<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranUkt extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_ukt';
    protected $primaryKey = 'pembayaran_ukt_id';
    protected $fillable = ['mahasiswa_id', 'semester_ajaran_id', 'nominal', 'tanggal_bayar', 'status', 'metode'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function semesterAjaran()
    {
        return $this->belongsTo(SemesterAjaran::class, 'semester_ajaran_id');
    }
}
