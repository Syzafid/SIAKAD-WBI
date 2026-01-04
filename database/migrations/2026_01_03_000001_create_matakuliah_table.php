<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id('matakuliah_id');
            $table->string('kode_mk', 20)->unique();
            $table->string('nama_mk', 150);
            $table->integer('sks');
            $table->integer('semester_paket')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
