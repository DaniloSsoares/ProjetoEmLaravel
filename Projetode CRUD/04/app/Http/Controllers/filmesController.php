<?php

namespace App\Http\Controllers;
use App\Models\Filmes;
use Illuminate\Http\Request;

class filmesController extends Controller
{
    public function cadastrar(Request $req){
        $filme= Filmes::all();
        return view('cadastrar')->with("filmes", $filme);
    }
    
    
        public function adicionar(Request $req){
            $filme = new Filmes;
            $filme->titulo = $req->titulo;
            $filme->subtitulo = $req->subtitulo;
            $filme->anolanc = $req-> anolanc;
            $filme->duracao = $req->duracao;
            $filme->pontuacao = $req->pontuacao;
            $filme->diretor = $req->diretor;
            $filme->resumo= $req->resumo;
            $filme->capa= $req->capa;

          //hasFile está sendo usado para verificar se uma qrquivo com nome capa do form foi enviado na requisição
           if ($req->hasFile('capa') && $req->file('capa')->isValid()) {
            //a proxima linha armazena o arquivo enviado para o arquivo capas
            $filme->capa = $req->capa->store('capas', 'public');
           }
            $filme->save();
            return redirect()->back();
        }
    
        public function editar(Request $req){
            $filme = Filmes::find($req->id);
            return view('editar')->with("filmes", $filme);
        }
    
        public function atualizar(Request $req){
            $filme = Filmes::find($req->id);
            $filme->update(
             [
                     "titulo" => $req->titulo,
                     "subtitulo" => $req->subtitulo,
                     "anolanc "=> $req-> anolanc,
                     "duracao" => $req->duracao,
                     "pontuacao" => $req->pontuacao,
                     "diretor" => $req->diretor,
                     "resumo"=> $req->resumo,
                     "capa"=> $req->capa 
             ]       
                 ); 
            return redirect()->back();
        }
        public function  excluir(Request $req){
            $filme = Filmes::find($req->id) ;
            $filme->delete();
            return redirect()->back();
            
        }
        public function listar(Request $req){
            $filme = Filmes::all();
            return view('welcome')->with("filmes", $filme); 
     }
}
