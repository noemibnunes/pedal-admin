@extends('base')

@section('content')
  <main class="cadastro">
    <form action="{{ route('edit-ponto', $ponto->id) }}" method="POST" enctype="multipart/form-data">
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
      <h1 style="text-align:center; margin-bottom:20px;">Edição dos dados do ponto</h1>
      @csrf
      @method('PUT')

      <div class="form-group">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $ponto->descricao }}" required/>
      </div>

      <div class="form-group-view">
          <label for="tipo_logradouro">Tipo de Logradouro:</label>
          <input type="text" class="form-control" name="tipo_logradouro" value="{{$ponto->endereco->tipo_logradouro}}" required />
      </div>

      <div class="form-group-view">
          <label for="logradouro">Logradouro:</label>
          <input type="text" class="form-control" name="logradouro" value="{{$ponto->endereco->logradouro}}" required />
      </div>

      <div class="form-group-view">
          <label for="numero">Número:</label>
          <input type="text" class="form-control" name="numero" value="{{$ponto->endereco->numero}}" required />
      </div>

      <div class="form-group-view">
          <label for="complemento">Complemento:</label>
          <input type="text" class="form-control" name="complemento" value="{{$ponto->endereco->complemento}}" />
      </div>

      <div class="form-group-view">
          <label for="cep">CEP:</label>
          <input type="text" class="form-control" name="cep" value="{{$ponto->endereco->cep}}" required  />
      </div>

      <div class="form-group-view">
          <label for="bairro">Bairro:</label>
          <input type="text" class="form-control" name="bairro" value="{{$ponto->endereco->bairro}}" required />
      </div>

      <button type="submit" class="btn-primary">Atualizar ponto</button>
      <a href="javascript:history.go(-1);" class="seta-voltar">
          <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
          <span>Voltar</span>
      </a>
    </form>
  </main>
@endsection()