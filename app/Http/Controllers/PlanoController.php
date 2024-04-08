<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlanoService;
use App\Http\Requests\PlanoRequest;
use App\Http\Controllers\Controller;

class PlanoController extends Controller
{
    private PlanoService $planoService;

    public function __construct(PlanoService $planoService)
    {
        $this->planoService = $planoService;
    }

    public function index()
    {
        try {
            return $this->planoService->getPlanos();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function cadastroView() 
    {
        return $this->planoService->cadastroView();
    }

    public function cadastroPlano(PlanoRequest $request)
    {
        try {
            $mensagem = $this->planoService->cadastroPlano($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->planoService->show($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editarPlano(Request $request, int $id)
    {
        try {
            $mensagem = $this->planoService->editarPlano($id, $request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editView(int $id) 
    {
        return $this->planoService->editView($id);
    }

    public function deletePlano(int $id)
    {
        try {
            return $this->planoService->deletePlano($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function all()
    {
        try {
            return $this->planoService->getAllPlanos();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }
}
