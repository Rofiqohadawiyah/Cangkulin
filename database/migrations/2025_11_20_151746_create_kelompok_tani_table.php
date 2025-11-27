<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('kelompok_tani', function (Blueprint $table) {
        $table->id('id_kelompoktani');
        $table->string('nama_kelompoktani', 100);
        $table->integer('jumlah_kelompoktani');
        $table->string('no_hp_kelompoktani', 20);
        $table->unsignedBigInteger('id_alamat');
        $table->string('nik', 16);
        $table->text('deskripsi_jalan')->nullable();
        $table->boolean('is_active')->default(1);

        $table->foreign('id_alamat')->references('id_alamat')->on('alamat')->onDelete('cascade');

        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('kelompok_tani');
    }
};