<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('mueble_id');
            $table->unsignedBigInteger('materia_id');
            $table->date('fecha_reserva');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado', 20)->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Índices para mejorar el rendimiento
            $table->index('docente_id');
            $table->index('mueble_id');
            $table->index('materia_id');
            $table->index('fecha_reserva');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};