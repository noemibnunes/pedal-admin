@extends('base')

@section('content')
  <main class="main-painel">
    <div class="container">
      <div class="card">
        <section class="section-painel">
            <a href="{{ route('bicicleta-view') }}">
              <h2>Bicicletas</h2>
            </a>
            <hr>
          <div class="icon-box">
            <a href="{{ route('bicicleta-view') }}">
              <img src="{{ asset('img/bicicletas/bicicleta4.jpg') }}" alt="Bicicletas">
            </a>
          </div>
        </section>
      </div>

      <div class="card">
        <section class="section-painel">
          <a href="{{ route('plano-view') }}">
            <h2>Planos</h2>
          </a>
          <hr>
          <div class="icon-box">
            <a href="{{ route('plano-view') }}">
              <img src="{{ asset('img/icones/plans.jpg') }}" alt="Planos">
            </a>
          </div>
        </section>
      </div>

      <div class="card">
        <section class="section-painel">
          <a href="{{ route('ponto-view') }}">
            <h2>Pontos</h2>
          </a>
          <hr>
          <div class="icon-box">
            <a href="{{ route('ponto-view') }}">
                <img src="{{ asset('img/bicicletas/bicicletario.jpg') }}" alt="Bicicletas">
            </a>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
