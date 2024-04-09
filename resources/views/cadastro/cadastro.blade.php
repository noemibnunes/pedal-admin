@extends('base')

@section('content')
@if ($errors->has('success'))
        <div class="alert alert-success">
          {{ $errors->first('success') }}
          <script>
              setTimeout(function() {
                window.location.href = "/";
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
  <main class="cadastro">
    <div class="form-cadastro">
    <form method="POST" action="/cadastro-adm" class="form">
      <div style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/icones/logo.svg') }}" alt="Logo" width="150">
        <h3 style="margin-top: 10px;">ADMIN</h3>
      </div>
      
        @csrf
        <div class="form-group mb-2">
            <label for="exampleInputNome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="nome">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputCpf">CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputPEmail">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email@email.com">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputPSenha">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="senha">
        </div>

        <button type="submit" class="btn-primary">Cadastrar</button>
      </form>
    </div>
  </main>
@endsection()