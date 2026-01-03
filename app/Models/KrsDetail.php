<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KrsDetail extends Model
{
    protected $table = 'krs_details';
    protected $primaryKey = 'krs_detail_id';
    protected $fillable = ['krs_id', 'kelas_id', 'tipe_pengambilan', 'status'];

    public function krs()
    {
        return $this->belongsTo(Krs::class, 'krs_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
