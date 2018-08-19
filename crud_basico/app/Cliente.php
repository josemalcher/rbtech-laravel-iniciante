<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //protected $table = 'clientes_ativos'; // mudança de padrão
    //protected $primaryKey = 'codigo_id';

    protected $fillable = [
        'nome',
        'endereco',
        'numero'
    ];
}
