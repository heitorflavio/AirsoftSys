<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario_jogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'jogo_id',
        'comentario',
        'tipo',
        'tipo_id',
        'status',
    ];
}
