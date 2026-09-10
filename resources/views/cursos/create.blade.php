@extends('layouts.app')

@section('title', 'Registar Curso')

@section('content')

<style>
    .curso-page {
        background: #f8fafc;
        min-height: calc(100vh - 140px);
        padding: 35px 0 50px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        color: #003B73;
        font-size: 26px;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: #6b7280;
        margin: 6px 0 0;
        font-size: 14px;
    }

    .curso-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .card-title-area {
        padding: 20px 24px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .title-icon {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        background: #003B73;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .card-title-area h2 {
        color: #003B73;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .card-title-area p {
        color: #6b7280;
        font-size: 12px;
        margin: 3px 0 0;
    }

    .form-area {
        padding: 28px 24px;
    }

    .section-title {
        color: #003B73;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 18px;
        padding-bottom: 10px;
        border-bottom: 2px solid #F57C00;
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
        border-radius: 7px;
        min-height: 43px;
        font-size: 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #003B73;
        box-shadow: 0 0 0 3px rgba(0, 59, 115, .08);
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .required {
        color: #F57C00;
    }

    .form-text {
        font-size: 11px;
        color: #6b7280;
    }

    .invalid-feedback {
        font-size: 12px;
    }

    .form-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-cancelar {
        border: 1px solid #d1d5db;
        color: #374151;
        background: #fff;
        border-radius: 7px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-cancelar:hover {
        background: #f8fafc;
        color: #003B73;
    }

    .btn-registar {
        border: none;
        background: #F57C00;
        color: #fff;
        border-radius: 7px;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-registar:hover {
        background: #003B73;
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
                <div class="title-icon">
                    <i class="fas fa-book"></i>
                </div>

                <div>
                    <h2>Dados do curso</h2>
                    <p>Informações gerais e condições de inscrição</p>
                </div>
            </div>

            <div class="form-area">

                <form action="{{ route('cursos.store') }}" method="POST">

                    @csrf

                    {{-- INFORMAÇÕES PRINCIPAIS --}}
                    <div class="section-title">
                        Informações principais
                    </div>

                    <div class="row g-3">

                        {{-- CATEGORIA --}}
                        <div class="col-md-6">
                            <label for="categoria_id" class="form-label">
                                Categoria <span class="required">*</span>
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
                                Código do curso <span class="required">*</span>
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
                                Nome do curso <span class="required">*</span>
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
                                Duração <span class="required">*</span>
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
                                Carga horária <span class="required">*</span>
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
                                Modalidade <span class="required">*</span>
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

                    {{-- CONDIÇÕES --}}
                    <div class="section-title mt-4">
                        Condições de inscrição
                    </div>

                    <div class="row g-3">

                        {{-- REQUISITOS --}}
                        <div class="col-md-6">
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

                        {{-- PREÇO --}}
                        <div class="col-md-3">
                            <label for="preco" class="form-label">
                                Preço <span class="required">*</span>
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
                                    required
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
                        <div class="col-md-3">
                            <label for="vagas" class="form-label">
                                Vagas <span class="required">*</span>
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

                    {{-- PERÍODO --}}
                    <div class="section-title mt-4">
                        Período de realização
                    </div>

                    <div class="row g-3">

                        {{-- DATA INÍCIO --}}
                        <div class="col-md-4">
                            <label for="data_inicio" class="form-label">
                                Data de início <span class="required">*</span>
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
                                Data de fim <span class="required">*</span>
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
        Estado <span class="required">*</span>
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
                            <i class="fas fa-arrow-left me-1"></i>
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn-registar"
                        >
                            <i class="fas fa-save me-1"></i>
                            Registar curso
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection