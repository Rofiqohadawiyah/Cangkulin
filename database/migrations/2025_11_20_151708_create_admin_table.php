<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin'); // otomatis AUTO_INCREMENT
            $table->string('nama_admin', 100);
            $table->string('email', 100);
            $table->string('no_hp_admin', 20);
            $table->string('username', 20);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
