<?php

namespace App\Services;

use App\Models\Plano;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlanoService
{
    public function getPlanos() 
    {
        $planos = Plano::all();
        return view('painel-adm.plano.planos', ['planos' => $planos]);
    }

    public function cadastroView() 
    {
        return view('painel-adm.plano.plano-cadastro');
    }

    public function cadastroPlano($request) 
    {
        $user = Auth::user(); // usuário autenticado

        $plano = new Plano([
           'tipo_plano' => $request->tipo_plano,
           'valor_plano' => $request->valor_plano,
           'descricao' => $request->descricao,
           'user_id' => $user->id
        ]);

        $plano->save();

        return "Plano cadastrado com sucesso!";
    }

    public function show($id)
    {
        $plano = Plano::findOrFail($id);
        return view('painel-adm.plano.plano-show', ['plano' => $plano]);
    }

    public function editarPlano($id, $request) 
    {
        $plano = Plano::findOrFail($id);

        $plano->tipo_plano = $request->tipo_plano;
        $plano->valor_plano = $request->valor_plano;
        $plano->descricao = $request->descricao;
        $plano->user_id = Auth::id();

        $plano->save();

        return "Dados do plano editados com sucesso!";
    }

    public function editView($id) 
    {
        $plano = Plano::findOrFail($id);
        return view('painel-adm.plano.plano-edit', ['plano' => $plano]);
    }

    public function deletePlano($id)
    {
        $plano = Plano::findOrFail($id);
        $plano->delete();

        return redirect()->route('plano-view');
    }

    public function getAllPlanos() 
    {
        return Plano::all();
    }
}