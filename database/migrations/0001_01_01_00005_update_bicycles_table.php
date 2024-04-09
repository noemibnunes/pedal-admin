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
            $table->string('descricao')->after('tipo')->nullable();
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bicycles', function (Blueprint $table) {
            $table->string('tipo')->after('modelo')->nullable();
            $table->dropColumn('descricao');
        });
    }
};
