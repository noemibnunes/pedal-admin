@extends('base')

@section('content')
  <main class="show">
  <div class="form-cadastro">
    <form action="{{ route('show', $bicicleta->id) }}" class="formulario">
      <h1 class="titulo">Visualizar dados da Bicicletas</h1>

      <div class="form input">
          <label for="modelo" class="label">Modelo: </label>
          <input type="text" class="form-control" name="modelo" value="{{ $bicicleta->modelo }}" readonly/>
      </div>

      <div class="form input">
        <label for="disponibilidade" class="label">Disponibilidade: </label>
        <input type="text" class="form-control" name="disponibilidade" value="{{ $bicicleta->disponibilidade == 1 ? 'Disponível' : 'Indisponível' }}" readonly/>
      </div>

      <div class="form input">
          <label for="valor_aluguel" class="label">Valor do aluguel: </label>
          <input type="text" class="form-control" name="valor_aluguel" value="{{ $bicicleta->valor_aluguel }}" readonly/>
      </div>

      <div class="form input">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $bicicleta->descricao }}" readonly/>
      </div>

      <div class="form input">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $bicicleta->userAdm->name }}" readonly/>
      </div>

      <div class="form input">
          <label for="pontos" class="label">Pontos da Pedal:</label>
          @foreach ($bicicleta->pontos as $ponto)
              <div>
                  <label>{{ $ponto->descricao }}</label>
                  <input type="text" class="form-control" value="{{ $ponto->pivot->quantidade }}" readonly>
              </div>
          @endforeach
      </div>

      <div class="form input">
          <label for="imagem" class="label">Imagem: </label>
          <img id="img" src="{{ asset('storage/' .$bicicleta->imagem) }}" alt="Imagem da Bicicleta">
      </div>
    </form>
    <a href="javascript:history.go(-1);" class="seta-voltar">
        <span>Voltar</span>
    </a>
    </div>
  </main>
@endsection()