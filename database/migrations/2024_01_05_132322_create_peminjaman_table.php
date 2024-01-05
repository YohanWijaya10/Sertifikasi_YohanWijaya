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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_koleksi');
            $table->unsignedBigInteger('id_anggota');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->timestamps();

            $table->foreign('id_koleksi')->references('id_koleksi')->on('koleksi')->onDelete('SET NULL');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('SET NULL');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
