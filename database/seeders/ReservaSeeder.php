<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Pacote;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        // Cria 10 reservas com dados de exemplo
        for ($i = 0; $i < 10; $i++) {
            Reserva::create([
                'cliente_id' => Cliente::inRandomOrder()->first()->id, // Seleciona um cliente aleatório
                'pacote_id' => Pacote::inRandomOrder()->first()->id, // Seleciona um pacote aleatório
                'data_reserva' => now()->addDays(rand(1, 30)), // Data da reserva aleatória dentro de 30 dias
                'status' => 'Confirmada', // Status da reserva
            ]);
        }
    }
}

