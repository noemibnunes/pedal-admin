@extends('base')

@section('content')
  <main class="cadastro-form">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-ponto" enctype="multipart/form-data" class="formulario">
      @if ($errors->has('success'))
        <div class="alert alert-success">
          {{ $errors->first('success') }}
          <script>
              setTimeout(function() {
                window.location.href = "{{ route('ponto-view') }}";
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

      <h1 class="titulo">Cadastro de Ponto</h1>
        @csrf
        <div class="form input">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" placeholder="Descrição">
        </div>

        <div class="form input">
          <label for="tipo_logradouro">Tipo de Logradouro:</label>
          <input type="text" name="tipo_logradouro" class="form-control" placeholder="Tipo de Logradouro">
        </div>

        <div class="form input">
          <label for="logradouro">Logradouro:</label>
          <input type="text" name="logradouro" class="form-control" placeholder="Logradouro">
        </div>

        <div class="form input">
          <label for="numero">Número:</label>
          <input type="number" name="numero" class="form-control" placeholder="Número">
        </div>

        <div class="form input">
          <label for="complemento">Complemento:</label>
          <input type="text" name="complemento" class="form-control" placeholder="Complemento">
        </div>

        <div class="form input">
          <label for="cep">CEP:</label>
          <input type="text" name="cep" class="form-control" placeholder="CEP">
        </div>

        <div class="form input">
          <label for="bairro">Bairro:</label>
          <input type="text" name="bairro" class="form-control" placeholder="Bairro">
        </div>

        <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
        <a href="javascript:history.go(-1);" class="seta-voltar">
          <span>Voltar</span>
        </a>
      </div>
  </main>
@endsection()