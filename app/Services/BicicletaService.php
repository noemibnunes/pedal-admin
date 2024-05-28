<?php

namespace App\Services;

use App\Models\Ponto;
use App\Models\Bicicleta;
use App\Models\BicicletaPonto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BicicletaService
{
    public function getBicicletas() 
    {
        $bicicletas = Bicicleta::with(['userAdm', 'pontos'])->get();
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
        'user_id' => $user->id,
        ]); 

        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('bicycles', 'public'); 
            $bicicleta->imagem = $imagePath;
        }

        $bicicleta->save();

        $pontos = $request->pontos; 

        if ($pontos) {
            foreach ($pontos as $pontoId) {
                $quantidade = $request->input("quantidade_ponto_{$pontoId}");
                BicicletaPonto::create([
                    'bicicleta_id' => $bicicleta->id,
                    'ponto_id' => $pontoId,
                    'quantidade' => $quantidade,
                ]);
            }
        }

        return "Bicicleta cadastrada com sucesso!";
    }

    public function show($id)
    {
        $bicicleta = Bicicleta::with('pontos')->findOrFail($id);
        return view('painel-adm.bicicleta.bicicleta-show', ['bicicleta' => $bicicleta]);
    }

    public function editarBicicleta($id, $request) 
    {
        $bicicleta = Bicicleta::findOrFail($id);

        $bicicleta->modelo = $request->modelo;
        $bicicleta->valor_aluguel = $request->valor_aluguel;
        $bicicleta->descricao = $request->descricao;
        $bicicleta->user_id = Auth::id();

        // Atualizando a imagem se houver um novo arquivo fornecido
        if ($request->hasFile('imagem')) {
            Storage::delete($bicicleta->imagem);

            $imagePath = $request->file('imagem')->store('bicycles', 'public');

            $bicicleta->imagem = $imagePath;
        }

        $bicicleta->save();

        $bicicleta->pontos()->detach(); 

        if ($request->pontos) {
            foreach ($request->pontos as $pontoId) {
                $quantidade = $request->input("quantidade_ponto_{$pontoId}");
                BicicletaPonto::create([
                    'bicicleta_id' => $bicicleta->id,
                    'ponto_id' => $pontoId,
                    'quantidade' => $quantidade,
                ]);
            }
        }

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
        return Bicicleta::with('pontos')->where('disponibilidade', 1)->get();
    }

    public function getBicicleta($id) 
    {
        return Bicicleta::with('pontos')->where('disponibilidade', 1)->findOrFail($id);
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

    public function bicicletaDisponibilidade($id)
    {
        $bicicleta = Bicicleta::findOrFail($id);

        $bicicleta->disponibilidade = !$bicicleta->disponibilidade;
        $bicicleta->save();

        return redirect()->route('bicicleta-view');
    }
}