<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BicicletaService;
use App\Http\Requests\BicicletaRequest;

class BicicletaController extends Controller
{
    private BicicletaService $bicicletaService;

    public function __construct(BicicletaService $bicicletaService)
    {
        $this->bicicletaService = $bicicletaService;
    }

    public function index()
    {
        try {
            return $this->bicicletaService->getBicicletas();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function cadastroView() 
    {
        return $this->bicicletaService->cadastroView();
    }

    public function cadastroBicicleta(BicicletaRequest $request)
    {
        try {
            $mensagem = $this->bicicletaService->cadastroBicicleta($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->bicicletaService->show($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editarBicicleta(Request $request, int $id)
    {
        try {
            $mensagem = $this->bicicletaService->editarBicicleta($id, $request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editView(int $id) 
    {
        return $this->bicicletaService->editView($id);
    }

    public function deleteBicicleta(int $id)
    {
        try {
           return $this->bicicletaService->deleteBicicleta($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function all()
    {
        try {
            return $this->bicicletaService->getAllBicicletas();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }
}
