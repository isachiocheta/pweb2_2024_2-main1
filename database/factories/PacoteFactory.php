<?php

namespace Database\Factories;

use App\Models\Pacote;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacoteFactory extends Factory
{
    protected $model = Pacote::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomFloat(2, 100, 1000), // Preço entre 100 e 1000
            'destino' => $this->faker->city(),
            'data_inicio' => $this->faker->date(),
            'data_fim' => $this->faker->date(),
        ];
    }
}
