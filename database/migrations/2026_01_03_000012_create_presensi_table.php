<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id('presensi_id');
            $table->unsignedBigInteger('pertemuan_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->enum('status', ['hadir', 'sakit', 'izin', 'alpa', 'dispensasi']);
            $table->timestamp('waktu_absen')->nullable();
            $table->timestamps();

            $table->foreign('pertemuan_id')->references('pertemuan_id')->on('pertemuan')->cascadeOnDelete();
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
