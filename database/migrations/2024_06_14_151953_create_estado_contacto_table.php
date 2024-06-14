<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_contacto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::table('contactos', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->nullable()->after('fecha_revision');

            $table->foreign('estado_id')->references('id')->on('estado_contacto')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->dropForeign(['estado_id']);
            $table->dropColumn('estado_id');
        });

        Schema::dropIfExists('estado_contacto');
    }
}
