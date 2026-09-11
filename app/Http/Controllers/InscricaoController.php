<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use App\Models\Estudante;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscricaoController extends Controller
{
    /**
     * Lista todas as inscrições.
     */
    public function index()
    {
        $inscricoes = Inscricao::with([
            'estudante.usuario',
            'curso',
            'turma'
        ])
        ->orderByDesc('id')
        ->get();

        return view('inscricoes.index', compact('inscricoes'));
    }

    /**
     * Mostra o formulário de nova inscrição.
     */
    public function create()
    {
        $estudantes = Estudante::with('usuario')
            ->orderBy('numero_estudante')
            ->get();

        $cursos = Curso::where('estado', 1)
            ->orderBy('nome')
            ->get();

        $turmas = Turma::where('estado', 1)
            ->with('curso')
            ->orderBy('nome')
            ->get();

        return view('inscricoes.create', compact(
            'estudantes',
            'cursos',
            'turmas'
        ));
    }

    /**
     * Regista uma nova inscrição.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'estudante_id' => 'required|exists:estudantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
            'data_inscricao' => 'required|date',
            'observacao' => 'nullable|string|max:1000',
        ], [
            'estudante_id.required' => 'Selecione o estudante.',
            'estudante_id.exists' => 'O estudante selecionado não existe.',

            'curso_id.required' => 'Selecione o curso.',
            'curso_id.exists' => 'O curso selecionado não existe.',

            'turma_id.required' => 'Selecione a turma.',
            'turma_id.exists' => 'A turma selecionada não existe.',

            'data_inscricao.required' => 'A data da inscrição é obrigatória.',
            'data_inscricao.date' => 'Informe uma data válida.',

            'observacao.max' => 'A observação não pode ultrapassar 1000 caracteres.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verificar se a turma pertence ao curso selecionado
        |--------------------------------------------------------------------------
        */

        $turma = Turma::findOrFail($validated['turma_id']);

        if ($turma->curso_id != $validated['curso_id']) {
            return back()
                ->withInput()
                ->withErrors([
                    'turma_id' => 'A turma selecionada não pertence ao curso escolhido.'
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Verificar se o estudante já está inscrito no mesmo curso
        |--------------------------------------------------------------------------
        */

        $inscricaoExistente = Inscricao::where(
            'estudante_id',
            $validated['estudante_id']
        )
        ->where(
            'curso_id',
            $validated['curso_id']
        )
        ->whereIn('estado', [
            'Pendente',
            'Aprovada'
        ])
        ->exists();

        if ($inscricaoExistente) {
            return back()
                ->withInput()
                ->withErrors([
                    'estudante_id' => 'Este estudante já possui uma inscrição ativa neste curso.'
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Gerar código automático da inscrição
        |--------------------------------------------------------------------------
        |
        | Exemplo:
        | INS-2026-0001
        | INS-2026-0002
        | INS-2026-0003
        |
        */

        $ano = now()->year;

        $ultimaInscricao = Inscricao::where(
            'codigo_inscricao',
            'like',
            'INS-' . $ano . '-%'
        )
        ->orderByDesc('id')
        ->first();

        if ($ultimaInscricao) {

            $ultimoNumero = (int) substr(
                $ultimaInscricao->codigo_inscricao,
                -4
            );

            $sequencia = $ultimoNumero + 1;

        } else {

            $sequencia = 1;
        }

        $codigoInscricao = 'INS-' . $ano . '-' . str_pad(
            $sequencia,
            4,
            '0',
            STR_PAD_LEFT
        );

        /*
        |--------------------------------------------------------------------------
        | Guardar inscrição
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $validated,
            $codigoInscricao
        ) {

            Inscricao::create([
                'codigo_inscricao' => $codigoInscricao,
                'estudante_id' => $validated['estudante_id'],
                'curso_id' => $validated['curso_id'],
                'turma_id' => $validated['turma_id'],
                'data_inscricao' => $validated['data_inscricao'],
                'estado' => 'Pendente',
                'observacao' => $validated['observacao'] ?? null,
                'data_analise' => null,
                'analisado_por' => null,
            ]);
        });

        return redirect()
            ->route('inscricoes.index')
            ->with(
                'success',
                'Inscrição registada com sucesso. Código: ' . $codigoInscricao
            );
    }

    /**
     * Mostra os detalhes de uma inscrição.
     */
    public function show(Inscricao $inscricao)
    {
        $inscricao->load([
            'estudante.usuario',
            'curso.categoria',
            'turma',
            'analisadoPor'
        ]);

        return view('inscricoes.show', compact('inscricao'));
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(Inscricao $inscricao)
    {
        $estudantes = Estudante::with('usuario')
            ->orderBy('numero_estudante')
            ->get();

        $cursos = Curso::where('estado', 1)
            ->orderBy('nome')
            ->get();

        $turmas = Turma::where('estado', 1)
            ->with('curso')
            ->orderBy('nome')
            ->get();

        return view('inscricoes.edit', compact(
            'inscricao',
            'estudantes',
            'cursos',
            'turmas'
        ));
    }

    /**
     * Atualiza uma inscrição.
     */
    public function update(Request $request, Inscricao $inscricao)
    {
        $validated = $request->validate([
            'estudante_id' => 'required|exists:estudantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
            'data_inscricao' => 'required|date',
            'estado' => 'required|in:Pendente,Aprovada,Rejeitada,Cancelada',
            'observacao' => 'nullable|string|max:1000',
        ], [
            'estudante_id.required' => 'Selecione o estudante.',
            'curso_id.required' => 'Selecione o curso.',
            'turma_id.required' => 'Selecione a turma.',
            'data_inscricao.required' => 'A data da inscrição é obrigatória.',
            'estado.required' => 'Selecione o estado da inscrição.',
            'estado.in' => 'O estado selecionado é inválido.',
        ]);

        $turma = Turma::findOrFail($validated['turma_id']);

        if ($turma->curso_id != $validated['curso_id']) {
            return back()
                ->withInput()
                ->withErrors([
                    'turma_id' => 'A turma selecionada não pertence ao curso escolhido.'
                ]);
        }

        $inscricao->update([
            'estudante_id' => $validated['estudante_id'],
            'curso_id' => $validated['curso_id'],
            'turma_id' => $validated['turma_id'],
            'data_inscricao' => $validated['data_inscricao'],
            'estado' => $validated['estado'],
            'observacao' => $validated['observacao'] ?? null,
        ]);

        return redirect()
            ->route('inscricoes.index')
            ->with(
                'success',
                'Inscrição atualizada com sucesso.'
            );
    }

    /**
     * Remove uma inscrição.
     */
    public function destroy(Inscricao $inscricao)
    {
        $inscricao->delete();

        return redirect()
            ->route('inscricoes.index')
            ->with(
                'success',
                'Inscrição eliminada com sucesso.'
            );
    }
}