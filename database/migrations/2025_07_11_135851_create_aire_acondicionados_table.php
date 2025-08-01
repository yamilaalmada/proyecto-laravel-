<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAireAcondicionadosTable extends Migration
{
    public function up()
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('ubicacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aire_acondicionados');
    }
}
