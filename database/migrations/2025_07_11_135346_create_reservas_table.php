<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            
            // Foreign keys
            $table->foreignId('materia_id')->constrained()->onDelete('cascade');
            $table->foreignId('horario_id')->constrained()->onDelete('cascade');
            $table->foreignId('foco_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('aire_acondicionado_id')->nullable()->constrained()->onDelete('set null');

            // Si en un futuro querés agregar mueble, cortina u otros
            // $table->foreignId('mueble_id')->nullable()->constrained()->onDelete('set null');
            // $table->foreignId('cortina_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
