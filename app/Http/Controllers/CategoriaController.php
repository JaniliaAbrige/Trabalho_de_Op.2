<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Listar categorias
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Formulário de registo
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Guardar categoria
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome',
            'descricao' => 'nullable|string|max:1000',
            'estado' => 'required|in:1,0',
        ], [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.unique' => 'Esta categoria já existe.',
            'nome.max' => 'O nome da categoria não pode ter mais de 255 caracteres.',
            'descricao.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'estado.required' => 'O estado da categoria é obrigatório.',
            'estado.in' => 'O estado selecionado é inválido.',
        ]);

        Categoria::create($validated);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria registada com sucesso.');
    }

    /**
     * Visualizar categoria
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Formulário de edição
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualizar categoria
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $categoria->id,
            'descricao' => 'nullable|string|max:1000',
            'estado' => 'required|in:1,0',
        ], [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.unique' => 'Esta categoria já existe.',
            'nome.max' => 'O nome da categoria não pode ter mais de 255 caracteres.',
            'descricao.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'estado.required' => 'O estado da categoria é obrigatório.',
            'estado.in' => 'O estado selecionado é inválido.',
        ]);

        $categoria->update($validated);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }

    /**
     * Eliminar categoria
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria eliminada com sucesso.');
    }

    /**
     * Ativar categoria
     */
   public function ativar(Categoria $categoria)
{
    $categoria->update([
        'estado' => 1
    ]);

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria ativada com sucesso.');
}
    /**
     * Desativar categoria
     */
   public function desativar(Categoria $categoria)
{
    $categoria->update([
        'estado' => 0
    ]);

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria desativada com sucesso.');
}
}