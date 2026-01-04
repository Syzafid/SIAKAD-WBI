<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('matakuliah_id')->after('kode_kelas')->nullable();
            
            $table->foreign('matakuliah_id')->references('matakuliah_id')->on('matakuliah')->cascadeOnDelete();
        });

        // After adding the column, we can drop the old ones
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn(['nama_matakuliah', 'sks']);
        });
    }

    public function down(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->string('nama_matakuliah', 150)->after('kode_kelas');
            $table->integer('sks')->after('nama_matakuliah');
            $table->dropForeign(['matakuliah_id']);
            $table->dropColumn('matakuliah_id');
        });
    }
};
