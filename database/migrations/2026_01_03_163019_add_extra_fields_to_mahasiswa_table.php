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
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('tempat_lahir', 100)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('kewarganegaraan', 50)->default('Indonesia');
            $table->string('nama_ayah', 150)->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->string('no_hp_ortu', 30)->nullable();
            $table->string('email_pribadi', 150)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn([
                'tempat_lahir', 'jenis_kelamin', 'nik', 'agama', 
                'kewarganegaraan', 'nama_ayah', 'nama_ibu', 
                'no_hp_ortu', 'email_pribadi'
            ]);
        });
    }
};
