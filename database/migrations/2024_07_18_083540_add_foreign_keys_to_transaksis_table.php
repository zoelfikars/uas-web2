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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreignId('peserta_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kursus_id')->constrained()->onDelete('cascade');
            $table->unique(['peserta_id', 'kursus_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['peserta_id']);
            $table->dropForeign(['kursus_id']);
            $table->dropColumn('peserta_id');
            $table->dropColumn('kursus_id');
        });
    }
};
