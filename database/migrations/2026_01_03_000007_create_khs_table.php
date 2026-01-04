<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khs', function (Blueprint $table) {
            $table->id('khs_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('semester_ajaran_id');
            $table->integer('total_sks');
            $table->decimal('total_bobot', 8, 2);
            $table->decimal('ip', 4, 2);
            $table->decimal('ipk', 4, 2);
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->cascadeOnDelete();
            $table->foreign('semester_ajaran_id')->references('semester_ajaran_id')->on('semester_ajaran')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
