@extends('base')

@section('content')
  <main class="login">
    <div class="form-login">
    <form method="POST" action="/login-adm">
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

      <div style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('img/icones/logo.svg') }}" alt="Logo" width="150">
        <h3 style="margin-top: 10px;">ADMIN</h3>
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
      </div>
  </main>
@endsection
