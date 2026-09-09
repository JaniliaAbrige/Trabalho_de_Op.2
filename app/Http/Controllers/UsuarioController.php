<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Listar usuários.
     */
    public function index()
    {
        $usuarios = Usuario::latest()->paginate(15);

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Formulário para criar usuário.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Guardar usuário.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:usuarios,email',

            'telefone' => 'nullable|string|max:20',

            'senha' => 'required|string|min:6|confirmed',

            'tipo' => 'required|in:admin,docente,estudante',

            'estado' => 'required|in:ativo,inativo',
        ], [
            'nome.required' => 'O nome é obrigatório.',

            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'Este email já está registado.',

            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'senha.confirmed' => 'A confirmação da senha não corresponde.',

            'tipo.required' => 'Selecione o tipo de usuário.',
            'tipo.in' => 'Tipo de usuário inválido.',

            'estado.required' => 'Selecione o estado do usuário.',
        ]);

        Usuario::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'telefone' => $validated['telefone'] ?? null,
            'senha' => Hash::make($validated['senha']),
            'tipo' => $validated['tipo'],
            'estado' => $validated['estado'],
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Mostrar usuário.
     */
    public function show(Usuario $usuario)
    {
        $usuario->load([
            'docente',
            'estudante',
            'notificacoes',
        ]);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Atualizar usuário.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,

            'telefone' => 'nullable|string|max:20',

            'senha' => 'nullable|string|min:6|confirmed',

            'tipo' => 'required|in:admin,docente,estudante',

            'estado' => 'required|in:ativo,inativo',
        ]);

        $dados = [
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'telefone' => $validated['telefone'] ?? null,
            'tipo' => $validated['tipo'],
            'estado' => $validated['estado'],
        ];

        /*
        |--------------------------------------------------------------------------
        | Só altera a senha se uma nova senha tiver sido informada
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['senha'])) {
            $dados['senha'] = Hash::make($validated['senha']);
        }

        $usuario->update($dados);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Ativar usuário.
     */
    public function ativar(Usuario $usuario)
    {
        $usuario->update([
            'estado' => 'ativo',
        ]);

        return back()->with(
            'success',
            'Usuário ativado com sucesso.'
        );
    }

    /**
     * Desativar usuário.
     */
    public function desativar(Usuario $usuario)
    {
        $usuario->update([
            'estado' => 'inativo',
        ]);

        return back()->with(
            'success',
            'Usuário desativado com sucesso.'
        );
    }

    /**
     * Eliminar usuário.
     */
public function destroy(Usuario $usuario)
{
    if (Auth::id() === $usuario->id) {
        return back()->with(
            'error',
            'Não pode eliminar o usuário que está atualmente autenticado.'
        );
    }

    $usuario->delete();

    return redirect()
        ->route('usuarios.index')
        ->with(
            'success',
            'Usuário eliminado com sucesso.'
        );
}
}