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
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('tipe', ['full', 'per_kamar']);
            $table->enum('status', ['tersedia', 'tidak_tersedia']);
            $table->unsignedInteger('jumlah_kamar')->nullable(); // hanya diisi kalau 'per_kamar'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};
