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
          <input type="text" class="form-control" name="disponibilidade" value="{{ $bicicleta->disponibilidade }}" readonly/>
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
          <label for="quantidades" class="label">Quantidades: </label>
          <input type="text" class="form-control" name="quantidades" value="{{ $bicicleta->quantidades }}" readonly/>
      </div>

      <div class="form input">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $bicicleta->userAdm->name }}" readonly/>
      </div>

      <div class="form">
        <label for="ponto" class="form-label">Ponto</label>
        <input type="text" id="ponto" name="ponto" value="{{ $bicicleta->ponto->descricao }}" readonly>
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