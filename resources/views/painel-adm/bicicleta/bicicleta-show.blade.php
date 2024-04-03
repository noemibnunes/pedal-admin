@extends('base')

@section('content')
  <main class="show-bicicleta">
    <form action="{{ route('show', $bicicleta->id) }}">
      <h1 style="text-align:center; margin-bottom:20px;">Visualizar dados da Bicicletas</h1>

      <div class="form-group">
          <label for="modelo" class="label">Modelo: </label>
          <input type="text" class="form-control" name="modelo" value="{{ $bicicleta->modelo }}" readonly/>
      </div>

      <div class="form-group">
          <label for="disponibilidade" class="label">Disponibilidade: </label>
          <input type="text" class="form-control" name="disponibilidade" value="{{ $bicicleta->disponibilidade }}" readonly/>
      </div>

      <div class="form-group">
          <label for="valor_aluguel" class="label">Valor do aluguel: </label>
          <input type="text" class="form-control" name="valor_aluguel" value="{{ $bicicleta->valor_aluguel }}" readonly/>
      </div>

      <div class="form-group">
          <label for="tipo" class="label">Tipo: </label>
          <input type="text" class="form-control" name="tipo" value="{{ $bicicleta->tipo }}" readonly/>
      </div>

      <div class="form-group">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $bicicleta->userAdm->name }}" readonly/>
      </div>

      <div class="form-group">
          <label for="imagem" class="label">Imagem: </label>
          <img id="img" src="{{ asset('storage/' .$bicicleta->imagem) }}" alt="Imagem da Bicicleta">
      </div>
      <a href="javascript:history.go(-1);" class="seta-voltar">
          <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
          <span>Voltar</span>
      </a>
    </form>
  </main>
@endsection()