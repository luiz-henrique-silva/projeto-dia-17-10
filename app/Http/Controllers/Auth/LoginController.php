<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa a tentativa de login
    public function login(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentativa de login com os dados fornecidos
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard'); // Redireciona para a tela de dashboard
        }
        

        // Redireciona de volta para o login com mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    // Método para fazer logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
