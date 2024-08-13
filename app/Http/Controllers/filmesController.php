<?php

namespace App\Http\Controllers;

use App\Http\Requests\adicionarRequest;
use App\Models\Filmes;
use Illuminate\Http\Request;

class filmesController extends Controller
{
   // Método para exibir todos os filmes na página inicial
   public function index(){
    // Obtém todos os registros da tabela 'filmes'
    $filmes = Filmes::all();
    // Retorna a view 'welcome' com a variável 'filmes' contendo todos os registros
    return view('welcome')->with("filmes", $filmes);
}

    // Método para exibir a página de cadastro de filmes
    public function cadastrar(Request $req){
        // Obtém todos os registros da tabela 'filmes'
        $filme = Filmes::all();
        // Retorna a view 'cadastrar' com a variável 'filmes'
        return view('cadastrar')->with("filmes", $filme);
    }
    
    
        public function adicionar(adicionarRequest $req){       
     try{
       // dd($req->all());
        
        $filme = new Filmes;
        $filme->titulo = $req->titulo;
        $filme->subtitulo = $req->subtitulo;
        $filme->anolanc = $req->anolanc;
        $filme->duracao = $req->duracao;
        $filme->classi = $req->classi;
        $filme->genero = $req->genero;
        $filme->pontuacao = floatval($req->pontuacao);
        $filme->diretor = $req->diretor;
        $filme->sinopse = $req->sinopse;

         // Verifica se um arquivo de capa foi enviado e é válido
        if ($req->hasFile('capa') && $req->file('capa')->isValid()) {
             // Armazena o arquivo de capa na pasta 'capas' dentro do diretório 'public'
            $filme->capa = $req->file('capa')->store('capas', 'public');
        }

       // Salva o novo filme no banco de dados
            $filme->save();

            // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Filme adicionado com sucesso!');
    } catch (\Exception $e) {
        
        return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao adicionar o filme: ' . $e->getMessage()]);
    }
}
         // Método para exibir a página de edição de um filme específico
        public function editar(Request $req){
             // Encontra o filme pelo ID recebido na requisição
            $filme = Filmes::find($req->id);
              // Retorna a view 'editar' com a variável 'filmes' contendo o registro do filme
            return view('editar')->with("filmes", $filme);
        }
    
        // Método para atualizar os dados de um filme existente
        public function atualizar(adicionarRequest $req){
             // Encontra o filme pelo ID recebido na requisição
            $filme = Filmes::find($req->id);
             // Verifica se um novo arquivo de capa foi enviado e é válido
            if ($req->hasFile('capa') && $req->file('capa')->isValid()) {
                 // Armazena o novo arquivo de capa
                $filme->capa = $req->capa->store('capas', 'public');}
                // Atualiza os dados do filme com os valores da requisição
            $filme->update([
                     "titulo" => $req->titulo,
                     "subtitulo" => $req->subtitulo,
                     "anolanc "=> $req-> anolanc,
                     "duracao" => $req->duracao,
                     "classi" => $req->classi,
                     "genero" => $req->genero,
                     "pontuacao" => $req->pontuacao,
                     "diretor" => $req->diretor,
                     "sinopse"=> $req->sinopse,
                     "capa"=> $filme->capa
             ]); 
        
            return redirect('/listar');
        }

           // Método para excluir um filme
        public function  excluir(Request $req){
           // Encontra o filme pelo ID recebido na requisição
        $filme = Filmes::find($req->id);
        // Exclui o filme do banco de dados
        $filme->delete();
        // Redireciona de volta para a página anterior
        return redirect()->back();
            
        }


        // Método para listar todos os filmes cadastrados
    public function listar(Request $req){
        // Obtém todos os registros da tabela 'filmes'
        $filmes = Filmes::all();
        // Retorna a view 'listar' com a variável 'filmes'
        return view('listar')->with("filmes", $filmes); 
    }
     }