<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('disponibilidade');
            $table->string('valor_aluguel');
            $table->string('tipo');
            $table->string('imagem');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users_adm')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};
