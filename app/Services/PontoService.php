<?php

namespace App\Services;

use App\Models\Ponto;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PontoService
{
    public function getPontos() 
    {
        $pontos = Ponto::with('endereco')->get();
        return view('painel-adm.ponto.pontos', ['pontos' => $pontos]);
    }

    public function cadastroView() 
    {
        return view('painel-adm.ponto.ponto-cadastro');
    }

    public function cadastroPonto($request) 
    {
        $user = Auth::user(); // usuário autenticado

        $ponto = new Ponto([
           'descricao' => $request->descricao,
           'user_id' => $user->id
        ]);

        $ponto->save();

        $endereco = new Endereco([
            'tipo_logradouro' => $request->tipo_logradouro,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cep' => $request->cep,
            'bairro' => $request->bairro
        ]);

        $ponto->endereco()->save($endereco);

        return "Ponto cadastrado com sucesso!";
    }

    public function show($id)
    {
        $ponto = Ponto::findOrFail($id);
        return view('painel-adm.ponto.ponto-show', ['ponto' => $ponto]);
    }

    public function editarPonto($id, $request) 
    {
        $ponto = Ponto::findOrFail($id);

        $ponto->descricao = $request->descricao;
        $ponto->user_id = Auth::id();

        $cep = preg_replace('/[^0-9]/', '', $request->cep);

        if ($ponto->endereco) {
            $ponto->endereco->update([
                'tipo_logradouro' => $request->tipo_logradouro,
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'cep' => $cep,
                'bairro' => $request->bairro,
            ]);
        }

        $ponto->save();

        return "Dados do ponto editados com sucesso!";
    }

    public function editView($id) 
    {
        $ponto = Ponto::findOrFail($id);
        return view('painel-adm.ponto.ponto-edit', ['ponto' => $ponto]);
    }

    public function deletePonto($id)
    {
        $ponto = Ponto::findOrFail($id);
        $ponto->delete();

        return redirect()->route('ponto-view');
    }

    public function getAllPontos() 
    {
        return Ponto::with('endereco')->get();
    }
}