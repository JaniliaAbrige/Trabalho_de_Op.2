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
                'in:Presencial,Online,Híbrido',
            ],

            'requisitos' => [
                'nullable',
                'string',
            ],

            'preco' => [
                'nullable',
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
                'nullable',
                'date',
            ],

            'data_fim' => [
                'nullable',
                'date',
                'after_or_equal:data_inicio',
            ],

            'capa' => ['nullable', 'image', 'max:2048'],
            'gratis' => ['nullable', 'boolean'],
            'documentos' => ['nullable', 'array'],
            'documentos.*' => ['file', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,mp4,mov,avi,webm', 'max:51200'],
            'link_aula' => ['nullable', 'url', 'max:255'],
            'materiais_opcao' => ['nullable', 'in:necessarios,nao_necessarios'],
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

            'preco.numeric' => 'O preço deve ser um valor numérico.',

            'vagas.required' => 'Informe o número de vagas.',
            'vagas.integer' => 'O número de vagas deve ser um número inteiro.',

            'estado.required' => 'Selecione o estado do curso.',

            'data_fim.after_or_equal' => 'A data de fim deve ser igual ou posterior à data de início.',
        ]);

        $validated = $this->prepareCourseData($request, $validated);

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
                'in:Presencial,Online,Híbrido',
            ],

            'requisitos' => [
                'nullable',
                'string',
            ],

            'preco' => [
                'nullable',
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
                'nullable',
                'date',
            ],

            'data_fim' => [
                'nullable',
                'date',
                'after_or_equal:data_inicio',
            ],

            'capa' => ['nullable', 'image', 'max:2048'],
            'gratis' => ['nullable', 'boolean'],
            'documentos' => ['nullable', 'array'],
            'documentos.*' => ['file', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,mp4,mov,avi,webm', 'max:51200'],
            'link_aula' => ['nullable', 'url', 'max:255'],
        ]);

        $validated = $this->prepareCourseData($request, $validated, $curso);

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
            'estado' => 'aberto',
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
            'estado' => 'fechado',
        ]);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso desativado com sucesso.');
    }

    private function prepareCourseData(Request $request, array $validated, ?Curso $curso = null): array
    {
        $validated['modalidade'] = match ($validated['modalidade']) {
            'Presencial' => 'presencial',
            'Online' => 'online',
            'Híbrido' => 'hibrido',
        };

        $validated['estado'] = $validated['estado'] === '1' ? 'aberto' : 'fechado';
        $validated['gratis'] = $request->boolean('gratis');

        if ($request->input('modalidade') === 'Presencial' || $request->input('materiais_opcao') === 'nao_necessarios') {
            unset($validated['documentos'], $validated['link_aula'], $validated['materiais_opcao']);
        } else {
            unset($validated['materiais_opcao']);
        }

        if ($validated['gratis']) {
            $validated['preco'] = 0;
        }

        if ($request->hasFile('capa')) {
            $validated['capa'] = $request->file('capa')->store('cursos/capas', 'public');
        } elseif ($curso) {
            unset($validated['capa']);
        }

        if ($request->hasFile('documentos')) {
            $validated['documentos'] = collect($request->file('documentos'))
                ->map(fn ($documento) => $documento->store('cursos/documentos', 'public'))
                ->values()
                ->all();
        } elseif ($curso) {
            unset($validated['documentos']);
        }

        return $validated;
    }
}
