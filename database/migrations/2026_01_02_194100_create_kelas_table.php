<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->string('kode_kelas', 20)->unique();
            $table->string('nama_matakuliah', 150);
            $table->integer('sks');
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('semester_ajaran_id');
            $table->timestamps();

            $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->cascadeOnDelete();
            $table->foreign('semester_ajaran_id')->references('semester_ajaran_id')->on('semester_ajaran')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
