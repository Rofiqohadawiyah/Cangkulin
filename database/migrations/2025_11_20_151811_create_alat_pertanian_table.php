<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('alat_pertanian', function (Blueprint $table) {
        $table->id('id_alat');
        $table->string('nama_alat', 100);
        $table->integer('jumlah');
        $table->string('gambar_alat', 255)->nullable();
        $table->boolean('is_active')->default(1);
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('alat_pertanian');
    }
};
