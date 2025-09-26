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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
    
    // Relación con profesor
            $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade');
    
    // Relación con aula
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
    
    // Información del horario
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
    
    // Materia opcional
            $table->string('materia')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
