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
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del aire
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->integer('temperatura')->nullable(); // Temperatura deseada
            $table->boolean('automatica')->default(false); // Si funciona automático
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
        Schema::dropIfExists('aire_acondicionados');
    }
};
