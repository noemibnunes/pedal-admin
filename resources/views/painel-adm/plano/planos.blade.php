@extends('base')

@section('content')
  <main class="">
    <div class="container-cadastro">
      <a href="{{ route('cadastro-plano-view') }}" class="btn-cadastro">
        <img src="./img/icones/add.png"alt="Cadastrar Plano"> 
      </a>
    </div>
      
    
    <table class="tabelas">
      <h2 style="color:#fff;text-align:center;">Planos</h2>
        <thead>
        <tr>
            <th>Tipo de plano</th>
            <th>Valor do plano</th>
            <th>Descrição</th>
            <th>Usuário ADM</th>
            <th colspan = 3 style="text-align:center;">Ações</th> </tr>
        </thead>
        <tbody>
        @forelse ($planos as $plano)
            <tr>
            <td>{{ $plano->tipo_plano }}</td>
            <td>R$ {{ $plano->valor_plano }}</td>
            <td>{{ $plano->descricao }}</td>
            <td>{{ $plano->userAdm->name }}</td>
            <td> 
              <a href="{{ route('show-plano', $plano->id) }}">
                <img src="./img/icones/eye.png" alt="Visualizar">
              </a>
            </td>

            <td>
              <a href="{{ route('edit-plano-view', $plano->id) }}">
                <img src="./img/icones/edit.png"alt="Edição"> 
              </a>   
            </td>
        
            <td>
              <button onclick="openModal('deleteModal{{$plano->id}}')" class='botao-excluir'>
                <img src="./img/icones/trash.png"alt="Edição"> 
              </button>

              <div id="deleteModal{{$plano->id}}" class="modal">
                <div class="modal-content">
                    <span onclick="closeModal('deleteModal{{$plano->id}}')" class="close">&times;</span>
                    <h2 style="font-weight: bold; color: #000;">Deletar Registro</h2>
                    <hr>
                    <p style="color: #000;">Deseja excluir o registro do plano {{$plano->tipo_plano}}?</p>
                    <div class="modal-buttons"> 
                      <form action="{{ route('delete-plano', $plano->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="confirmar" type="submit" style="margin-right: 10px;">Confirmar</button>
                      </form>
                        <button onclick="closeModal('deleteModal{{$plano->id}}')" class="cancelar">Cancelar</button>
                    </div>
                </div>
              </div>
            </td>

            </tr>
        @empty
            <tr>
            <td colspan="5">Não há planos disponíveis no momento.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <a href="javascript:history.go(-1);" class="seta-voltar">
      <img src="{{ asset('img/icones/seta-voltar.png') }}" alt="Voltar">
      <span>Voltar</span>
    </a>
  </main>
@endsection()