@extends('base')

@section('content')
  <main class="">
    <div class="container-cadastro">
      <a href="{{ route('cadastro-ponto-view') }}" class="btn-cadastro">
        <img src="./img/icones/add.png"alt="Cadastrar Ponto"> 
      </a>
    </div>
      
    
    <table class="tabelas">
      <h2 style="color:#fff;text-align:center;">Pontos</h2>
        <thead>
        <tr>
            <th>Descrição</th>
            <th>Endereço</th>
            <th>Usuário ADM</th>
            <th colspan = 3 style="text-align:center;">Ações</th> </tr>
        </thead>
        <tbody>
        @forelse ($pontos as $ponto)
            <tr>
            <td>{{ $ponto->descricao }}</td>
            <td>{{ $ponto->endereco->tipo_logradouro }} {{ $ponto->endereco->logradouro }} - {{ $ponto->endereco->numero }}@if($ponto->endereco->complemento), {{ $ponto->endereco->complemento }}@endif, {{ $ponto->endereco->bairro }}, {{ $ponto->endereco->cep }}</td>
            <td>{{ $ponto->userAdm->name }}</td>
            <td> 
              <a href="{{ route('show-ponto', $ponto->id) }}">
                <img src="./img/icones/eye.png" alt="Visualizar">
              </a>
            </td>

            <td>
              <a href="{{ route('edit-ponto-view', $ponto->id) }}">
                <img src="./img/icones/edit.png"alt="Edição"> 
              </a>   
            </td>
        
            <td>
              <button onclick="openModal('deleteModal{{$ponto->id}}')" class='botao-excluir'>
                <img src="./img/icones/trash.png"alt="Edição"> 
              </button>

              <div id="deleteModal{{$ponto->id}}" class="modal">
                <div class="modal-content">
                    <span onclick="closeModal('deleteModal{{$ponto->id}}')" class="close">&times;</span>
                    <h2 style="font-weight: bold; color: #000;">Deletar Registro</h2>
                    <hr>
                    <p style="color: #000;">Deseja excluir o registro do pontos?</p>
                    <div class="modal-buttons"> 
                      <form action="{{ route('delete-ponto', $ponto->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="confirmar" type="submit" style="margin-right: 10px;">Confirmar</button>
                      </form>
                        <button onclick="closeModal('deleteModal{{$ponto->id}}')" class="cancelar">Cancelar</button>
                    </div>
                </div>
              </div>
            </td>

            </tr>
        @empty
            <tr>
            <td colspan="5">Não há pontos disponíveis no momento.</td>
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