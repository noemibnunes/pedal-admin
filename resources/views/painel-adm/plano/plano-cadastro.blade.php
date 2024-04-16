@extends('base')

@section('content')
  <main class="cadastro-form">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-plano" enctype="multipart/form-data" class="formulario">
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

      <h1 class="titulo">Cadastro de Plano</h1>
        @csrf
        <div class="form input">
            <label for="tipo_plano">Tipo de plano:</label>
            <input type="text" name="tipo_plano" class="form-control" placeholder="Anual">
        </div>

        <div class="form input">
            <label for="valor_plano">Valor do plano:</label>
            <input type="text" name="valor_plano" class="form-control" placeholder="180.00">
        </div>

        <div class="form input">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" placeholder="Segurança 24h">
        </div>

        <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
        <a href="javascript:history.go(-1);" class="seta-voltar">
          <span>Voltar</span>
        </a>
      </div>
  </main>
@endsection()