<?php

namespace App\Services;

use App\Models\UserAdm;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserAdmService
{
    public function index() 
    {
        return view('cadastro.cadastro');
    }

    public function cadastro($request) 
    {
        UserAdm::create([
           'name' => $request->nome,
           'cpf' => $request->cpf,
           'email' => $request->email,
           'password' => bcrypt($request->senha)
        ]);
        
        return "Cadastro realizado com sucesso!";
    }

    public function login($request)
    {
        if ($request->email && $request->senha) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
                $user_adm = UserAdm::where('email', $request->email)->first();
                Auth::login($user_adm);
                return "Login com Sucesso!"; 
            }
        } else {
            throw new Exception("Insira seu email e a senha!"); 
        }

        throw new Exception("Credenciais inválidas");
    }

    public function logout($request)
    {
        Auth::logout();
        return redirect()->route('/'); 
    }

    public function painelAdm() 
    {
        return view('painel-adm.painel-adm');
    }

}