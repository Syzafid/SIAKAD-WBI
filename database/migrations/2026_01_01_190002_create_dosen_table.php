<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
    $table->id('dosen_id');

    $table->unsignedBigInteger('user_id')->unique();

    $table->string('nip', 50)->nullable()->unique();
    $table->string('nama', 150);
    $table->date('tanggal_lahir')->nullable();

    // wilayah (kelurahan level)
    $table->unsignedBigInteger('wilayah_id')->nullable();

    $table->text('alamat_detail')->nullable();
    $table->string('no_hp', 30)->nullable();

    $table->unsignedBigInteger('prodi_id')->nullable();

    $table->boolean('is_wali')->default(false);
    $table->string('jabatan', 100)->nullable();

    $table->timestamps();

    // Foreign Keys
    $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
    $table->foreign('wilayah_id')->references('wilayah_id')->on('wilayah')->nullOnDelete();
    $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->nullOnDelete();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
