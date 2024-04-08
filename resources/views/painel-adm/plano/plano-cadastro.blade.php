@extends('base')

@section('content')
  <main class="cadastro">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-plano" enctype="multipart/form-data">
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

      <h1 style="text-align:center; margin-bottom:20px; color:#112412;">Cadastro de Plano</h1>
        @csrf
        <div class="form-group">
            <label for="tipo_plano">Tipo de plano:</label>
            <input type="text" name="tipo_plano" class="form-control" placeholder="tipo">
        </div>

        <div class="form-group">
            <label for="valor_plano">Valor do plano:</label>
            <input type="text" name="valor_plano" class="form-control" placeholder="Valor plano">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" placeholder="Descrição">
        </div>

        <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
        <a href="javascript:history.go(-1);" class="seta-voltar">
          <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
          <span>Voltar</span>
        </a>
      </div>
  </main>
@endsection()