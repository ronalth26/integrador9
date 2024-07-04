<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateEstadoSeguimientoTable extends Migration
{
    public function up()
    {
        Schema::create('estado_seguimiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Insertar estados iniciales
        DB::table('estado_seguimiento')->insert([
            ['nombre' => 'registro'],
            ['nombre' => 'diagnostico'],
            ['nombre' => 'seguimiento'],
            ['nombre' => 'finalizado'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('estado_seguimiento');
    }
}
