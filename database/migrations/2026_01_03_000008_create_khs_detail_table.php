<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khs_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khs_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->integer('sks');
            $table->decimal('nilai_angka', 5, 2);
            $table->string('nilai_huruf', 2);
            $table->decimal('bobot', 3, 2);
            $table->timestamps();

            $table->foreign('khs_id')->references('khs_id')->on('khs')->cascadeOnDelete();
            $table->foreign('matakuliah_id')->references('matakuliah_id')->on('matakuliah')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khs_detail');
    }
};
