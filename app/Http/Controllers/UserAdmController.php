<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAdmRequest;
use App\Services\UserAdmService;
use Exception;
use Illuminate\Http\Request;

class UserAdmController extends Controller
{
    private UserAdmService $userAdmService;

    public function __construct(UserAdmService $userAdmService)
    {
        $this->userAdmService = $userAdmService;
    }
    
    public function index() 
    {
        return $this->userAdmService->index();
    }

    public function cadastro(UserAdmRequest $request)
    {
        try {
            $mensagem = $this->userAdmService->cadastro($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function login(Request $request)
    {
        try {
            $mensagem = $this->userAdmService->login($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
           return $this->userAdmService->logout($request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function painelAdm() 
    {
        return $this->userAdmService->painelAdm();
    }
}
