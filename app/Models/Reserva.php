<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'pacote_id',
        'data_reserva',
        'quantidade_pessoas',
        'status',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function pacote()
    {
        return $this->belongsTo(Pacote::class, 'pacote_id');
    }
}
