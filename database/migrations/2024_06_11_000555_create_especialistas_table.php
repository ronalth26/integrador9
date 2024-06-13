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
        Schema::create('especialistas', function (Blueprint $table) {
            $table->id();
            $table->string('licencia')->nullable();
            $table->tinyInteger('estado')->default(1); // Valor predeterminado de 1
            $table->foreignId('tipo_id')->nullable()->constrained('tipo_especialista');
            $table->foreignId('id_user')->nullable()->constrained('users'); // Supongo que es la tabla 'users'
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
        Schema::dropIfExists('especialistas');
    }
};

