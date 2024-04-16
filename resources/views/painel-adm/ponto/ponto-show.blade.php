@extends('base')

@section('content')
  <main class="show">
  <div class="form-cadastro">
    <form action="{{ route('show-ponto', $ponto->id) }}" class="formulario">
      <h1 class="titulo">Visualizar dados do ponto</h1>

      <div class="form input">
          <label for="descricao" class="label">Descrição: </label>
          <input type="text" class="form-control" name="descricao" value="{{ $ponto->descricao }}" readonly/>
      </div>

      <div class="form input">
          <label for="tipo_logradouro">Tipo de Logradouro:</label>
          <input type="text" class="form-control" name="tipo_logradouro" value="{{$ponto->endereco->tipo_logradouro}}" readonly />
      </div>

      <div class="form input">
          <label for="logradouro">Logradouro:</label>
          <input type="text" class="form-control" name="logradouro" value="{{$ponto->endereco->logradouro}}" readonly />
      </div>

      <div class="form input">
          <label for="numero">Número:</label>
          <input type="text" class="form-control" name="numero" value="{{$ponto->endereco->numero}}" readonly />
      </div>

      <div class="form input">
          <label for="complemento">Complemento:</label>
          <input type="text" class="form-control" name="complemento" value="{{$ponto->endereco->complemento}}" readonly />
      </div>

      <div class="form input">
          <label for="cep">CEP:</label>
          <input type="text" class="form-control" name="cep" value="{{$ponto->endereco->cep}}" readonly  />
      </div>

      <div class="form input">
          <label for="bairro">Bairro:</label>
          <input type="text" class="form-control" name="bairro" value="{{$ponto->endereco->bairro}}" readonly>
      </div>

      <div class="form input">
          <label for="user" class="label">Usuário: </label>
          <input type="text" class="form-control" name="user" value="{{ $ponto->userAdm->name }}" readonly/>
      </div>
    </form>
      <a href="javascript:history.go(-1);" class="seta-voltar">
          <span>Voltar</span>
      </a>
    </div>  
  </main>
@endsection()