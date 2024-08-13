<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
   // Inclui o trait HasFactory, que permite criar instâncias do modelo usando factories
   use HasFactory;

   // Define os atributos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = [
        "titulo",
        "subtitulo",
        "anolanc",
        "duracao",
        "classi",
        "genero",
        "pontuacao",
        "diretor",
        "sinopse",
        "capa"
        ];

        // Método para obter a URL completa da capa do filme
        public function getCapaUrlAttribute(){
               // Verifica se o atributo 'capa' existe
            if($this->capa){
                 // Retorna a URL completa da imagem da capa usando a função 'asset'
            // 'storage/' é o caminho onde as imagens são armazenadas no Laravel
                return asset('storage/' . $this->capa);
            }
            // Retorna null se não houver uma imagem de capa associada
            return null;
        }
}
