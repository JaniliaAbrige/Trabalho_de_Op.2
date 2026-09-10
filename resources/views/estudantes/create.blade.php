@extends('layouts.app')

@section('title', 'Registar Estudante')

@section('content')

<style>
    :root {
        --azul-principal: #003B73;
        --laranja: #F57C00;
        --fundo: #f8fafc;
        --borda: #e5e7eb;
        --texto: #1f2937;
        --cinza: #6b7280;
    }

    .student-page {
        background: var(--fundo);
        min-height: calc(100vh - 70px);
        padding: 35px 0 50px;
    }

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
        min-height: 105px;
        resize: vertical;
    }

    .input-group-text {
        background: #f8fafc;
        border-color: #d9dee5;
        color: var(--cinza);
    }

    .info-box {
        background: #f5f9fc;
        border: 1px solid #dbe8f2;
        border-radius: 10px;
        padding: 13px 15px;
        color: #536579;
        font-size: 13px;
        margin-bottom: 25px;
    }

    .info-box i {
        color: var(--azul-principal);
        margin-right: 7px;
    }

    .password-note {
        font-size: 12px;
        color: var(--cinza);
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 25px;
        margin-top: 10px;
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

    .invalid-feedback {
        font-size: 12px;
    }

    @media (max-width: 767px) {
        .student-page {
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

<div class="student-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">

            <div class="page-title-area">

                <div class="title-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div>
                    <h1 class="page-title">Registar Estudante</h1>

                    <p class="page-subtitle">
                        Cadastre os dados pessoais e académicos do estudante.
                    </p>
                </div>

            </div>

            <a href="{{ route('estudantes.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>

        </div>


        {{-- FORMULÁRIO --}}
        <div class="form-card">

            <div class="form-card-header">
                <h5>Dados do estudante</h5>

                <p>
                    Preencha os campos abaixo para criar o registo do estudante.
                </p>
            </div>

            <div class="form-card-body">

                <div class="info-box">
                    <i class="fas fa-circle-info"></i>

                    O número do estudante será gerado automaticamente pelo sistema
                    no formato <strong>ANO + sequência</strong>, por exemplo:
                    <strong>202601</strong>.
                </div>


                <form action="{{ route('estudantes.store') }}" method="POST">

                    @csrf


                    {{-- ========================= --}}
                    {{-- DADOS PESSOAIS --}}
                    {{-- ========================= --}}

                    <div class="section-title">
                        <i class="fas fa-user"></i>
                        Dados pessoais
                    </div>

                    <div class="row g-4">

                        {{-- NOME --}}
                        <div class="col-md-6">

                            <label for="nome" class="form-label">
                                Nome
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nome"
                                id="nome"
                                value="{{ old('nome') }}"
                                class="form-control @error('nome') is-invalid @enderror"
                                placeholder="Digite o nome do estudante"
                                required
                            >

                            @error('nome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="col-md-6">

                            <label for="email" class="form-label">
                                Email
                                <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="exemplo@email.com"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- TELEFONE --}}
                        <div class="col-md-6">

                            <label for="telefone" class="form-label">
                                Telefone
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="telefone"
                                id="telefone"
                                value="{{ old('telefone') }}"
                                class="form-control @error('telefone') is-invalid @enderror"
                                placeholder="Ex.: 84 123 4567"
                                required
                            >

                            @error('telefone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DATA NASCIMENTO --}}
                        <div class="col-md-3">

                            <label for="data_nascimento" class="form-label">
                                Data de nascimento
                                <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                name="data_nascimento"
                                id="data_nascimento"
                                value="{{ old('data_nascimento') }}"
                                class="form-control @error('data_nascimento') is-invalid @enderror"
                                required
                            >

                            @error('data_nascimento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- SEXO --}}
                        <div class="col-md-3">

                            <label for="sexo" class="form-label">
                                Sexo
                                <span class="required">*</span>
                            </label>

                            <select
                                name="sexo"
                                id="sexo"
                                class="form-select @error('sexo') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione</option>

                                <option
                                    value="Masculino"
                                    {{ old('sexo') == 'Masculino' ? 'selected' : '' }}
                                >
                                    Masculino
                                </option>

                                <option
                                    value="Feminino"
                                    {{ old('sexo') == 'Feminino' ? 'selected' : '' }}
                                >
                                    Feminino
                                </option>

                            </select>

                            @error('sexo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DOCUMENTO --}}
                        <div class="col-md-6">

                            <label for="documento_identificacao" class="form-label">
                                Documento de identificação
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="documento_identificacao"
                                id="documento_identificacao"
                                value="{{ old('documento_identificacao') }}"
                                class="form-control @error('documento_identificacao') is-invalid @enderror"
                                placeholder="BI, Passaporte, etc."
                                required
                            >

                            @error('documento_identificacao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- NACIONALIDADE --}}
                        <div class="col-md-6">

                            <label for="nacionalidade" class="form-label">
                                Nacionalidade
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nacionalidade"
                                id="nacionalidade"
                                value="{{ old('nacionalidade', 'Moçambicana') }}"
                                class="form-control @error('nacionalidade') is-invalid @enderror"
                                placeholder="Ex.: Moçambicana"
                                required
                            >

                            @error('nacionalidade')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- LOCALIZAÇÃO --}}
                    {{-- ========================= --}}

                    <div class="section-title mt-5">
                        <i class="fas fa-location-dot"></i>
                        Localização
                    </div>

                    <div class="row g-4">

                        {{-- PROVÍNCIA --}}
                        <div class="col-md-6">

                            <label for="provincia" class="form-label">
                                Província
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="provincia"
                                id="provincia"
                                value="{{ old('provincia') }}"
                                class="form-control @error('provincia') is-invalid @enderror"
                                placeholder="Ex.: Maputo"
                                required
                            >

                            @error('provincia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DISTRITO --}}
                        <div class="col-md-6">

                            <label for="distrito" class="form-label">
                                Distrito
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="distrito"
                                id="distrito"
                                value="{{ old('distrito') }}"
                                class="form-control @error('distrito') is-invalid @enderror"
                                placeholder="Ex.: KaMpfumo"
                                required
                            >

                            @error('distrito')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- ENDEREÇO --}}
                        <div class="col-12">

                            <label for="endereco" class="form-label">
                                Endereço
                            </label>

                            <textarea
                                name="endereco"
                                id="endereco"
                                class="form-control @error('endereco') is-invalid @enderror"
                                placeholder="Digite o endereço completo"
                            >{{ old('endereco') }}</textarea>

                            @error('endereco')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- DADOS ACADÉMICOS --}}
                    {{-- ========================= --}}

                    <div class="section-title mt-5">
                        <i class="fas fa-graduation-cap"></i>
                        Dados académicos
                    </div>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label for="nivel_academico" class="form-label">
                                Nível académico
                                <span class="required">*</span>
                            </label>

                            <select
                                name="nivel_academico"
                                id="nivel_academico"
                                class="form-select @error('nivel_academico') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Selecione o nível académico
                                </option>

                                <option
                                    value="Ensino Básico"
                                    {{ old('nivel_academico') == 'Ensino Básico' ? 'selected' : '' }}
                                >
                                    Ensino Básico
                                </option>

                                <option
                                    value="Ensino Secundário"
                                    {{ old('nivel_academico') == 'Ensino Secundário' ? 'selected' : '' }}
                                >
                                    Ensino Secundário
                                </option>

                                <option
                                    value="Técnico Profissional"
                                    {{ old('nivel_academico') == 'Técnico Profissional' ? 'selected' : '' }}
                                >
                                    Técnico Profissional
                                </option>

                                <option
                                    value="Licenciatura"
                                    {{ old('nivel_academico') == 'Licenciatura' ? 'selected' : '' }}
                                >
                                    Licenciatura
                                </option>

                                <option
                                    value="Mestrado"
                                    {{ old('nivel_academico') == 'Mestrado' ? 'selected' : '' }}
                                >
                                    Mestrado
                                </option>

                                <option
                                    value="Doutoramento"
                                    {{ old('nivel_academico') == 'Doutoramento' ? 'selected' : '' }}
                                >
                                    Doutoramento
                                </option>

                                <option
                                    value="Outro"
                                    {{ old('nivel_academico') == 'Outro' ? 'selected' : '' }}
                                >
                                    Outro
                                </option>

                            </select>

                            @error('nivel_academico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- ACESSO AO SISTEMA --}}
                    {{-- ========================= --}}

                    <div class="section-title mt-5">
                        <i class="fas fa-lock"></i>
                        Acesso ao sistema
                    </div>

                    <div class="info-box">
                        <i class="fas fa-circle-info"></i>

                        Estes dados serão utilizados pelo estudante para
                        iniciar sessão no sistema.
                    </div>

                    <div class="row g-4">

                        {{-- SENHA --}}
                        <div class="col-md-6">

                            <label for="senha" class="form-label">
                                Senha
                                <span class="required">*</span>
                            </label>

                            <input
                                type="password"
                                name="senha"
                                id="senha"
                                class="form-control @error('senha') is-invalid @enderror"
                                placeholder="Digite a senha"
                                required
                            >

                            <div class="password-note">
                                A senha deve ter pelo menos 6 caracteres.
                            </div>

                            @error('senha')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- CONFIRMAR SENHA --}}
                        <div class="col-md-6">

                            <label for="senha_confirmation" class="form-label">
                                Confirmar senha
                                <span class="required">*</span>
                            </label>

                            <input
                                type="password"
                                name="senha_confirmation"
                                id="senha_confirmation"
                                class="form-control"
                                placeholder="Repita a senha"
                                required
                            >

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- BOTÕES --}}
                    {{-- ========================= --}}

                    <div class="form-actions">

                        <a
                            href="{{ route('estudantes.index') }}"
                            class="btn-cancel"
                        >
                            <i class="fas fa-xmark"></i>
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            <i class="fas fa-user-plus"></i>
                            Registar estudante
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

