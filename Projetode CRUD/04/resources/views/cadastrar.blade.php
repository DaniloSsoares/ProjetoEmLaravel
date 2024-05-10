<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>

<!--Nav Bar-->
<nav class="navbar navbar-expand-lg bg-black">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" id="HomeNa" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" id="CadastrarNa" href="#">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" id="AtualizarNa" href="#">Atualizar</a>
        </li><li class="nav-item">
          <a class="nav-link text-white" id="DeletarNa" href="#">Deletar</a>
      
          <li class="nav-item">
          <a class="nav-link text-white" id="ListarNa" href="#">Listar</a>
        </li><li class="nav-item">
         
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


    <div class="container mt-5">
        <form method="POST" action="/adicionarContato">
            @csrf
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Título:</label>
                <input type="text" class="form-control" name="titulo" placeholder="Título">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Subtitulo</label>
                <input type="text" class="form-control" name="subtitulo" placeholder="subtitulo">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Lançamento</label>
                <input type="text" class="form-control" name="anolanc" placeholder="Lançamento">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Duração</label>
                <input type="text" class="form-control" name="duracao" placeholder="Duração">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Pontuação</label>
                <input type="text" class="form-control" name="pontuacao" placeholder="Pontuação">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Diretor</label>
                <input type="text" class="form-control" name="diretor" placeholder="Diretor">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Resumo</label>
                <input type="text" class="form-control" name="resumo" placeholder="Resumo">
            </div>
            <button type="submit" class="btn btn-primary center">Cadastrar</button>
        </form>

        <div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered border-primary">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Subtítulo</th>
                    <th scope="col">Ano de lançamento</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Pontuação</th>
                    <th scope="col">Diretor</th>
                    <th scope="col">Resumo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (count($filmes) > 0)
                    @foreach ($filmes as $fil)
                        <tr>
                            <td>{{ $fil->id }}</td>
                            <td>{{ $fil->titulo }}</td>
                            <td>{{ $fil->subtitulo }}</td>
                            <td>{{ $fil->anolanc }}</td>
                            <td>{{ $fil->duracao }}</td>
                            <td>{{ $fil->pontuacao }}</td>
                            <td>{{ $fil->diretor }}</td>
                            <td>{{ $fil->resumo }}</td>
                            <td>
                                <a href="/editar/{{ $fil->id }}" class="btn btn-primary">Editar</a>
                                <a href="/excluir/{{ $fil->id }}" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Sem registros!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



    <script>
    document.getElementById('CadastrarNa').addEventListener('click', function(){
    window.location.href='/cadastrar';
    })

    document.getElementById('AtualizarNa').addEventListener('click', function(){
    window.location.href='/atualizar';
    })

    document.getElementById('DeletarNa').addEventListener('click', function(){
    window.location.href='/deletar';
    })
    document.getElementById('ListarNa').addEventListener('click', function(){
    window.location.href='/Listar';
    })

    document.getElementById('HomeNa').addEventListener('click', function(){
    window.location.href='/';
    })
</script>

</body>

</html>