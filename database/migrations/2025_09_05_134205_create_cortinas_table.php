<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->time('hora_apertura')->nullable();
            $table->time('hora_cierre')->nullable();
            $table->json('dias')->nullable(); // Guardamos los días como array JSON
            $table->boolean('estado')->default(false); // false = cerrada, true = abierta
            $table->boolean('automatica')->default(false); // control por clima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cortinas');
    }
};
