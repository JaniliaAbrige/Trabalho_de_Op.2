@extends('layouts.app')

@section('title', 'Registar Curso')

@section('content')

<style>
    :root {
        --sg-primary: #6C3CE9;
        --sg-primary-dark: #4C1FB8;
        --sg-primary-light: #F1ECFE;
        --sg-teal: #2DD4BF;
        --sg-text: #1F2333;
        --sg-muted: #6b7280;
        --sg-border: #ECEAF5;
    }

    .curso-page {
        background: #F8F7FC;
        min-height: calc(100vh - 140px);
        padding: 35px 0 50px;
        font-family: 'Inter', sans-serif;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        font-family: 'Poppins', sans-serif;
        color: var(--sg-text);
        font-size: 26px;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: var(--sg-muted);
        margin: 6px 0 0;
        font-size: 14px;
    }

    .curso-card {
        background: #fff;
        border: 1px solid var(--sg-border);
        border-radius: 14px;
        overflow: hidden;
    }

    .card-title-area {
        padding: 20px 24px;
        border-bottom: 1px solid var(--sg-border);
        display: flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, var(--sg-primary), #9B6DFF);
    }

    .title-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: rgba(255,255,255,.18);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .card-title-area h2 {
        font-family: 'Poppins', sans-serif;
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .card-title-area p {
        color: rgba(255,255,255,.8);
        font-size: 12px;
        margin: 3px 0 0;
    }

    .form-area {
        padding: 28px 24px;
    }

    .section-title {
        font-family: 'Poppins', sans-serif;
        color: var(--sg-text);
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 18px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--sg-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title i {
        color: var(--sg-primary);
        font-size: 13px;
    }

    .form-label {
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control,
    .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        min-height: 43px;
        font-size: 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--sg-primary);
        box-shadow: 0 0 0 3px rgba(108, 60, 233, .1);
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .required {
        color: var(--sg-primary);
    }

    .form-text {
        font-size: 11px;
        color: var(--sg-muted);
    }

    .invalid-feedback {
        font-size: 12px;
    }


    /* ===== CAPA DO CURSO (upload de imagem) ===== */

    .capa-upload {
        position: relative;
        border: 2px dashed #D9D1F7;
        border-radius: 12px;
        background: var(--sg-primary-light);
        min-height: 190px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;

        cursor: pointer;
        overflow: hidden;
        transition: .2s;
    }

    .capa-upload:hover {
        border-color: var(--sg-primary);
    }

    .capa-upload input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .capa-upload-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #fff;
        color: var(--sg-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        margin-bottom: 10px;
    }

    .capa-upload-text strong {
        display: block;
        color: var(--sg-text);
        font-size: 13px;
        margin-bottom: 3px;
    }

    .capa-upload-text span {
        color: var(--sg-muted);
        font-size: 11px;
    }

    .capa-preview {
        display: none;
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    /* ===== GRATUITO (toggle) ===== */

    .gratis-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;

        background: var(--sg-primary-light);
        border: 1px solid #E4D9FC;
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 16px;
    }

    .gratis-box-label {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .gratis-box-label i {
        color: var(--sg-primary);
        font-size: 16px;
    }

    .gratis-box-label strong {
        display: block;
        color: var(--sg-text);
        font-size: 13px;
    }

    .gratis-box-label span {
        color: var(--sg-muted);
        font-size: 11px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .switch-slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background: #d1d5db;
        border-radius: 24px;
        transition: .2s;
    }

    .switch-slider::before {
        content: "";
        position: absolute;
        height: 18px;
        width: 18px;
        left: 3px;
        top: 3px;
        background: #fff;
        border-radius: 50%;
        transition: .2s;
    }

    .switch input:checked + .switch-slider {
        background: var(--sg-primary);
    }

    .switch input:checked + .switch-slider::before {
        transform: translateX(20px);
    }

    #preco-wrapper.disabled {
        opacity: .4;
        pointer-events: none;
    }


    /* ===== MATERIAIS / UPLOAD DE DOCUMENTOS ===== */

    .materiais-upload {
        border: 2px dashed var(--sg-border);
        border-radius: 12px;
        padding: 26px 20px;
        text-align: center;
        position: relative;
        background: #FAFAFD;
        transition: .2s;
    }

    .materiais-upload:hover {
        border-color: var(--sg-primary);
    }

    .materiais-upload input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .materiais-upload-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: var(--sg-primary-light);
        color: var(--sg-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin: 0 auto 10px;
    }

    .materiais-upload strong {
        display: block;
        color: var(--sg-text);
        font-size: 13px;
        margin-bottom: 3px;
    }

    .materiais-upload span {
        color: var(--sg-muted);
        font-size: 11px;
    }

    #lista-materiais {
        margin-top: 14px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .material-item {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border: 1px solid var(--sg-border);
        border-radius: 8px;
        padding: 9px 12px;
        font-size: 12px;
        color: var(--sg-text);
    }

    .material-item i {
        color: var(--sg-primary);
    }


    .form-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid var(--sg-border);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-cancelar {
        border: 1px solid #d1d5db;
        color: #374151;
        background: #fff;
        border-radius: 8px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-cancelar:hover {
        background: #f8fafc;
        color: var(--sg-primary);
    }

    .btn-registar {
        border: none;
        background: var(--sg-primary);
        color: #fff;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-registar:hover {
        background: var(--sg-primary-dark);
        color: #fff;
    }

    @media (max-width: 767px) {
        .curso-page {
            padding: 25px 0 40px;
        }

        .form-area {
            padding: 22px 18px;
        }

        .card-title-area {
            padding: 18px;
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-cancelar,
        .btn-registar {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="curso-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">
            <h1>Registar curso</h1>
            <p>Preencha os dados abaixo para adicionar um novo curso ao sistema.</p>
        </div>

        {{-- FORMULÁRIO --}}
        <div class="curso-card">

            <div class="card-title-area">
                <div>
                    <h2>Dados do curso</h2>
                    <p>Informações gerais e condições de inscrição</p>
                </div>
            </div>

            <div class="form-area">

                {{--
                    NOTA IMPORTANTE: este form envia ficheiros (capa, documentos),
                    por isso precisa de enctype="multipart/form-data". O
                    CursoController::store() que me mandaste ainda não valida nem
                    guarda capa, gratis, documentos[] nem link_aula — vais
                    precisar de adicionar essas colunas à tabela cursos (migration)
                    e as regras correspondentes no validate().
                --}}

                <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data" id="form-curso">

                    @csrf

                    {{-- INFORMAÇÕES PRINCIPAIS --}}
                    <div class="section-title">
                        Informações principais
                    </div>

                    <div class="row g-3">

                        {{-- CAPA DO CURSO --}}
                        <div class="col-12">
                            <label class="form-label">
                                Capa do curso <span class="form-text">(opcional — recomendado 1200x630px)</span>
                            </label>

                            <label class="capa-upload" id="capa-upload">
                                <input type="file" name="capa" id="capa" accept="image/*">

                                <img id="capa-preview" class="capa-preview" alt="Pré-visualização da capa">

                                <div id="capa-placeholder">
                                    <div class="capa-upload-text">
                                        <strong>Clique para carregar a imagem de capa</strong>
                                        <span>PNG ou JPG, até 2MB</span>
                                    </div>
                                </div>
                            </label>

                            @error('capa')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- CATEGORIA --}}
                        <div class="col-md-6">
                            <label for="categoria_id" class="form-label">
                                Categoria
                            </label>

                            <select
                                name="categoria_id"
                                id="categoria_id"
                                class="form-select @error('categoria_id') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione a categoria</option>

                                @foreach($categorias as $categoria)
                                    <option
                                        value="{{ $categoria->id }}"
                                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}
                                    >
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>

                            @error('categoria_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- CÓDIGO --}}
                        <div class="col-md-6">
                            <label for="codigo" class="form-label">
                                Código do curso
                            </label>

                            <input
                                type="text"
                                name="codigo"
                                id="codigo"
                                class="form-control @error('codigo') is-invalid @enderror"
                                value="{{ old('codigo') }}"
                                placeholder="Ex.: CUR-001"
                                required
                            >

                            @error('codigo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- NOME --}}
                        <div class="col-12">
                            <label for="nome" class="form-label">
                                Nome do curso
                            </label>

                            <input
                                type="text"
                                name="nome"
                                id="nome"
                                class="form-control @error('nome') is-invalid @enderror"
                                value="{{ old('nome') }}"
                                placeholder="Ex.: Desenvolvimento Web"
                                required
                            >

                            @error('nome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- DESCRIÇÃO --}}
                        <div class="col-12">
                            <label for="descricao" class="form-label">
                                Descrição
                            </label>

                            <textarea
                                name="descricao"
                                id="descricao"
                                class="form-control @error('descricao') is-invalid @enderror"
                                placeholder="Descreva brevemente o curso..."
                            >{{ old('descricao') }}</textarea>

                            @error('descricao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- DURAÇÃO --}}
                    <div class="section-title mt-4">
                        Duração e modalidade
                    </div>

                    <div class="row g-3">

                        {{-- DURAÇÃO --}}
                        <div class="col-md-4">
                            <label for="duracao" class="form-label">
                                Duração
                            </label>

                            <input
                                type="text"
                                name="duracao"
                                id="duracao"
                                class="form-control @error('duracao') is-invalid @enderror"
                                value="{{ old('duracao') }}"
                                placeholder="Ex.: 6 meses"
                                required
                            >

                            @error('duracao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- CARGA HORÁRIA --}}
                        <div class="col-md-4">
                            <label for="carga_horaria" class="form-label">
                                Carga horária
                            </label>

                            <input
                                type="number"
                                name="carga_horaria"
                                id="carga_horaria"
                                class="form-control @error('carga_horaria') is-invalid @enderror"
                                value="{{ old('carga_horaria') }}"
                                placeholder="Ex.: 240"
                                min="1"
                                required
                            >

                            @error('carga_horaria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- MODALIDADE --}}
                        <div class="col-md-4">
                            <label for="modalidade" class="form-label">
                                Modalidade
                            </label>

                            <select
                                name="modalidade"
                                id="modalidade"
                                class="form-select @error('modalidade') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione</option>
                                <option value="Presencial" {{ old('modalidade') == 'Presencial' ? 'selected' : '' }}>
                                    Presencial
                                </option>
                                <option value="Online" {{ old('modalidade') == 'Online' ? 'selected' : '' }}>
                                    Online
                                </option>
                                <option value="Híbrido" {{ old('modalidade') == 'Híbrido' ? 'selected' : '' }}>
                                    Híbrido
                                </option>
                            </select>

                            @error('modalidade')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- PREÇO --}}
                    <div class="section-title mt-4">
                        Preço e vagas
                    </div>

                    <div class="gratis-box">
                        <div class="gratis-box-label">
                            <div>
                                <strong>Este curso é gratuito</strong>
                                <span>Ative para esconder o campo de preço</span>
                            </div>
                        </div>

                        <label class="switch">
                            <input type="checkbox" name="gratis" id="gratis" value="1" {{ old('gratis') ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                    </div>

                    <div class="row g-3">

                        {{-- PREÇO --}}
                        <div class="col-md-6" id="preco-wrapper">
                            <label for="preco" class="form-label">
                                Preço
                            </label>

                            <div class="input-group">
                                <input
                                    type="number"
                                    name="preco"
                                    id="preco"
                                    class="form-control @error('preco') is-invalid @enderror"
                                    value="{{ old('preco') }}"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                >
                                <span class="input-group-text">MT</span>
                            </div>

                            @error('preco')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- VAGAS --}}
                        <div class="col-md-6">
                            <label for="vagas" class="form-label">
                                Vagas
                            </label>

                            <input
                                type="number"
                                name="vagas"
                                id="vagas"
                                class="form-control @error('vagas') is-invalid @enderror"
                                value="{{ old('vagas') }}"
                                placeholder="Ex.: 30"
                                min="1"
                                required
                            >

                            @error('vagas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- MATERIAIS E VIDEOAULA --}}
                    <div class="section-title mt-4">
                        Materiais e videoaula
                    </div>

                    <div class="row g-3">

                        <div class="col-12">
                            <label class="form-label">
                                Documentos e vídeos do curso <span class="form-text">(opcional)</span>
                            </label>

                            <div class="materiais-upload" id="materiais-upload">
                                <input type="file" name="documentos[]" id="documentos" accept=".pdf,video/*" multiple>

                                <strong>Clique para carregar PDFs ou vídeos</strong>
                                <span>Pode selecionar vários ficheiros — PDF, MP4, MOV</span>
                            </div>

                            <div id="lista-materiais"></div>

                            @error('documentos')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="link_aula" class="form-label">
                                Link da videochamada / aula ao vivo <span class="form-text">(opcional)</span>
                            </label>

                            <div class="input-group">
                                <input
                                    type="url"
                                    name="link_aula"
                                    id="link_aula"
                                    class="form-control @error('link_aula') is-invalid @enderror"
                                    value="{{ old('link_aula') }}"
                                    placeholder="Ex.: https://meet.google.com/xxx-xxxx-xxx"
                                >
                            </div>

                            @error('link_aula')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- CONDIÇÕES --}}
                    <div class="section-title mt-4">
                        Condições de inscrição
                    </div>

                    <div class="row g-3">

                        {{-- REQUISITOS --}}
                        <div class="col-12">
                            <label for="requisitos" class="form-label">
                                Requisitos
                            </label>

                            <textarea
                                name="requisitos"
                                id="requisitos"
                                class="form-control @error('requisitos') is-invalid @enderror"
                                placeholder="Indique os requisitos necessários para inscrição..."
                            >{{ old('requisitos') }}</textarea>

                            @error('requisitos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- PERÍODO --}}
                    <div class="section-title mt-4">
                        Período de realização
                    </div>

                    <div class="row g-3">

                        {{-- DATA INÍCIO --}}
                        <div class="col-md-4">
                            <label for="data_inicio" class="form-label">
                                Data de início
                            </label>

                            <input
                                type="date"
                                name="data_inicio"
                                id="data_inicio"
                                class="form-control @error('data_inicio') is-invalid @enderror"
                                value="{{ old('data_inicio') }}"
                                required
                            >

                            @error('data_inicio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- DATA FIM --}}
                        <div class="col-md-4">
                            <label for="data_fim" class="form-label">
                                Data de fim
                            </label>

                            <input
                                type="date"
                                name="data_fim"
                                id="data_fim"
                                class="form-control @error('data_fim') is-invalid @enderror"
                                value="{{ old('data_fim') }}"
                                required
                            >

                            @error('data_fim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- ESTADO --}}
                        <div class="col-md-4">
                            <label for="estado" class="form-label">
                                Estado
                            </label>

                            <select
                                name="estado"
                                id="estado"
                                class="form-select @error('estado') is-invalid @enderror"
                                required
                            >
                                <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>
                                    Ativo
                                </option>

                                <option value="0" {{ old('estado') === '0' ? 'selected' : '' }}>
                                    Inativo
                                </option>
                            </select>

                            @error('estado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- BOTÕES --}}
                    <div class="form-footer">

                        <a
                            href="{{ route('cursos.index') }}"
                            class="btn-cancelar"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn-registar"
                        >
                            Registar curso
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script>

    // Pré-visualização da capa
    (function () {
        const input = document.getElementById('capa');
        const preview = document.getElementById('capa-preview');
        const placeholder = document.getElementById('capa-placeholder');

        input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    })();

    // Toggle "gratuito" esconde/desativa o campo de preço
    (function () {
        const checkbox = document.getElementById('gratis');
        const wrapper = document.getElementById('preco-wrapper');
        const preco = document.getElementById('preco');

        function atualizar() {
            if (checkbox.checked) {
                wrapper.classList.add('disabled');
                preco.removeAttribute('required');
                preco.value = 0;
            } else {
                wrapper.classList.remove('disabled');
                preco.setAttribute('required', 'required');
            }
        }

        checkbox.addEventListener('change', atualizar);
        atualizar();
    })();

    // Lista os ficheiros escolhidos em "Materiais e videoaula"
    (function () {
        const input = document.getElementById('documentos');
        const lista = document.getElementById('lista-materiais');

        input.addEventListener('change', function () {
            lista.innerHTML = '';

            Array.from(this.files).forEach(function (file) {
                const item = document.createElement('div');
                item.className = 'material-item';
                item.textContent = file.name;

                lista.appendChild(item);
            });
        });
    })();

</script>

@endsection
