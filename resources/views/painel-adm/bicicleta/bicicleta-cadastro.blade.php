@extends('base')

@section('content')
  <main class="cadastro-form">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-bicicleta" enctype="multipart/form-data" class="formulario">
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

      <h1 class="titulo">Cadastro de Bicicleta</h1>
        @csrf
        <div class="form input">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" class="form-control" placeholder="Bike">
        </div>

        <div class="form input">
            <label for="valor_aluguel">Valor de Aluguel:</label>
            <input type="text" name="valor_aluguel" class="form-control" placeholder="5.00">
        </div>

        <div class="form input">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" placeholder="Bike para passeio">
        </div>

        <div class="form input">
            <label for="quantidades">Quantidades:</label>
            <input type="text" name="quantidades" class="form-control" placeholder="10">
        </div>

        <div class="form input">
            <label for="ponto" class="form-label">Ponto</label>
            <select class="form-select" id="ponto" name="ponto_id">
                <option value="">Selecione</option>
                @foreach ($pontos as $ponto)
                    <option value="{{ $ponto->id }}">{{ $ponto->descricao }}</option>
                @endforeach
            </select>
        </div>

        <div class="form input">
          <input type="file" id="imagem" name="imagem">
            <label class="label-file" for="imagem">
              <span class="text-file">Selecionar imagem</span>
              <span>Procurar</span>
            </label>
          </input>
        </div>

        <button type="submit" class="btn-primary">Cadastrar</button>
        </form>

        <a href="javascript:history.go(-1);" class="seta-voltar">
          <span>Voltar</span>
        </a>
      </div>
  </main>
@endsection()