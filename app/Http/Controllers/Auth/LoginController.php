<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Mostra a tela de login de acordo com o perfil selecionado.
     */
    public function showLoginForm(Request $request)
    {
        $tiposPermitidos = [
            'admin',
            'docente',
            'estudante',
        ];

        $tipo = $request->query('tipo');

        // Se nenhum perfil foi selecionado, volta para a página inicial
        if (!$tipo || !in_array($tipo, $tiposPermitidos, true)) {
            return redirect()->route('inicio');
        }

        $nomesTipos = [
            'admin' => 'Administrador',
            'docente' => 'Docente',
            'estudante' => 'Estudante',
        ];

        $iconesTipo = [
            'admin' => 'fa-user-shield',
            'docente' => 'fa-chalkboard-teacher',
            'estudante' => 'fa-user-graduate',
        ];

        $nomeTipo = $nomesTipos[$tipo];
        $iconeTipo = $iconesTipo[$tipo];

        return view('auth.login', compact(
            'tipo',
            'nomeTipo',
            'iconeTipo'
        ));
    }

    /**
     * Processa o login.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
            'tipo' => ['required', 'in:admin,docente,estudante'],
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'senha.required' => 'A senha é obrigatória.',
            'tipo.required' => 'O perfil de acesso é obrigatório.',
            'tipo.in' => 'O perfil selecionado é inválido.',
        ]);

        // Procurar utilizador pelo email e perfil
        $usuario = Usuario::where('email', $validated['email'])
            ->where('tipo', $validated['tipo'])
            ->first();

        // Utilizador não encontrado
        if (!$usuario) {
            return back()
                ->withInput([
                    'email' => $request->email,
                    'tipo' => $request->tipo,
                ])
                ->withErrors([
                    'email' => 'O email não está associado ao perfil selecionado.',
                ]);
        }

        // Conta desativada
        if (!$usuario->estado) {
            return back()
                ->withInput([
                    'email' => $request->email,
                    'tipo' => $request->tipo,
                ])
                ->withErrors([
                    'email' => 'Esta conta encontra-se desativada.',
                ]);
        }

        // Verificar senha
        if (!Hash::check($validated['senha'], $usuario->senha)) {
            return back()
                ->withInput([
                    'email' => $request->email,
                    'tipo' => $request->tipo,
                ])
                ->withErrors([
                    'senha' => 'A senha informada está incorreta.',
                ]);
        }

        // Autenticar
        Auth::login(
            $usuario,
            $request->boolean('lembrar')
        );

        // Regenerar sessão
        $request->session()->regenerate();

        // Redirecionar conforme o perfil
        if ($usuario->tipo === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($usuario->tipo === 'docente') {
            return redirect()->route('docente.dashboard');
        }

        if ($usuario->tipo === 'estudante') {
            return redirect()->route('estudantes.dashboard');
        }

        // Segurança: caso apareça um tipo inesperado
        Auth::logout();

        return redirect()->route('inicio');
    }

    /**
     * Termina a sessão do utilizador.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }
}