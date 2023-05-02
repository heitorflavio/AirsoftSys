<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player_Jogos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'patente',
        'patente_nome',
        'jogo_id',
        'player_id',
        'arma_propria',
        'status',
    ];
}
