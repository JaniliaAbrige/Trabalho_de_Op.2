<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EstudanteController extends Controller
{
    /**
     * Lista todos os estudantes.
     */
    public function index()
    {
        $estudantes = Estudante::with('usuario')
            ->orderBy('numero_estudante')
            ->get();

        return view('estudantes.index', compact('estudantes'));
    }

    /**
     * Mostra o formulário de registo.
     */
   public function create()
{
    return view('estudantes.create');
}

    /**
     * Regista um novo estudante.
     */

public function store(Request $request)
{
    $validated = $request->validate([
        // ==============================
        // DADOS DO USUÁRIO
        // ==============================
        'nome' => 'required|string|max:255',

        'email' => 'required|email|max:255|unique:usuarios,email',

        'telefone' => 'required|string|max:30',

        'senha' => 'required|string|min:6|confirmed',

        // ==============================
        // DADOS DO ESTUDANTE
        // ==============================
        'data_nascimento' => 'required|date',

        'sexo' => 'required|in:Masculino,Feminino',

        'documento_identificacao' => 'required|string|max:100|unique:estudantes,documento_identificacao',

        'nacionalidade' => 'required|string|max:100',

        'provincia' => 'required|string|max:100',

        'distrito' => 'required|string|max:100',

        'endereco' => 'nullable|string|max:255',

        'nivel_academico' => 'required|string|max:100',
    ], [
        // ==============================
        // MENSAGENS - USUÁRIO
        // ==============================
        'nome.required' => 'O nome do estudante é obrigatório.',

        'email.required' => 'O email é obrigatório.',
        'email.email' => 'Informe um endereço de email válido.',
        'email.unique' => 'Este email já está associado a outro usuário.',

        'telefone.required' => 'O telefone é obrigatório.',

        'senha.required' => 'A senha é obrigatória.',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres.',
        'senha.confirmed' => 'A confirmação da senha não corresponde.',

        // ==============================
        // MENSAGENS - ESTUDANTE
        // ==============================
        'data_nascimento.required' => 'A data de nascimento é obrigatória.',
        'data_nascimento.date' => 'Informe uma data de nascimento válida.',

        'sexo.required' => 'O sexo é obrigatório.',
        'sexo.in' => 'O sexo selecionado é inválido.',

        'documento_identificacao.required' => 'O documento de identificação é obrigatório.',
        'documento_identificacao.unique' => 'Este documento já está registado.',

        'nacionalidade.required' => 'A nacionalidade é obrigatória.',

        'provincia.required' => 'A província é obrigatória.',

        'distrito.required' => 'O distrito é obrigatório.',

        'nivel_academico.required' => 'O nível académico é obrigatório.',
    ]);

    /*
    |--------------------------------------------------------------------------
    | GERAÇÃO DO NÚMERO DO ESTUDANTE
    |--------------------------------------------------------------------------
    |
    | Formato:
    |
    | 202601
    | 202602
    | 202603
    |
    | Os quatro primeiros dígitos representam o ano.
    | Os dois últimos representam a sequência.
    |
    */

    $ano = now()->year;

    $ultimoEstudante = Estudante::where(
        'numero_estudante',
        'like',
        $ano . '%'
    )
    ->orderByDesc('numero_estudante')
    ->first();

    if ($ultimoEstudante) {

        $ultimoNumero = (int) substr(
            $ultimoEstudante->numero_estudante,
            4
        );

        $sequencia = $ultimoNumero + 1;

    } else {

        $sequencia = 1;
    }

    $numeroEstudante = $ano . str_pad(
        $sequencia,
        2,
        '0',
        STR_PAD_LEFT
    );

    /*
    |--------------------------------------------------------------------------
    | CRIAR USUÁRIO + ESTUDANTE
    |--------------------------------------------------------------------------
    */

    DB::transaction(function () use (
        $validated,
        $numeroEstudante
    ) {

        // Criar a conta de acesso
        $usuario = Usuario::create([
            'nome' => $validated['nome'],

            'email' => $validated['email'],

            'telefone' => $validated['telefone'],

            'senha' => Hash::make($validated['senha']),

            'tipo' => 'estudante',

            'estado' => 1,
        ]);

        // Criar o estudante
        Estudante::create([
            'usuario_id' => $usuario->id,

            'numero_estudante' => $numeroEstudante,

            'data_nascimento' => $validated['data_nascimento'],

            'sexo' => $validated['sexo'],

            'documento_identificacao' => $validated['documento_identificacao'],

            'nacionalidade' => $validated['nacionalidade'],

            'provincia' => $validated['provincia'],

            'distrito' => $validated['distrito'],

            'endereco' => $validated['endereco'] ?? null,

            'nivel_academico' => $validated['nivel_academico'],
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | REDIRECIONAR
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route('estudantes.index')
        ->with(
            'success',
            'Estudante registado com sucesso. Número do estudante: ' . $numeroEstudante
        );
}


    /**
     * Mostra os dados de um estudante.
     */
    public function show(Estudante $estudante)
    {
        $estudante->load([
            'usuario',
            'inscricoes.curso'
        ]);

        return view('estudantes.show', compact('estudante'));
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(Estudante $estudante)
    {
        $usuarios = Usuario::orderBy('nome')
            ->orderBy('apelido')
            ->get();

        return view('estudantes.edit', compact(
            'estudante',
            'usuarios'
        ));
    }

    /**
     * Atualiza um estudante.
     */
    public function update(Request $request, Estudante $estudante)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:utilizadores,id',

            'numero_estudante' => 'required|string|max:50|unique:estudantes,numero_estudante,' . $estudante->id,

            'data_nascimento' => 'required|date',

            'sexo' => 'required|in:Masculino,Feminino',

            'documento_identificacao' => 'required|string|max:100|unique:estudantes,documento_identificacao,' . $estudante->id,

            'nacionalidade' => 'required|string|max:100',

            'provincia' => 'required|string|max:100',

            'distrito' => 'required|string|max:100',

            'endereco' => 'nullable|string|max:255',

            'nivel_academico' => 'required|string|max:100',
        ], [
            'usuario_id.required' => 'O utilizador é obrigatório.',
            'usuario_id.exists' => 'O utilizador selecionado não existe.',

            'numero_estudante.required' => 'O número do estudante é obrigatório.',
            'numero_estudante.unique' => 'Este número de estudante já está registado.',

            'data_nascimento.required' => 'A data de nascimento é obrigatória.',

            'sexo.required' => 'O sexo é obrigatório.',
            'sexo.in' => 'O sexo selecionado é inválido.',

            'documento_identificacao.required' => 'O documento de identificação é obrigatório.',
            'documento_identificacao.unique' => 'Este documento já está registado.',

            'nacionalidade.required' => 'A nacionalidade é obrigatória.',
            'provincia.required' => 'A província é obrigatória.',
            'distrito.required' => 'O distrito é obrigatório.',
            'nivel_academico.required' => 'O nível académico é obrigatório.',
        ]);

        $estudante->update($validated);

        return redirect()
            ->route('estudantes.index')
            ->with('success', 'Estudante atualizado com sucesso.');
    }

    /**
     * Elimina um estudante.
     */
    public function destroy(Estudante $estudante)
    {
        $estudante->delete();

        return redirect()
            ->route('estudantes.index')
            ->with('success', 'Estudante eliminado com sucesso.');
    }
}