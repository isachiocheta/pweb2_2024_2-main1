<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'categoria_id',
        'imagem',
    ];

    protected $casts=[
        'categoria_id'=>'integer'
    ];

    public function categoria(){
        return $this->belongsTo(CategoriaFormacao::class,
            'categoria_id'
    );

    }
    
}

