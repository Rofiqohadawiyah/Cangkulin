<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('riwayat_kelompok_tani', function (Blueprint $table) {
        $table->string('id_kelompoktani', 10);
        $table->string('nama_kelompoktani', 100);
        $table->string('nik', 16);
        $table->integer('jumlah_kelompoktani');
        $table->string('no_hp_kelompoktani', 20);
        $table->text('deskripsi_jalan')->nullable();
        $table->text('alamat')->nullable();
        $table->timestamp('tanggal_hapus')->nullable();
    });
}

    public function down()
    {
        Schema::dropIfExists('riwayat_kelompok_tani');
    }
};
