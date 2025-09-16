<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 50); // led, incandescente, fluorescente
            $table->integer('potencia_w');
            $table->string('color_luz', 50); // blanco, amarillo, etc.
            $table->string('ubicacion', 100);
            $table->string('estado', 20)->default('funcional'); // funcional, fundido, parpadeando
            $table->date('fecha_instalacion')->nullable();
            $table->date('fecha_ultimo_cambio')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focos');
    }
};