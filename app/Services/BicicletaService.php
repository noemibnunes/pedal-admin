<?php

namespace App\Services;

use App\Models\Ponto;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BicicletaService
{
    public function getBicicletas() 
    {
        $bicicletas = Bicicleta::with('userAdm')->get();
        return view('painel-adm.bicicleta.bicicletas', ['bicicletas' => $bicicletas]);
    }

    public function cadastroView() 
    {
        $pontos = Ponto::all();
        return view('painel-adm.bicicleta.bicicleta-cadastro', ['pontos' => $pontos]);
    }

    public function cadastroBicicleta($request) 
    {
        $user = Auth::user(); // usuário autenticado

        $bicicleta = new Bicicleta([
           'modelo' => $request->modelo,
           'disponibilidade' => 1, // por padrão no cadastro ela está disponível
           'valor_aluguel' => $request->valor_aluguel,
           'descricao' => $request->descricao,
           'quantidades' => $request->quantidades,
           'user_id' => $user->id,
           'ponto_id' => $request->ponto_id
        ]); 

        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('bicycles', 'public'); 
            $bicicleta->imagem = $imagePath;
        }

        $bicicleta->save();

        return "Bicicleta cadastrada com sucesso!";
    }

    public function show($id)
    {
        $bicicleta = Bicicleta::findOrFail($id);
        $pontos = Ponto::all();
        return view('painel-adm.bicicleta.bicicleta-show', ['bicicleta' => $bicicleta, 'pontos' => $pontos]);
    }

    public function editarBicicleta($id, $request) 
    {
        $bicicleta = Bicicleta::findOrFail($id);

        $bicicleta->modelo = $request->modelo;
        $bicicleta->valor_aluguel = $request->valor_aluguel;
        $bicicleta->descricao = $request->descricao;
        $bicicleta->quantidades = $request->quantidades;
        $bicicleta->ponto_id = $request->ponto_id;
        $bicicleta->user_id = Auth::id();

        if ($request->hasFile('imagem')) {
            Storage::delete($bicicleta->imagem);
    
            $imagePath = $request->file('imagem')->store('bicycles', 'public');
    
            $bicicleta->imagem = $imagePath;
        }

        $bicicleta->save();

        return "Dados da Bicicleta editados com sucesso!";
    }

    public function editView($id) 
    {
        $bicicleta = Bicicleta::findOrFail($id);
        $pontos = Ponto::all();
        return view('painel-adm.bicicleta.bicicleta-edit', ['bicicleta' => $bicicleta, 'pontos' => $pontos]);
    }

    public function deleteBicicleta($id)
    {
        $bicicleta = Bicicleta::findOrFail($id);
        $bicicleta->delete();

        return redirect()->route('bicicleta-view');
    }

    public function getAllBicicletas() 
    {
        return Bicicleta::all();
    }

    public function getBicicleta($id) 
    {
        return Bicicleta::findOrFail($id);
    }

    public function alugarBicicleta($id) 
    {
        $bicicleta = Bicicleta::findOrFail($id);

        if ($bicicleta->quantidades > 0) {
            $bicicleta->quantidades -= 1;
            $bicicleta->save();
            return ['message' => 'Bicicleta alugada com sucesso!'];
        } else {
            return ['message' => 'Nenhuma bicicleta disponível para alugar.'];
        }
    }

}