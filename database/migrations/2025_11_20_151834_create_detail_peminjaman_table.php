<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('detail_peminjaman', function (Blueprint $table) {
        $table->integer('jumlah');
        $table->unsignedBigInteger('id_alat');
        $table->unsignedBigInteger('id_pinjam');

        $table->primary(['id_alat', 'id_pinjam']);

        $table->foreign('id_alat')->references('id_alat')->on('alat_pertanian');
        $table->foreign('id_pinjam')->references('id_pinjam')->on('peminjaman');
    });
}

    public function down()
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
