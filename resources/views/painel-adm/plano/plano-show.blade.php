@extends('base')

@section('content')
  <main class="show">
    <form action="{{ route('show-plano', $plano->id) }}">
      <h1 style="text-align:center; margin-bottom:20px;">Visualizar dados do plano</h1>

      <div class="form-group-view">
          <label for="tipo_plano" class="label">Tipo de plano: </label>
          <input type="text" class="form-control" name="tipo_plano" value="{{ $plano->tipo_plano }}" readonly/>
      </div>

      <div class="form-group-view">
          <label for="valor_plano" class="label">Valor do plano: </label>
          <input type="text" class="form-control" name="valor_plano" value="{{ $plano->valor_plano }}" readonly/>
      </div>

      <div class="form-group-view">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $plano->descricao }}" readonly/>
      </div>

      <div class="form-group-view">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $plano->userAdm->name }}" readonly/>
      </div>

      <a href="javascript:history.go(-1);" class="seta-voltar">
          <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
          <span>Voltar</span>
      </a>
    </form>
  </main>
@endsection()