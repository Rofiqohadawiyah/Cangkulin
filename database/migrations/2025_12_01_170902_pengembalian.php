<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('id_pengembalian');

            $table->unsignedBigInteger('id_pinjam');

            $table->date('tanggal_pengembalian')->nullable();

            $table->timestamps();

            $table->foreign('id_pinjam')
                ->references('id_pinjam')
                ->on('peminjaman')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};