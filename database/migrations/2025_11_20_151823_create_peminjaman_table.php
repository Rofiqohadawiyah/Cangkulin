<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_pinjam');

            // tanggal pinjam & deadline
            $table->date('tanggal_pinjam');
            $table->date('tenggat_pinjam')->nullable();

            // RELASI
            $table->unsignedBigInteger('id_kelompoktani');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_status');

            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('id_kelompoktani')
                ->references('id_kelompoktani')
                ->on('kelompok_tani')
                ->onDelete('cascade');

            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admin')
                ->onDelete('cascade');

            $table->foreign('id_status')
                ->references('id_status')
                ->on('status')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};