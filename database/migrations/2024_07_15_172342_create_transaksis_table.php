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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('faktur');
            // $table->foreignId('peserta_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('kursus_id')->constrained()->onDelete('cascade');
            $table->decimal('harga', 10, 2);
            $table->string('catatan');
            $table->timestamps();

            // $table->unique(['peserta_id', 'kursus_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
