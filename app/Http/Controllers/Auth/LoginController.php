<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Efetua o login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'senha' => [
                'required',
                'string',
            ],
        ], [
            'email.required' => 'Informe o seu email.',
            'email.email' => 'Informe um email válido.',
            'senha.required' => 'Informe a sua senha.',
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['senha'],
            'estado' => 'ativo',
        ], $request->boolean('lembrar'))) {

            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email ou senha incorretos.',
            ]);
    }

    /**
     * Termina a sessão.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Sessão terminada com sucesso.');
    }
}