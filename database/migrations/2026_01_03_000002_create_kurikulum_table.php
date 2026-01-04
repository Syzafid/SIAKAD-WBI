<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id('kurikulum_id');
            $table->unsignedBigInteger('prodi_id');
            $table->string('nama_kurikulum', 150);
            $table->year('tahun_berlaku');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
