<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterReserva extends Migration
{
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->text('observacoes')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn('observacoes');
        });
    }
}

