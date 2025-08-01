<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialUsoAireAcondicionadosTable extends Migration
{
    public function up()
    {
        Schema::create('historial_uso_aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aire_acondicionado_id')->constrained()->onDelete('cascade');
            $table->string('estado'); // Ej: encendido, apagado, mantenimiento
            $table->dateTime('fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
}
