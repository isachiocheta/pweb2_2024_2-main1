<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPacote extends Migration
{
    public function up()
    {
        Schema::table('pacotes', function (Blueprint $table) {
            $table->string('descricao')->nullable(); // Adicionando uma descrição
        });
    }

    public function down()
    {
        Schema::table('pacotes', function (Blueprint $table) {
            $table->dropColumn('descricao');
        });
    }
}
