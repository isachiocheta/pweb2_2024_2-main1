<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'cliente_id' => \App\Models\Cliente::factory(), // Cria um cliente ao criar uma reserva
            'pacote_id' => \App\Models\Pacote::factory(), // Cria um pacote ao criar uma reserva
            'data_reserva' => $this->faker->dateTimeBetween('now', '+30 days'), // Data de reserva dentro de 30 dias
            'status' => $this->faker->randomElement(['Confirmada', 'Pendente', 'Cancelada']),
        ];
    }
}
