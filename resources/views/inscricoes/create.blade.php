@extends('layouts.app')

@section('title', 'Nova Inscrição')

@section('content')

<style>
    :root {
        --azul-principal: #003B73;
        --laranja: #F57C00;
        --fundo: #f8fafc;
        --borda: #e5e7eb;
        --texto: #1f2937;
        --cinza: #6b7280;
        --verde: #15803d;
    }

    .inscricao-page {
        background: var(--fundo);
        min-height: calc(100vh - 70px);
        padding: 35px 0 50px;
    }

    /* CABEÇALHO */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-title-area {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .title-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #e8f1f8;
        color: var(--azul-principal);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .page-title {
        margin: 0;
        font-size: 25px;
        font-weight: 700;
        color: var(--texto);
    }

    .page-subtitle {
        margin: 4px 0 0;
        color: var(--cinza);
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid var(--borda);
        background: #fff;
        color: var(--texto);
        padding: 10px 16px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .back-btn:hover {
        color: var(--azul-principal);
        border-color: var(--azul-principal);
        background: #f8fbfe;
    }

    /* CARD */
    .form-card {
        background: #fff;
        border: 1px solid var(--borda);
        border-radius: 16px;
        overflow: hidden;
    }

    .form-card-header {
        padding: 22px 25px;
        border-bottom: 1px solid var(--borda);
    }

    .form-card-header h5 {
        margin: 0;
        color: var(--texto);
        font-size: 17px;
        font-weight: 700;
    }

    .form-card-header p {
        margin: 5px 0 0;
        color: var(--cinza);
        font-size: 13px;
    }

    .form-card-body {
        padding: 28px 25px;
    }

    /* INFORMAÇÃO */
    .info-box {
        background: #f5f9fc;
        border: 1px solid #dbe8f2;
        border-radius: 10px;
        padding: 14px 16px;
        color: #536579;
        font-size: 13px;
        margin-bottom: 28px;
    }

    .info-box i {
        color: var(--azul-principal);
        margin-right: 7px;
    }

    /* SECÇÕES */
    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #fff1e6;
        color: var(--azul-principal);
        font-size: 16px;
        font-weight: 700;
    }

    .section-title i {
        color: var(--laranja);
    }

    /* FORM */
    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 7px;
    }

    .required {
        color: #dc2626;
    }

    .form-control,
    .form-select {
        min-height: 44px;
        border: 1px solid #d9dee5;
        border-radius: 9px;
        font-size: 14px;
        color: var(--texto);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--azul-principal);
        box-shadow: 0 0 0 3px rgba(0, 59, 115, .08);
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .invalid-feedback {
        font-size: 12px;
    }

    /* ESTUDANTE INFO */
    .student-preview {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background: #f8fafc;
        border: 1px solid var(--borda);
        border-radius: 10px;
    }

    .student-preview.active {
        display: block;
    }

    .student-preview-title {
        font-size: 12px;
        font-weight: 700;
        color: var(--cinza);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .student-preview-name {
        font-size: 15px;
        font-weight: 700;
        color: var(--texto);
    }

    .student-preview-info {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 8px;
        font-size: 13px;
        color: var(--cinza);
    }

    .student-preview-info span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .student-preview-info i {
        color: var(--azul-principal);
    }

    /* CURSO INFO */
    .course-preview {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background: #fffaf5;
        border: 1px solid #fde5cf;
        border-radius: 10px;
    }

    .course-preview.active {
        display: block;
    }

    .course-name {
        font-size: 15px;
        font-weight: 700;
        color: var(--texto);
        margin-bottom: 10px;
    }

    .course-details {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 13px;
        color: var(--cinza);
    }

    .course-details span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .course-details i {
        color: var(--laranja);
    }

    /* TURMAS */
    .turma-help {
        margin-top: 6px;
        font-size: 12px;
        color: var(--cinza);
    }

    .no-turma {
        display: none;
        margin-top: 8px;
        font-size: 12px;
        color: #b45309;
    }

    /* CÓDIGO */
    .code-info {
        background: #f8fafc;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        padding: 14px 16px;
        margin-top: 10px;
        font-size: 13px;
        color: var(--cinza);
    }

    .code-info strong {
        color: var(--azul-principal);
    }

    /* BOTÕES */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 25px;
        margin-top: 30px;
        border-top: 1px solid var(--borda);
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 20px;
        border: 1px solid var(--borda);
        border-radius: 9px;
        background: #fff;
        color: #4b5563;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: #f8fafc;
        color: var(--texto);
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 22px;
        border: none;
        border-radius: 9px;
        background: var(--laranja);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-save:hover {
        background: #df6d00;
        color: #fff;
        transform: translateY(-1px);
    }

    /* RESPONSIVO */
    @media (max-width: 767px) {

        .inscricao-page {
            padding: 20px 0 35px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-title {
            font-size: 22px;
        }

        .back-btn {
            width: 100%;
            justify-content: center;
        }

        .form-card-body,
        .form-card-header {
            padding: 20px 17px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }
</style>

<div class="inscricao-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">

            <div class="page-title-area">

                <div class="title-icon">
                    <i class="fas fa-file-signature"></i>
                </div>

                <div>
                    <h1 class="page-title">Nova Inscrição</h1>

                    <p class="page-subtitle">
                        Registe a inscrição de um estudante num curso.
                    </p>
                </div>

            </div>

            <a href="{{ route('inscricoes.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>

        </div>


        {{-- CARD --}}
        <div class="form-card">

            <div class="form-card-header">

                <h5>Dados da inscrição</h5>

                <p>
                    Preencha os dados abaixo para efectuar uma nova inscrição.
                </p>

            </div>


            <div class="form-card-body">

                {{-- INFORMAÇÃO --}}
                <div class="info-box">

                    <i class="fas fa-circle-info"></i>

                    O código da inscrição será gerado automaticamente pelo sistema
                    após o registo, no formato
                    <strong>INS-{{ date('Y') }}-0001</strong>.

                </div>


                <form
                    action="{{ route('inscricoes.store') }}"
                    method="POST"
                >

                    @csrf


                    {{-- ===================================================== --}}
                    {{-- ESTUDANTE --}}
                    {{-- ===================================================== --}}

                    <div class="section-title">

                        <i class="fas fa-user-graduate"></i>

                        Estudante

                    </div>


                    <div class="row g-4">

                        <div class="col-12">

                            <label
                                for="estudante_id"
                                class="form-label"
                            >
                                Estudante
                                <span class="required">*</span>
                            </label>


                            <select
                                name="estudante_id"
                                id="estudante_id"
                                class="form-select @error('estudante_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Selecione o estudante
                                </option>

                                @foreach($estudantes as $estudante)

                                    <option
                                        value="{{ $estudante->id }}"
                                        data-nome="{{ $estudante->usuario->nome ?? 'Sem nome' }}"
                                        data-email="{{ $estudante->usuario->email ?? '-' }}"
                                        data-telefone="{{ $estudante->usuario->telefone ?? '-' }}"
                                        data-numero="{{ $estudante->numero_estudante }}"
                                        {{ old('estudante_id') == $estudante->id ? 'selected' : '' }}
                                    >

                                        {{ $estudante->numero_estudante }}
                                        -
                                        {{ $estudante->usuario->nome ?? 'Sem nome' }}

                                    </option>

                                @endforeach

                            </select>


                            @error('estudante_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            {{-- INFORMAÇÕES DO ESTUDANTE --}}
                            <div
                                id="studentPreview"
                                class="student-preview"
                            >

                                <div class="student-preview-title">
                                    Dados do estudante
                                </div>

                                <div
                                    id="studentName"
                                    class="student-preview-name"
                                ></div>

                                <div class="student-preview-info">

                                    <span>
                                        <i class="fas fa-id-card"></i>
                                        <strong id="studentNumber"></strong>
                                    </span>

                                    <span>
                                        <i class="fas fa-envelope"></i>
                                        <span id="studentEmail"></span>
                                    </span>

                                    <span>
                                        <i class="fas fa-phone"></i>
                                        <span id="studentPhone"></span>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- CURSO --}}
                    {{-- ===================================================== --}}

                    <div class="section-title mt-5">

                        <i class="fas fa-book-open"></i>

                        Curso

                    </div>


                    <div class="row g-4">

                        <div class="col-md-8">

                            <label
                                for="curso_id"
                                class="form-label"
                            >
                                Curso
                                <span class="required">*</span>
                            </label>


                            <select
                                name="curso_id"
                                id="curso_id"
                                class="form-select @error('curso_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Selecione o curso
                                </option>

                                @foreach($cursos as $curso)

                                    <option
                                        value="{{ $curso->id }}"
                                        data-codigo="{{ $curso->codigo }}"
                                        data-modalidade="{{ $curso->modalidade }}"
                                        data-duracao="{{ $curso->duracao }}"
                                        data-preco="{{ $curso->preco }}"
                                        {{ old('curso_id') == $curso->id ? 'selected' : '' }}
                                    >

                                        {{ $curso->codigo }}
                                        -
                                        {{ $curso->nome }}

                                    </option>

                                @endforeach

                            </select>


                            @error('curso_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            {{-- INFORMAÇÕES DO CURSO --}}
                            <div
                                id="coursePreview"
                                class="course-preview"
                            >

                                <div
                                    id="courseName"
                                    class="course-name"
                                ></div>

                                <div class="course-details">

                                    <span>
                                        <i class="fas fa-hashtag"></i>
                                        <span id="courseCode"></span>
                                    </span>

                                    <span>
                                        <i class="fas fa-laptop"></i>
                                        <span id="courseMode"></span>
                                    </span>

                                    <span>
                                        <i class="fas fa-clock"></i>
                                        <span id="courseDuration"></span>
                                    </span>

                                    <span>
                                        <i class="fas fa-money-bill"></i>
                                        <span id="coursePrice"></span>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- TURMA --}}
                    {{-- ===================================================== --}}

                    <div class="section-title mt-5">

                        <i class="fas fa-users"></i>

                        Turma

                    </div>


                    <div class="row g-4">

                        <div class="col-md-8">

                            <label
                                for="turma_id"
                                class="form-label"
                            >
                                Turma
                                <span class="required">*</span>
                            </label>


                            <select
                                name="turma_id"
                                id="turma_id"
                                class="form-select @error('turma_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Primeiro selecione um curso
                                </option>

                                @foreach($turmas as $turma)

                                    <option
                                        value="{{ $turma->id }}"
                                        data-curso="{{ $turma->curso_id }}"
                                        data-vagas="{{ $turma->numero_vagas }}"
                                        data-sala="{{ $turma->sala }}"
                                        data-inicio="{{ $turma->data_inicio?->format('d/m/Y') }}"
                                        data-fim="{{ $turma->data_fim?->format('d/m/Y') }}"
                                        {{ old('turma_id') == $turma->id ? 'selected' : '' }}
                                    >

                                        {{ $turma->codigo }}
                                        -
                                        {{ $turma->nome }}

                                    </option>

                                @endforeach

                            </select>


                            @error('turma_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            <div class="turma-help">

                                <i class="fas fa-circle-info"></i>

                                Apenas turmas pertencentes ao curso selecionado
                                serão apresentadas.

                            </div>


                            <div
                                id="noTurma"
                                class="no-turma"
                            >

                                <i class="fas fa-triangle-exclamation"></i>

                                Não existem turmas disponíveis para este curso.

                            </div>

                        </div>


                        {{-- DETALHES DA TURMA --}}

                        <div
                            class="col-md-4"
                            id="turmaDetails"
                            style="display: none;"
                        >

                            <div class="code-info">

                                <strong>Detalhes da turma</strong>

                                <div class="mt-2">

                                    <div>
                                        <i class="fas fa-chair"></i>
                                        Sala:
                                        <span id="turmaSala">-</span>
                                    </div>

                                    <div class="mt-1">
                                        <i class="fas fa-users"></i>
                                        Vagas:
                                        <span id="turmaVagas">-</span>
                                    </div>

                                    <div class="mt-1">
                                        <i class="fas fa-calendar"></i>
                                        Início:
                                        <span id="turmaInicio">-</span>
                                    </div>

                                    <div class="mt-1">
                                        <i class="fas fa-calendar-check"></i>
                                        Fim:
                                        <span id="turmaFim">-</span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- DADOS DA INSCRIÇÃO --}}
                    {{-- ===================================================== --}}

                    <div class="section-title mt-5">

                        <i class="fas fa-file-circle-check"></i>

                        Dados da inscrição

                    </div>


                    <div class="row g-4">

                        <div class="col-md-4">

                            <label
                                for="data_inscricao"
                                class="form-label"
                            >
                                Data da inscrição
                                <span class="required">*</span>
                            </label>


                            <input
                                type="date"
                                name="data_inscricao"
                                id="data_inscricao"
                                value="{{ old('data_inscricao', date('Y-m-d')) }}"
                                class="form-control @error('data_inscricao') is-invalid @enderror"
                                required
                            >


                            @error('data_inscricao')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="col-md-8">

                            <label
                                for="observacao"
                                class="form-label"
                            >
                                Observação
                            </label>


                            <textarea
                                name="observacao"
                                id="observacao"
                                class="form-control @error('observacao') is-invalid @enderror"
                                placeholder="Adicione alguma observação, se necessário..."
                            >{{ old('observacao') }}</textarea>


                            @error('observacao')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    {{-- ESTADO --}}
                    <div class="code-info mt-4">

                        <i class="fas fa-clock"></i>

                        Após o registo, a inscrição será criada com o estado

                        <strong>Pendente</strong>.

                        A análise e alteração do estado serão realizadas
                        posteriormente.

                    </div>


                    {{-- BOTÕES --}}
                    <div class="form-actions">

                        <a
                            href="{{ route('inscricoes.index') }}"
                            class="btn-cancel"
                        >

                            <i class="fas fa-xmark"></i>

                            Cancelar

                        </a>


                        <button
                            type="submit"
                            class="btn-save"
                        >

                            <i class="fas fa-file-signature"></i>

                            Registar inscrição

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const estudanteSelect = document.getElementById('estudante_id');

    const studentPreview = document.getElementById('studentPreview');

    const studentName = document.getElementById('studentName');
    const studentNumber = document.getElementById('studentNumber');
    const studentEmail = document.getElementById('studentEmail');
    const studentPhone = document.getElementById('studentPhone');


    const cursoSelect = document.getElementById('curso_id');

    const coursePreview = document.getElementById('coursePreview');

    const courseName = document.getElementById('courseName');
    const courseCode = document.getElementById('courseCode');
    const courseMode = document.getElementById('courseMode');
    const courseDuration = document.getElementById('courseDuration');
    const coursePrice = document.getElementById('coursePrice');


    const turmaSelect = document.getElementById('turma_id');

    const noTurma = document.getElementById('noTurma');

    const turmaDetails = document.getElementById('turmaDetails');

    const turmaSala = document.getElementById('turmaSala');
    const turmaVagas = document.getElementById('turmaVagas');
    const turmaInicio = document.getElementById('turmaInicio');
    const turmaFim = document.getElementById('turmaFim');


    /*
    |--------------------------------------------------------------------------
    | ESTUDANTE
    |--------------------------------------------------------------------------
    */

    function atualizarEstudante() {

        const option =
            estudanteSelect.options[
                estudanteSelect.selectedIndex
            ];

        if (!option || !option.value) {

            studentPreview.classList.remove('active');

            return;
        }


        studentName.textContent =
            option.dataset.nome || '-';

        studentNumber.textContent =
            option.dataset.numero || '-';

        studentEmail.textContent =
            option.dataset.email || '-';

        studentPhone.textContent =
            option.dataset.telefone || '-';


        studentPreview.classList.add('active');
    }


    estudanteSelect.addEventListener(
        'change',
        atualizarEstudante
    );


    /*
    |--------------------------------------------------------------------------
    | CURSO
    |--------------------------------------------------------------------------
    */

    function atualizarCurso() {

        const option =
            cursoSelect.options[
                cursoSelect.selectedIndex
            ];


        if (!option || !option.value) {

            coursePreview.classList.remove('active');

            filtrarTurmas('');

            return;
        }


        const nomeCurso =
            option.textContent
                .replace(/^\s+|\s+$/g, '')
                .replace(/\s+/g, ' ');


        courseName.textContent = nomeCurso;

        courseCode.textContent =
            option.dataset.codigo || '-';

        courseMode.textContent =
            option.dataset.modalidade || '-';

        courseDuration.textContent =
            option.dataset.duracao || '-';

        coursePrice.textContent =
            option.dataset.preco
                ? option.dataset.preco + ' MT'
                : '-';


        coursePreview.classList.add('active');


        filtrarTurmas(option.value);
    }


    cursoSelect.addEventListener(
        'change',
        atualizarCurso
    );


    /*
    |--------------------------------------------------------------------------
    | TURMAS POR CURSO
    |--------------------------------------------------------------------------
    */

    function filtrarTurmas(cursoId) {

        const opcoes =
            Array.from(turmaSelect.querySelectorAll('option[data-curso]'));


        const turmaAnterior =
            "{{ old('turma_id') }}";


        turmaSelect.innerHTML = '';


        if (!cursoId) {

            const option =
                document.createElement('option');

            option.value = '';

            option.textContent =
                'Primeiro selecione um curso';

            turmaSelect.appendChild(option);

            noTurma.style.display = 'none';

            turmaDetails.style.display = 'none';

            return;
        }


        const primeiraOpcao =
            document.createElement('option');

        primeiraOpcao.value = '';

        primeiraOpcao.textContent =
            'Selecione a turma';

        turmaSelect.appendChild(primeiraOpcao);


        let total = 0;


        opcoes.forEach(function (option) {

            if (option.dataset.curso == cursoId) {

                turmaSelect.appendChild(
                    option.cloneNode(true)
                );

                total++;
            }

        });


        if (total === 0) {

            noTurma.style.display = 'block';

        } else {

            noTurma.style.display = 'none';

        }


        turmaDetails.style.display = 'none';


        if (turmaAnterior) {

            turmaSelect.value = turmaAnterior;

            atualizarTurma();

        }

    }


    /*
    |--------------------------------------------------------------------------
    | DETALHES DA TURMA
    |--------------------------------------------------------------------------
    */

    function atualizarTurma() {

        const option =
            turmaSelect.options[
                turmaSelect.selectedIndex
            ];


        if (!option || !option.value) {

            turmaDetails.style.display = 'none';

            return;
        }


        turmaSala.textContent =
            option.dataset.sala || '-';

        turmaVagas.textContent =
            option.dataset.vagas || '-';

        turmaInicio.textContent =
            option.dataset.inicio || '-';

        turmaFim.textContent =
            option.dataset.fim || '-';


        turmaDetails.style.display = 'block';
    }


    turmaSelect.addEventListener(
        'change',
        atualizarTurma
    );


    /*
    |--------------------------------------------------------------------------
    | CARREGAR VALORES ANTIGOS
    |--------------------------------------------------------------------------
    */

    atualizarEstudante();

    atualizarCurso();

});

</script>

@endsection