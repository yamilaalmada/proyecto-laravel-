<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFocosTable extends Migration
{
    public function up()
    {
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('ubicacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('focos');
    }
}
