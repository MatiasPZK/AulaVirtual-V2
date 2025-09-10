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
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_serie')->unique();
            $table->string('tipo');
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->integer('luminosidad')->default(0); // valor de 0 a 100
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
        Schema::dropIfExists('focos');
    }
};
