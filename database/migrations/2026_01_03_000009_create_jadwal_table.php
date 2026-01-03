<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->unsignedBigInteger('kelas_id');
            $table->enum('hari', ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruangan', 50);
            $table->timestamps();

            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
