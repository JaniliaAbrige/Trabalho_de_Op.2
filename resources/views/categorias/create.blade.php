@extends('layouts.app')

@section('title', 'Registar Categoria')

@section('content')

<style>
    .categoria-page {
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

    .categoria-card {
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
        min-height: 130px;
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
        display: inline-flex;
        align-items: center;
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
        .categoria-page {
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
            justify-content: center;
            text-align: center;
        }
    }
</style>

<div class="categoria-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">
            <h1>Registar categoria</h1>
            <p>Preencha os dados abaixo para adicionar uma nova categoria ao sistema.</p>
        </div>

        {{-- FORMULÁRIO --}}
        <div class="categoria-card">

            <div class="card-title-area">

                <div class="title-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <h2>Dados da categoria</h2>
                    <p>Informações gerais da categoria de cursos</p>
                </div>

            </div>

            <div class="form-area">

                <form action="{{ route('categorias.store') }}" method="POST">

                    @csrf

                    {{-- INFORMAÇÕES PRINCIPAIS --}}
                    <div class="section-title">
                        Informações principais
                    </div>

                    <div class="row g-3">

                        {{-- NOME --}}
                        <div class="col-md-8">

                            <label for="nome" class="form-label">
                                Nome da categoria <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nome"
                                id="nome"
                                class="form-control @error('nome') is-invalid @enderror"
                                value="{{ old('nome') }}"
                                placeholder="Ex.: Informática e Tecnologia"
                                maxlength="255"
                                required
                            >

                            @error('nome')
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
    <option value="1"
        {{ old('estado', '1') == '1' ? 'selected' : '' }}>
        Ativo
    </option>

    <option value="0"
        {{ old('estado') == '0' ? 'selected' : '' }}>
        Inativo
    </option>
</select>

                            @error('estado')
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
                                placeholder="Descreva brevemente o tipo de cursos que pertencem a esta categoria..."
                                maxlength="1000"
                            >{{ old('descricao') }}</textarea>

                            <div class="form-text mt-1">
                                Descreva de forma breve a finalidade desta categoria.
                            </div>

                            @error('descricao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- BOTÕES --}}
                    <div class="form-footer">

                        <a
                            href="{{ route('categorias.index') }}"
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
                            Registar categoria
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection