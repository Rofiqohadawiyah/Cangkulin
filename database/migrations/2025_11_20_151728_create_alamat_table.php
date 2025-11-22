<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('alamat', function (Blueprint $table) {
        $table->id('id_alamat');
        $table->string('desa', 50);
        $table->string('kecamatan', 50);
        $table->string('kabupaten', 50);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('alamat');
    }
};
