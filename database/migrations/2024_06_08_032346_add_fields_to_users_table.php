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
        Schema::table('users', function (Blueprint $table) {
            $table->string('ape_pat')->nullable();
            $table->string('ape_mat')->nullable();
            $table->date('fec_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->tinyInteger('estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ape_pat');
            $table->dropColumn('ape_mat');
            $table->dropColumn('fec_nacimiento');
            $table->dropColumn('direccion');
            $table->dropColumn('estado');
        });
    }
};
