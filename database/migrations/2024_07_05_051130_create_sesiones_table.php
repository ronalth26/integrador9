<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionesTable extends Migration
{
    public function up()
    {
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('numero')->default(0);
            $table->unsignedBigInteger('seguimiento_id');
            $table->date('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->text('medicación')->nullable();
            $table->text('diagnóstico')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('resultado')->nullable();
            $table->timestamps();
            $table->tinyInteger('estado')->default(1);
            $table->foreign('seguimiento_id')->references('id')->on('seguimientos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sesiones');
    }
}
