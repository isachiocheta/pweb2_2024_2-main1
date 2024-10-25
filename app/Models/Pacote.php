<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    use HasFactory;

    protected $table = "pacotes";

    protected $fillable = [
        'nome',
        'preco',
        'data_inicio',
        'data_fim',
        'destino',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'pacote_id');
    }
}
