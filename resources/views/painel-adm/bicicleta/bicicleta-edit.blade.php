@extends('base')

@section('content')
  <main class="cadastro-bicicleta">
    <form action="{{ route('edit-bicicleta', $bicicleta->id) }}" method="POST" enctype="multipart/form-data">
      <h1 style="text-align:center; margin-bottom:20px;">Edição dos dados da Bicicleta</h1>
      @csrf
      @method('PUT')


      <div class="form-group">
          <label for="modelo" class="label">Modelo: </label>
          <input type="text" class="form-control" name="modelo" value="{{ $bicicleta->modelo }}" required/>
      </div>

      <div class="form-group">
          <label for="valor_aluguel" class="label">Valor do aluguel: </label>
          <input type="text" class="form-control" name="valor_aluguel" value="{{ $bicicleta->valor_aluguel }}" required/>
      </div>

      <div class="form-group">
          <label for="tipo" class="label">Tipo: </label>
          <input type="text" class="form-control" name="tipo" value="{{ $bicicleta->tipo }}" required/>
      </div>

      <div class="form-group">
          <label for="imagem" class="label">Imagem: </label>
          <input type="file" class="form-control" name="imagem"/>
          <img src="{{ asset('storage/' .$bicicleta->imagem) }}" alt="Imagem da Bicicleta" style="margin-top:10px">
      </div>

      <button type="submit" class="btn-primary">Atualizar Bicicleta</button>
      <a href="javascript:history.go(-1);" class="seta-voltar">
          <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
          <span>Voltar</span>
      </a>
    </form>
  </main>
@endsection()