<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained('focos')->onDelete('cascade');
            $table->dateTime('fecha_hora_encendido');
            $table->dateTime('fecha_hora_apagado')->nullable();
            $table->string('accion', 20); // encendido, apagado, cambio
            $table->string('usuario', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_focos');
    }
};