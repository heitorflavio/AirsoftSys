<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'telefone',
        'cpf',
        'telefone2',
        'data',
        'sangue',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'patente',
        'patente_nome',
        'alergia',
        'remedio',
        'senha',
        'arma_propria'
    ];
}
