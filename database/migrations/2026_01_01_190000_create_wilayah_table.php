<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id('wilayah_id');

            $table->string('nama', 150);

            $table->enum('tipe', [
                'provinsi',
                'kabupaten',
                'kecamatan',
                'kelurahan'
            ]);

            // relasi ke induk wilayah
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->timestamps();

            // self reference FK
            $table->foreign('parent_id')
                  ->references('wilayah_id')
                  ->on('wilayah')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};
