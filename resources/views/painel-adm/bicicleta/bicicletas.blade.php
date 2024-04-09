@extends('base')

@section('content')
  <main class="">
    <div class="container-cadastro">
      <a href="{{ route('cadastro-view') }}" class="btn-cadastro">
        <img src="./img/icones/add.png"alt="Cadastrar bicicleta"> 
      </a>
    </div>
      
    
    <table class="tabelas">
      <h2 style="color:#fff;text-align:center;">Bicicletas</h2>
        <thead>
        <tr>
            <th>Modelo</th>
            <th>Disponibilidade</th>
            <th>Valor de Aluguel</th>
            <th>Descrição</th>
            <th>Quantidades</th>
            <th>Usuário ADM</th>
            <th colspan = 3 style="text-align:center;">Ações</th> </tr>
        </thead>
        <tbody>
        @forelse ($bicicletas as $bicicleta)
            <tr>
            <td>{{ $bicicleta->modelo }}</td>
            <td>{{ $bicicleta->disponibilidade ? 'Disponível' : 'Indisponível' }}</td>
            <td>R$ {{ $bicicleta->valor_aluguel }}</td>
            <td>{{ $bicicleta->descricao }}</td>
            <td>{{ $bicicleta->quantidades }}</td>
            <td>{{ $bicicleta->userAdm->name }}</td>
            <td> 
              <a href="{{ route('show', $bicicleta->id) }}">
                <img src="./img/icones/eye.png" alt="Visualizar">
              </a>
            </td>

            <td>
              <a href="{{ route('edit-view', $bicicleta->id) }}">
                <img src="./img/icones/edit.png"alt="Edição"> 
              </a>   
            </td>
        
            <td>
              <button onclick="openModal('deleteModal{{$bicicleta->id}}')" class='botao-excluir'>
                <img src="./img/icones/trash.png"alt="Edição"> 
              </button>

              <div id="deleteModal{{$bicicleta->id}}" class="modal">
                <div class="modal-content">
                    <span onclick="closeModal('deleteModal{{$bicicleta->id}}')" class="close">&times;</span>
                    <h2 style="font-weight: bold; color: #000;">Deletar Registro</h2>
                    <hr>
                    <p style="color: #000;">Deseja excluir o registro da bicicleta {{$bicicleta->modelo}}?</p>
                    <div class="modal-buttons"> 
                      <form action="{{ route('delete-bicicleta', $bicicleta->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="confirmar" type="submit" style="margin-right: 10px;">Confirmar</button>
                      </form>
                        <button onclick="closeModal('deleteModal{{$bicicleta->id}}')" class="cancelar">Cancelar</button>
                    </div>
                </div>
              </div>
            </td>

            </tr>
        @empty
            <tr>
            <td colspan="5">Não há bicicletas disponíveis no momento.</td>
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