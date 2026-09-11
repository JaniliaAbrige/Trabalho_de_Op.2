<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Curso;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Listar disciplinas
     */
    public function index()
    {
        $disciplinas = Disciplina::with('curso')
            ->orderBy('nome')
            ->get();

        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Formulário para criar disciplina
     */
    public function create()
    {
        $cursos = Curso::where('estado', 1)
            ->orderBy('nome')
            ->get();

        return view('disciplinas.create', compact('cursos'));
    }

    /**
     * Guardar disciplina
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'codigo' => 'required|string|max:50|unique:disciplinas,codigo',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'carga_horaria' => 'nullable|integer|min:1',
            'semestre' => 'nullable|string|max:50',
            'estado' => 'required|in:0,1',
        ], [
            'curso_id.required' => 'Selecione o curso.',
            'curso_id.exists' => 'O curso selecionado não existe.',

            'codigo.required' => 'O código da disciplina é obrigatório.',
            'codigo.unique' => 'Este código de disciplina já está registado.',

            'nome.required' => 'O nome da disciplina é obrigatório.',

            'descricao.max' => 'A descrição não pode ultrapassar 1000 caracteres.',

            'carga_horaria.integer' => 'A carga horária deve ser um número.',
            'carga_horaria.min' => 'A carga horária deve ser maior que zero.',

            'estado.required' => 'O estado da disciplina é obrigatório.',
            'estado.in' => 'O estado selecionado é inválido.',
        ]);

        Disciplina::create($validated);

        return redirect()
            ->route('disciplinas.index')
            ->with('success', 'Disciplina registada com sucesso.');
    }

    /**
     * Visualizar disciplina
     */
    public function show(Disciplina $disciplina)
    {
        $disciplina->load('curso');

        return view('disciplinas.show', compact('disciplina'));
    }

    /**
     * Formulário de edição
     */
    public function edit(Disciplina $disciplina)
    {
        $cursos = Curso::orderBy('nome')->get();

        return view('disciplinas.edit', compact(
            'disciplina',
            'cursos'
        ));
    }

    /**
     * Atualizar disciplina
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'codigo' => 'required|string|max:50|unique:disciplinas,codigo,' . $disciplina->id,
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'carga_horaria' => 'nullable|integer|min:1',
            'semestre' => 'nullable|string|max:50',
            'estado' => 'required|in:0,1',
        ], [
            'curso_id.required' => 'Selecione o curso.',
            'curso_id.exists' => 'O curso selecionado não existe.',

            'codigo.required' => 'O código da disciplina é obrigatório.',
            'codigo.unique' => 'Este código já está associado a outra disciplina.',

            'nome.required' => 'O nome da disciplina é obrigatório.',

            'descricao.max' => 'A descrição não pode ultrapassar 1000 caracteres.',

            'carga_horaria.integer' => 'A carga horária deve ser um número.',
            'carga_horaria.min' => 'A carga horária deve ser maior que zero.',

            'estado.required' => 'O estado da disciplina é obrigatório.',
            'estado.in' => 'O estado selecionado é inválido.',
        ]);

        $disciplina->update($validated);

        return redirect()
            ->route('disciplinas.index')
            ->with('success', 'Disciplina atualizada com sucesso.');
    }

    /**
     * Eliminar disciplina
     */
    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();

        return redirect()
            ->route('disciplinas.index')
            ->with('success', 'Disciplina eliminada com sucesso.');
    }

    /**
     * Ativar disciplina
     */
    public function ativar(Disciplina $disciplina)
    {
        $disciplina->update([
            'estado' => 1,
        ]);

        return redirect()
            ->route('disciplinas.index')
            ->with('success', 'Disciplina ativada com sucesso.');
    }

    /**
     * Desativar disciplina
     */
    public function desativar(Disciplina $disciplina)
    {
        $disciplina->update([
            'estado' => 0,
        ]);

        return redirect()
            ->route('disciplinas.index')
            ->with('success', 'Disciplina desativada com sucesso.');
    }
}