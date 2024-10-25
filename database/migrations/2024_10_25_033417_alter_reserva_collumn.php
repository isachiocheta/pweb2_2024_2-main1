<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterReservaCollumn extends Migration
{
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->string('status', 50)->change();
        });
    }

    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->string('status', 255)->change();
        });
    }
}
