<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PontoService;
use App\Http\Requests\PontoRequest;
use App\Http\Controllers\Controller;

class PontoController extends Controller
{
    private PontoService $pontoService;

    public function __construct(PontoService $pontoService)
    {
        $this->pontoService = $pontoService;
    }

    public function index()
    {
        try {
            return $this->pontoService->getPontos();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function cadastroView() 
    {
        return $this->pontoService->cadastroView();
    }

    public function cadastroPonto(PontoRequest $request)
    {
        try {
            $mensagem = $this->pontoService->cadastroPonto($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->pontoService->show($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editarPonto(Request $request, int $id)
    {
        try {
            $mensagem = $this->pontoService->editarPonto($id, $request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editView(int $id) 
    {
        return $this->pontoService->editView($id);
    }

    public function deletePonto(int $id)
    {
        try {
            return $this->pontoService->deletePonto($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function all()
    {
        try {
            return $this->pontoService->getAllPontos();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }
}
