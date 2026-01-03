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
        Schema::table('khs', function (Blueprint $table) {
            $table->text('nasehat')->nullable();
            $table->boolean('show_nasehat')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('khs', function (Blueprint $table) {
            $table->dropColumn(['nasehat', 'show_nasehat']);
        });
    }
};
