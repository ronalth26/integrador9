<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('especialista_id');
            $table->unsignedBigInteger('estado');
            $table->text('observaciones');
            $table->text('medicacion');
            $table->text('diagnostico');
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('especialista_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado')->references('id')->on('estado_seguimiento');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
}
