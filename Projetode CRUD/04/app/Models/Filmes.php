<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    use HasFactory;
    protected $fillable = [
        "titulo",
        "subtitulo",
        "anolanc",
        "duracao",
        "pontuacao",
        "diretor",
        "resumo"
        ];
}
