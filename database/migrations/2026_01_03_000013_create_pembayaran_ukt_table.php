<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_ukt', function (Blueprint $table) {
            $table->id('pembayaran_ukt_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('semester_ajaran_id');
            $table->decimal('nominal', 12, 2);
            $table->date('tanggal_bayar')->nullable();
            $table->enum('status', ['belum', 'lunas', 'bebas'])->default('belum');
            $table->string('metode', 50)->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->cascadeOnDelete();
            $table->foreign('semester_ajaran_id')->references('semester_ajaran_id')->on('semester_ajaran')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_ukt');
    }
};
