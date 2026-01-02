<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id('krs_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('semester_ajaran_id');
            $table->enum('status', ['draft', 'diajukan', 'disetujui_wali', 'ditolak', 'final'])->default('draft');
            $table->integer('total_sks')->default(0);
            $table->timestamp('tanggal_pengajuan')->nullable();
            $table->timestamp('tanggal_validasi')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->cascadeOnDelete();
            $table->foreign('semester_ajaran_id')->references('semester_ajaran_id')->on('semester_ajaran')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
