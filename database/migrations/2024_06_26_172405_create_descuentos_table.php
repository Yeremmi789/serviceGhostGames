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
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->float('precio');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('activo');

            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descuentos');
    }
};
