<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id'); // Dosen yang memberi nilai
            $table->decimal('nilai_angka', 5, 2);
            $table->string('nilai_huruf', 2);
            $table->decimal('bobot', 3, 2);
            $table->boolean('status_kunci')->default(false);
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->cascadeOnDelete();
            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->cascadeOnDelete();
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
