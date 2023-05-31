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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('user_nama');
            $table->string('user_kontak');
            $table->text('deskripsi_laporan');
            $table->string('foto_konfirmasi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('barang_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('barang_id')->references('id_barang')->on('barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
