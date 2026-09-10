<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    /**
     * Listar cursos.
     */
    public function index()
    {
        $cursos = Curso::with('categoria')
            ->latest()
            ->get();

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Formulário de criação.
     */
 public function create()
{
    $categorias = Categoria::where('estado', 1)
        ->orderBy('nome')
        ->get();

    return view('cursos.create', compact('categorias'));
}

    /**
     * Guardar curso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => [
                'required',
                'exists:categorias,id',
            ],

            'codigo' => [
                'required',
                'string',
                'max:50',
                'unique:cursos,codigo',
            ],

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

            'duracao' => [
                'required',
                'string',
                'max:100',
            ],

            'carga_horaria' => [
                'required',
                'integer',
                'min:1',
            ],

            'modalidade' => [
                'required',
                'string',
                'max:100',
            ],

            'requisitos' => [
                'nullable',
                'string',
            ],

            'preco' => [
                'required',
                'numeric',
                'min:0',
            ],

            'vagas' => [
                'required',
                'integer',
                'min:1',
            ],

            'estado' => 'required|in:1,0',

            'data_inicio' => [
                'required',
                'date',
            ],

            'data_fim' => [
                'required',
                'date',
                'after_or_equal:data_inicio',
            ],
        ], [
            'categoria_id.required' => 'Selecione uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',

            'codigo.required' => 'Informe o código do curso.',
            'codigo.unique' => 'Este código de curso já está registado.',

            'nome.required' => 'Informe o nome do curso.',

            'duracao.required' => 'Informe a duração do curso.',

            'carga_horaria.required' => 'Informe a carga horária.',
            'carga_horaria.integer' => 'A carga horária deve ser um número inteiro.',

            'modalidade.required' => 'Informe a modalidade.',

            'preco.required' => 'Informe o preço do curso.',
            'preco.numeric' => 'O preço deve ser um valor numérico.',

            'vagas.required' => 'Informe o número de vagas.',
            'vagas.integer' => 'O número de vagas deve ser um número inteiro.',

            'estado.required' => 'Selecione o estado do curso.',

            'data_inicio.required' => 'Informe a data de início.',
            'data_fim.required' => 'Informe a data de fim.',
            'data_fim.after_or_equal' => 'A data de fim deve ser igual ou posterior à data de início.',
        ]);

        Curso::create($validated);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso registado com sucesso.');
    }

    /**
     * Mostrar curso.
     */
    public function show(Curso $curso)
    {
        $curso->load([
            'categoria',
            'turmas',
            'docentes.usuario',
        ]);

        return view('cursos.show', compact('curso'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(Curso $curso)
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('cursos.edit', compact('curso', 'categorias'));
    }

    /**
     * Atualizar curso.
     */
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'categoria_id' => [
                'required',
                'exists:categorias,id',
            ],

            'codigo' => [
                'required',
                'string',
                'max:50',
                Rule::unique('cursos', 'codigo')->ignore($curso->id),
            ],

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

            'duracao' => [
                'required',
                'string',
                'max:100',
            ],

            'carga_horaria' => [
                'required',
                'integer',
                'min:1',
            ],

            'modalidade' => [
                'required',
                'string',
                'max:100',
            ],

            'requisitos' => [
                'nullable',
                'string',
            ],

            'preco' => [
                'required',
                'numeric',
                'min:0',
            ],

            'vagas' => [
                'required',
                'integer',
                'min:1',
            ],

           'estado' => 'required|in:1,0',

            'data_inicio' => [
                'required',
                'date',
            ],

            'data_fim' => [
                'required',
                'date',
                'after_or_equal:data_inicio',
            ],
        ]);

        $curso->update($validated);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Eliminar curso.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado com sucesso.');
    }

    /**
     * Ativar curso.
     */
    public function ativar(Curso $curso)
    {
        $curso->update([
            'estado' => 'ativo',
        ]);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso ativado com sucesso.');
    }

    /**
     * Desativar curso.
     */
    public function desativar(Curso $curso)
    {
        $curso->update([
            'estado' => 'inativo',
        ]);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso desativado com sucesso.');
    }
}