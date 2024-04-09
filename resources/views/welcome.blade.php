@extends('base')

@section('content')

@if ($errors->has('success'))
        <div class="alert alert-success">
          {{ $errors->first('success') }}
          <script>
              setTimeout(function() {
                window.location.href = "{{ route('painel-adm') }}";
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
  <main class="login">
    <div class="form-login">
      <form method="POST" action="/login-adm" class="form">
      
      <div style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/icones/logo.svg') }}" alt="Logo" width="150">
        <span style="margin-top: 10px;">ADMIN</span>
      </div>

        @csrf
        <div class="form-group">
            <label for="exampleInputPEmail">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email@email.com">
        </div>
        <div class="form-group">
            <label for="exampleInputPSenha">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>

        <button type="submit" class="btn-primary" onclick="window.location='{{ route('painel-adm') }}'">Login</button>
        <a type="submit" class="btn-primary" href="{{ route('cadastro') }}">Cadastrar</a>

      </div>
  </main>
@endsection
