@extends('layouts.app')

@section('content')

<style>
    :root {
        --azul-principal: #003B73;
        --laranja: #F57C00;
        --fundo: #f8fafc;
        --texto: #1f2937;
        --cinza: #6b7280;
        --borda: #e5e7eb;
    }

    body {
        background: var(--fundo);
    }

    .pagina-disciplina {
        padding: 30px 0 50px;
    }

    .cabecalho-pagina {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .titulo-area h2 {
        margin: 0;
        color: var(--azul-principal);
        font-size: 27px;
        font-weight: 700;
    }

    .titulo-area p {
        margin: 6px 0 0;
        color: var(--cinza);
        font-size: 14px;
    }

    .btn-voltar {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid var(--borda);
        border-radius: 10px;
        background: #fff;
        color: var(--texto);
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-voltar:hover {
        background: #f3f4f6;
        color: var(--azul-principal);
    }

    .card-formulario {
        background: #fff;
        border: 1px solid var(--borda);
        border-radius: 18px;
        overflow: hidden;
    }

    .card-topo {
        padding: 22px 25px;
        border-bottom: 1px solid var(--borda);
        background: #fff;
    }

    .card-topo h5 {
        margin: 0;
        color: var(--texto);
        font-size: 18px;
        font-weight: 700;
    }

    .card-topo p {
        margin: 5px 0 0;
        color: var(--cinza);
        font-size: 13px;
    }

    .card-corpo {
        padding: 28px 25px;
    }

    .campo {
        margin-bottom: 20px;
    }

    .campo label {
        display: block;
        margin-bottom: 7px;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
    }

    .campo label .obrigatorio {
        color: #dc2626;
    }

    .form-control,
    .form-select {
        min-height: 46px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        padding: 10px 13px;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--azul-principal);
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .texto-ajuda {
        display: block;
        margin-top: 6px;
        color: #9ca3af;
        font-size: 12px;
    }

    .erro-campo {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .preview-curso {
        display: none;
        margin-top: 10px;
        padding: 12px 14px;
        border-radius: 10px;
        background: #f0f7ff;
        border: 1px solid #dbeafe;
    }

    .preview-curso .titulo {
        color: var(--azul-principal);
        font-size: 13px;
        font-weight: 700;
    }

    .preview-curso .detalhe {
        margin-top: 3px;
        color: var(--cinza);
        font-size: 12px;
    }

    .estado-opcoes {
        display: flex;
        gap: 10px;
    }

    .estado-opcao {
        flex: 1;
        position: relative;
    }

    .estado-opcao input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .estado-opcao label {
        min-height: 46px;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: #fff;
        color: #4b5563;
        cursor: pointer;
        transition: .2s ease;
    }

    .estado-opcao input:checked + label {
        border-color: var(--azul-principal);
        background: #eff6ff;
        color: var(--azul-principal);
        font-weight: 700;
    }

    .acoes-formulario {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 8px;
        border-top: 1px solid var(--borda);
        margin-top: 10px;
    }

    .btn-cancelar {
        padding: 11px 20px;
        border: 1px solid var(--borda);
        border-radius: 10px;
        background: #fff;
        color: #4b5563;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-cancelar:hover {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-guardar {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 21px;
        border: none;
        border-radius: 10px;
        background: var(--azul-principal);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-guardar:hover {
        background: #002f5c;
        color: #fff;
    }

    .alerta-erro {
        margin-bottom: 22px;
        border-radius: 10px;
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #991b1b;
        padding: 13px 16px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .pagina-disciplina {
            padding: 20px 10px 40px;
        }

        .cabecalho-pagina {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-voltar {
            width: 100%;
            justify-content: center;
        }

        .card-corpo,
        .card-topo {
            padding: 20px;
        }

        .estado-opcoes {
            flex-direction: column;
        }

        .acoes-formulario {
            flex-direction: column-reverse;
        }

        .btn-cancelar,
        .btn-guardar {
            width: 100%;
            justify-content: center;
            text-align: center;
        }
    }
</style>

<div class="container-fluid pagina-disciplina">

    {{-- CABEÇALHO --}}
    <div class="cabecalho-pagina">

        <div class="titulo-area">
            <h2>Registar disciplina</h2>
            <p>Adicione uma nova disciplina e associe-a ao respetivo curso.</p>
        </div>

        <a href="{{ route('disciplinas.index') }}" class="btn-voltar">
            <i class="bi bi-arrow-left"></i>
            Voltar
        </a>

    </div>

    {{-- ERROS DE VALIDAÇÃO --}}
    @if ($errors->any())
        <div class="alerta-erro">
            <strong>Verifique os dados informados.</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULÁRIO --}}
    <div class="card-formulario">

        <div class="card-topo">
            <h5>
                <i class="bi bi-journal-bookmark me-2"
                   style="color: var(--laranja);"></i>
                Dados da disciplina
            </h5>

            <p>
                Preencha as informações abaixo para cadastrar a disciplina.
            </p>
        </div>

        <div class="card-corpo">

            <form action="{{ route('disciplinas.store') }}" method="POST">

                @csrf

                <div class="row">

                    {{-- CURSO --}}
                    <div class="col-md-8">
                        <div class="campo">

                            <label for="curso_id">
                                Curso
                                <span class="obrigatorio">*</span>
                            </label>

                            <select
                                name="curso_id"
                                id="curso_id"
                                class="form-select @error('curso_id') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione o curso</option>

                                @foreach ($cursos as $curso)
                                    <option
                                        value="{{ $curso->id }}"
                                        data-codigo="{{ $curso->codigo }}"
                                        data-modalidade="{{ $curso->modalidade }}"
                                        data-duracao="{{ $curso->duracao }}"
                                        {{ old('curso_id') == $curso->id ? 'selected' : '' }}
                                    >
                                        {{ $curso->codigo }} — {{ $curso->nome }}
                                    </option>
                                @endforeach
                            </select>

                            @error('curso_id')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                            <span class="texto-ajuda">
                                Selecione o curso ao qual esta disciplina pertence.
                            </span>

                            {{-- PREVIEW DO CURSO --}}
                            <div id="previewCurso" class="preview-curso">

                                <div class="titulo" id="previewNome">
                                    —
                                </div>

                                <div class="detalhe">
                                    <span id="previewCodigo">—</span>
                                    <span class="mx-1">•</span>
                                    <span id="previewModalidade">—</span>
                                    <span class="mx-1">•</span>
                                    <span id="previewDuracao">—</span>
                                </div>

                            </div>

                        </div>
                    </div>

                    {{-- CÓDIGO --}}
                    <div class="col-md-4">
                        <div class="campo">

                            <label for="codigo">
                                Código da disciplina
                                <span class="obrigatorio">*</span>
                            </label>

                            <input
                                type="text"
                                name="codigo"
                                id="codigo"
                                class="form-control @error('codigo') is-invalid @enderror"
                                value="{{ old('codigo') }}"
                                placeholder="Ex.: INF01"
                                maxlength="50"
                                required
                            >

                            @error('codigo')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                            <span class="texto-ajuda">
                                Código único da disciplina.
                            </span>

                        </div>
                    </div>

                    {{-- NOME --}}
                    <div class="col-md-8">
                        <div class="campo">

                            <label for="nome">
                                Nome da disciplina
                                <span class="obrigatorio">*</span>
                            </label>

                            <input
                                type="text"
                                name="nome"
                                id="nome"
                                class="form-control @error('nome') is-invalid @enderror"
                                value="{{ old('nome') }}"
                                placeholder="Ex.: Introdução à Informática"
                                maxlength="255"
                                required
                            >

                            @error('nome')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>

                    {{-- SEMESTRE --}}
                    <div class="col-md-4">
                        <div class="campo">

                            <label for="semestre">
                                Semestre
                            </label>

                            <select
                                name="semestre"
                                id="semestre"
                                class="form-select @error('semestre') is-invalid @enderror"
                            >
                                <option value="">Selecione</option>

                                <option value="1º Semestre"
                                    {{ old('semestre') == '1º Semestre' ? 'selected' : '' }}>
                                    1º Semestre
                                </option>

                                <option value="2º Semestre"
                                    {{ old('semestre') == '2º Semestre' ? 'selected' : '' }}>
                                    2º Semestre
                                </option>

                                <option value="Anual"
                                    {{ old('semestre') == 'Anual' ? 'selected' : '' }}>
                                    Anual
                                </option>
                            </select>

                            @error('semestre')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>

                    {{-- CARGA HORÁRIA --}}
                    <div class="col-md-4">
                        <div class="campo">

                            <label for="carga_horaria">
                                Carga horária
                            </label>

                            <div class="input-group">
                                <input
                                    type="number"
                                    name="carga_horaria"
                                    id="carga_horaria"
                                    class="form-control @error('carga_horaria') is-invalid @enderror"
                                    value="{{ old('carga_horaria') }}"
                                    placeholder="Ex.: 60"
                                    min="1"
                                >

                                <span class="input-group-text">
                                    horas
                                </span>
                            </div>

                            @error('carga_horaria')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>

                    {{-- ESTADO --}}
                    <div class="col-md-4">
                        <div class="campo">

                            <label>
                                Estado
                                <span class="obrigatorio">*</span>
                            </label>

                            <div class="estado-opcoes">

                                <div class="estado-opcao">
                                    <input
                                        type="radio"
                                        name="estado"
                                        id="estado_ativo"
                                        value="1"
                                        {{ old('estado', '1') == '1' ? 'checked' : '' }}
                                    >

                                    <label for="estado_ativo">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Ativa
                                    </label>
                                </div>

                                <div class="estado-opcao">
                                    <input
                                        type="radio"
                                        name="estado"
                                        id="estado_inativo"
                                        value="0"
                                        {{ old('estado') === '0' ? 'checked' : '' }}
                                    >

                                    <label for="estado_inativo">
                                        <i class="bi bi-pause-circle me-2"></i>
                                        Inativa
                                    </label>
                                </div>

                            </div>

                            @error('estado')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div class="col-12">
                        <div class="campo">

                            <label for="descricao">
                                Descrição
                            </label>

                            <textarea
                                name="descricao"
                                id="descricao"
                                class="form-control @error('descricao') is-invalid @enderror"
                                placeholder="Descreva brevemente os conteúdos ou objetivos da disciplina..."
                                maxlength="1000"
                            >{{ old('descricao') }}</textarea>

                            @error('descricao')
                                <div class="erro-campo">
                                    {{ $message }}
                                </div>
                            @enderror

                            <span class="texto-ajuda">
                                Campo opcional. Máximo de 1000 caracteres.
                            </span>

                        </div>
                    </div>

                </div>

                {{-- AÇÕES --}}
                <div class="acoes-formulario">

                    <a
                        href="{{ route('disciplinas.index') }}"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn-guardar"
                    >
                        <i class="bi bi-check-lg"></i>
                        Registar disciplina
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const cursoSelect = document.getElementById('curso_id');
        const previewCurso = document.getElementById('previewCurso');

        const previewNome = document.getElementById('previewNome');
        const previewCodigo = document.getElementById('previewCodigo');
        const previewModalidade = document.getElementById('previewModalidade');
        const previewDuracao = document.getElementById('previewDuracao');

        function atualizarCurso() {

            const option = cursoSelect.options[cursoSelect.selectedIndex];

            if (!option || !option.value) {
                previewCurso.style.display = 'none';
                return;
            }

            previewCurso.style.display = 'block';

            const texto = option.textContent.trim();

            const partes = texto.split('—');

            previewCodigo.textContent =
                option.dataset.codigo || 'Sem código';

            previewNome.textContent =
                partes.length > 1
                    ? partes.slice(1).join('—').trim()
                    : texto;

            previewModalidade.textContent =
                option.dataset.modalidade || 'Modalidade não definida';

            previewDuracao.textContent =
                option.dataset.duracao || 'Duração não definida';
        }

        cursoSelect.addEventListener('change', atualizarCurso);

        atualizarCurso();
    });
</script>

@endsection

