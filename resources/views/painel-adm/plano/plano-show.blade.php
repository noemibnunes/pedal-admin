@extends('base')

@section('content')
  <main class="show">
  <div class="form-cadastro">
    <form action="{{ route('show-plano', $plano->id) }}" class="formulario">
      <h1 class="titulo">Visualizar dados do plano</h1>

      <div class="form input">
          <label for="tipo_plano" class="label">Tipo de plano: </label>
          <input type="text" class="form-control" name="tipo_plano" value="{{ $plano->tipo_plano }}" readonly/>
      </div>

      <div class="form input">
          <label for="valor_plano" class="label">Valor do plano: </label>
          <input type="text" class="form-control" name="valor_plano" value="{{ $plano->valor_plano }}" readonly/>
      </div>

      <div class="form input">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $plano->descricao }}" readonly/>
      </div>

      <div class="form input">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $plano->userAdm->name }}" readonly/>
      </div>
    </form>
    <a href="javascript:history.go(-1);" class="seta-voltar">
        <span>Voltar</span>
    </a>
  </div>
  </main>
@endsection()