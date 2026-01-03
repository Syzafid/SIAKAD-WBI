<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen_pengampu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id');
            $table->boolean('is_ketua')->default(false);
            $table->timestamps();

            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->cascadeOnDelete();
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen_pengampu');
    }
};
