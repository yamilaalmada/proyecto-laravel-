<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia_semana', 15); // lunes, martes, etc.
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('actividad', 100);
            $table->string('responsable', 100)->nullable();
            $table->string('aula_salon', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};