<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMueblesTable extends Migration
{
    public function up()
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('tipo');        // Ej: "Silla", "Mesa", "Casillero", etc.
            $table->string('ubicacion')->nullable();
            $table->string('estado')->default('disponible'); // Ej: "disponible", "dañado", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('muebles');
    }
}
