@extends('base')

@section('content')
  <main class="cadastro-form">
  <div class="form-cadastro">
    <form action="{{ route('edit-plano', $plano->id) }}" method="POST" enctype="multipart/form-data" class="formulario">
    @if ($errors->has('success'))
        <div class="alert alert-success">
          {{ $errors->first('success') }}
          <script>
              setTimeout(function() {
                window.location.href = "{{ route('plano-view') }}";
              }, 2000);
            </script>
        </div>
      @else
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      @endif
      <h1 class="titulo">Edição dos dados do plano</h1>
      @csrf
      @method('PUT')


      <div class="form input">
          <label for="tipo_plano" class="label">Tipo de plano: </label>
          <input type="text" class="form-control" name="tipo_plano" value="{{ $plano->tipo_plano }}" required/>
      </div>

      <div class="form input">
          <label for="valor_plano" class="label">Valor do plano: </label>
          <input type="text" class="form-control" name="valor_plano" value="{{ $plano->valor_plano }}" required/>
      </div>

      <div class="form input">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $plano->descricao }}" required/>
      </div>

      <button type="submit" class="btn-primary">Atualizar plano</button>
    </form>
    <a href="javascript:history.go(-1);" class="seta-voltar">
        <span>Voltar</span>
    </a>
  </div>
  </main>
@endsection()