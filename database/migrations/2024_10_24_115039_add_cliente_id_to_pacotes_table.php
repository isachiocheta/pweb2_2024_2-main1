<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('pacotes', function (Blueprint $table) {
            $table->foreignId('cliente_id')
                ->after('id') 
                ->constrained('clientes'); 
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::table('pacotes', function (Blueprint $table) {
            $table->dropForeign(['cliente_id']);
            $table->dropColumn('cliente_id');
        });
    }
};
