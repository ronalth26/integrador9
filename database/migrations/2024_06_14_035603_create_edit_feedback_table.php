<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->foreignId('estado_feedback')->nullable()->constrained('estado_feedback');
         });
    }

    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign(['estado_feedback_id']);
        });
    }
};
