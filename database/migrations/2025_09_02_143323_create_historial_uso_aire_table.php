<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_uso_aire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aire_acondicionado_id')->constrained('aire_acondicionado')->onDelete('cascade');
            $table->dateTime('fecha_hora_encendido');
            $table->dateTime('fecha_hora_apagado')->nullable();
            $table->decimal('temperatura', 4, 1); // 25.5°C
            $table->string('modo', 20); // frio, calor, ventilador
            $table->integer('velocidad_ventilador')->nullable();
            $table->string('usuario', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_uso_aire');
    }
};