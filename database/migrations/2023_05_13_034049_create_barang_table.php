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
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->string('kontak');
            $table->string('lokasi');
            $table->string('gambar');
            $table->string('status');
            $table->string('kategori');
            $table->date('tanggal');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
