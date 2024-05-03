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
        Schema::table('bicycles', function (Blueprint $table) {
            $table->unsignedBigInteger('ponto_id')->after('descricao')->nullable();
            $table->foreign('ponto_id')->references('id')->on('points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bicycles', function (Blueprint $table) {
            $table->dropForeign(['ponto_id']);
            $table->dropColumn('ponto_id');
        });
    }
};
