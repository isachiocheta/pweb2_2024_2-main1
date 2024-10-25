<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pacote;

class PacoteSeeder extends Seeder
{
    public function run()
    {
        // Cria 10 pacotes com dados de exemplo
        Pacote::factory()->count(10)->create();
    }
}

