<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bicicleta_ponto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bicicleta_id')->constrained('bicycles')->onDelete('cascade');
            $table->foreignId('ponto_id')->constrained('points')->onDelete('cascade');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicicleta_ponto');
    }
};
