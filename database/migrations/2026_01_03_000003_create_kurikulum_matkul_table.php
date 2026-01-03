<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kurikulum_matkul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurikulum_id');
            $table->unsignedBigInteger('matkul_id');
            $table->smallInteger('semester_ke');
            $table->enum('tipe_semester', ['ganjil', 'genap']);
            $table->boolean('wajib')->default(true);
            $table->timestamps();

            $table->foreign('kurikulum_id')->references('kurikulum_id')->on('kurikulum')->cascadeOnDelete();
            $table->foreign('matkul_id')->references('matakuliah_id')->on('matakuliah')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kurikulum_matkul');
    }
};
