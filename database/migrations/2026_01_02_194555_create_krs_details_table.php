<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs_details', function (Blueprint $table) {
            $table->id('krs_detail_id');
            $table->unsignedBigInteger('krs_id');
            $table->unsignedBigInteger('kelas_id');
            $table->enum('tipe_pengambilan', ['normal', 'remedial'])->default('normal');
            $table->enum('status', ['diambil', 'dibatalkan'])->default('diambil');
            $table->timestamps();

            $table->foreign('krs_id')->references('krs_id')->on('krs')->cascadeOnDelete();
            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs_details');
    }
};
