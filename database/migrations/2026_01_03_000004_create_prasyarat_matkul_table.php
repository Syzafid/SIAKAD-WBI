<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasyarat_matkul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('prasyarat_matkul_id');
            $table->smallInteger('minimum_nilai');
            $table->timestamps();

            $table->foreign('matkul_id')->references('matakuliah_id')->on('matakuliah')->cascadeOnDelete();
            $table->foreign('prasyarat_matkul_id')->references('matakuliah_id')->on('matakuliah')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasyarat_matkul');
    }
};
