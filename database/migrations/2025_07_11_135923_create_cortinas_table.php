<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortinasTable extends Migration
{
    public function up()
    {
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('ubicacion')->nullable();
            $table->string('estado')->default('cerrada'); // Por ejemplo: abierta, cerrada, rota, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cortinas');
    }
}
