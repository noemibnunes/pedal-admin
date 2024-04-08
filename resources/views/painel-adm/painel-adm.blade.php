@extends('base')

@section('content')
  <main class="main-painel">
    <div class ="container">
      <section class="section-painel">
        <h2>Bicicletas</h2>
        <div class="icon-box">
          <img src="{{ asset('img/icones/bicycle.png') }}" alt="Bicicletas">
          <a href="{{ route('bicicleta-view') }}">Acesse</a>
        </div>
      </section>

      <section class="section-painel">
        <h2>Planos</h2>
        <div class="icon-box">
          <img src="{{ asset('img/icones/plans.png') }}" alt="Planos">
          <a href="{{ route('plano-view') }}">Acesse</a>
      </div>
      </section>
    </div>
  </main>
@endsection
