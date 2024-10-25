<?php
namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'documento' => $this->generateCPF(), // Chama a função para gerar um CPF
            'endereco' => $this->faker->address(),
        ];
    }

    private function generateCPF()
    {
        $cpf = '';
        for ($i = 0; $i < 9; $i++) {
            $cpf .= rand(0, 9);
        }

        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += (10 - $i) * (int)$cpf[$i];
        }

        $d1 = 11 - ($soma % 11);
        if ($d1 >= 10) {
            $d1 = 0;
        }
        $cpf .= $d1;

        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += (11 - $i) * (int)$cpf[$i];
        }

        $d2 = 11 - ($soma % 11);
        if ($d2 >= 10) {
            $d2 = 0;
        }
        $cpf .= $d2;

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }
}
