<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('mahasiswa', function (Blueprint $table) {
    $table->id('mahasiswa_id');

    $table->unsignedBigInteger('user_id')->unique();

    $table->string('npm', 30)->unique();
    $table->string('nama', 150);
    $table->date('tanggal_lahir')->nullable();

    // wilayah (kelurahan level)
    $table->unsignedBigInteger('wilayah_id')->nullable();

    $table->text('alamat_detail')->nullable();
    $table->string('no_hp', 30)->nullable();

    $table->year('angkatan');
    $table->smallInteger('semester_sekarang')->default(1);

    $table->unsignedBigInteger('prodi_id');
    $table->unsignedBigInteger('dosen_wali_id')->nullable();

    $table->bigInteger('ukt_nominal')->default(0);
    $table->enum('status_beasiswa', ['100%','75%','50%','0%'])->default('0%');

    $table->timestamps();

    // Foreign Keys
    $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
    $table->foreign('wilayah_id')->references('wilayah_id')->on('wilayah')->nullOnDelete();
    $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->restrictOnDelete();
    $table->foreign('dosen_wali_id')->references('dosen_id')->on('dosen')->nullOnDelete();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
