@extends('base')

@section('content')
  <main class="cadastro-bicicleta">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-bicicleta" enctype="multipart/form-data">
      @if ($errors->has('success'))
        <div class="alert alert-success">
          {{ $errors->first('success') }}
          <script>
              setTimeout(function() {
                window.location.href = "{{ route('bicicleta-view') }}";
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

      <h1 style="text-align:center; margin-bottom:20px; color:#112412;">Cadastro de Bicicleta</h1>
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
        </div>

        <div class="form-group">
            <label for="valor_aluguel">Valor de Aluguel:</label>
            <input type="text" name="valor_aluguel" class="form-control" placeholder="Valor aluguel">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" placeholder="Descricao">
        </div>

        <div class="form-group">
            <label for="quantidades">Quantidades:</label>
            <input type="text" name="quantidades" class="form-control" placeholder="quantidades">
        </div>

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" class="form-control" placeholder="Imagem">
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