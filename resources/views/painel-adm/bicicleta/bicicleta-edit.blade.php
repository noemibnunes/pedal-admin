@extends('base')

@section('content')
  <main class="cadastro-form">
  <div class="form-cadastro">
    <form action="{{ route('edit-bicicleta', $bicicleta->id) }}" method="POST" enctype="multipart/form-data" class="formulario">
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
      <h1 class="titulo">Edição dos dados da Bicicleta</h1>
      @csrf
      @method('PUT')

      <div class="form input">
          <label for="modelo" class="label">Modelo: </label>
          <input type="text" class="form-control" name="modelo" value="{{ $bicicleta->modelo }}" required/>
      </div>

      <div class="form input">
          <label for="valor_aluguel" class="label">Valor do aluguel: </label>
          <input type="text" class="form-control" name="valor_aluguel" value="{{ $bicicleta->valor_aluguel }}" required/>
      </div>

      <div class="form input">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $bicicleta->descricao }}" required/>
      </div>

      <div class="form input">
            <label for="quantidades">Quantidades:</label>
            <input type="text"class="form-control" name="quantidades"  value="{{ $bicicleta->quantidades }}" required>
      </div>

      <div class="form">
        <label for="ponto_id" class="form-label">Ponto</label>
        <select class="form-select" id="ponto_id" name="ponto_id">
          <option value="">Selecione</option>
            @foreach ($pontos as $ponto)
              <option value="{{ $ponto->id }}" {{ $ponto->id == $bicicleta->ponto_id ? 'selected' : '' }}>
                {{ $ponto->descricao }}
              </option>
            @endforeach
        </select>
      </div>

      <div class="form input">
        <img src="{{ asset('storage/' .$bicicleta->imagem) }}" alt="Imagem da Bicicleta" style="margin-top:10px">
        <input type="file" id="imagem" >
            <label class="label-file" for="imagem">
              <span class="text-file">Selecionar imagem</span>
              <span>Procurar</span>
            </label>
        </input>
      </div>

      <button type="submit" class="btn-primary">Atualizar Bicicleta</button>
    </form>
      <a href="javascript:history.go(-1);" class="seta-voltar">
          <span>Voltar</span>
      </a>
  </div>
  </main>
@endsection()