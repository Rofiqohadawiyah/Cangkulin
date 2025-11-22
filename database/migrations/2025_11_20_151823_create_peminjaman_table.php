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
        $table->date('tanggal_pinjam');
        $table->date('tanggal_kembali')->nullable();
        $table->string('id_kelompoktani', 10);
        $table->unsignedBigInteger('id_admin');
        $table->unsignedBigInteger('id_status');
        $table->date('tenggat_pinjam')->nullable();

        $table->foreign('id_kelompoktani')->references('id_kelompoktani')->on('kelompok_tani');
        $table->foreign('id_admin')->references('id_admin')->on('admin');
        $table->foreign('id_status')->references('id_status')->on('status');

        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
