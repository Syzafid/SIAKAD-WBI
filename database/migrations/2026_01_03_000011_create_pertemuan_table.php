<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pertemuan', function (Blueprint $table) {
            $table->id('pertemuan_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->date('tanggal');
            $table->smallInteger('pertemuan_ke');
            $table->timestamps();

            $table->foreign('jadwal_id')->references('jadwal_id')->on('jadwal')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pertemuan');
    }
};
