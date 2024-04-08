<?php

namespace App\Services;

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
        return view('painel-adm.bicicleta.bicicleta-cadastro');
    }

    public function cadastroBicicleta($request) 
    {
        $user = Auth::user(); // usuário autenticado

        $bicicleta = new Bicicleta([
           'modelo' => $request->modelo,
           'disponibilidade' => 1, // por padrão no cadastro ela está disponível
           'valor_aluguel' => $request->valor_aluguel,
           'tipo' => $request->tipo,
           'quantidades' => $request->quantidades,
           'user_id' => $user->id
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
        return view('painel-adm.bicicleta.bicicleta-show', ['bicicleta' => $bicicleta]);
    }

    public function editarBicicleta($id, $request) 
    {
        $bicicleta = Bicicleta::findOrFail($id);

        $bicicleta->modelo = $request->modelo;
        $bicicleta->valor_aluguel = $request->valor_aluguel;
        $bicicleta->tipo = $request->tipo;
        $bicicleta->quantidades = $request->quantidades;
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
        return view('painel-adm.bicicleta.bicicleta-edit', ['bicicleta' => $bicicleta]);
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
}