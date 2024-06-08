<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) 
        {
            $table->id();
            $table->string('descripcion', 500);
            $table->dateTime('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->tinyInteger('estado')->default('1');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->foreignId('id_admin')->nullable()->constrained('users');
            $table->foreignId('tipo')->nullable()->constrained('tipo_feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};