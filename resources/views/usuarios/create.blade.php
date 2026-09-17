@extends('layouts.app')

@section('title', 'Criar conta')

@section('content')

<style>
    .signup-page {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #edf5ff 0%, #f8f9ff 100%);
        padding: 40px 20px;
    }

    .signup-card {
        width: 100%;
        max-width: 700px;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }

    .signup-header {
        background: #003B73;
        color: #fff;
        padding: 26px 30px;
    }

    .signup-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .signup-header p {
        margin: 8px 0 0;
        color: rgba(255,255,255,0.8);
        font-size: 14px;
    }

    .signup-body {
        padding: 30px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 46px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 0 14px;
        font-size: 14px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: #003B73;
        box-shadow: 0 0 0 3px rgba(0, 59, 115, 0.12);
    }

    .alert {
        padding: 12px 14px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-danger {
        background: #fff2f2;
        border: 1px solid #f5c2c7;
        color: #842029;
    }

    .btn-submit {
        width: 100%;
        margin-top: 16px;
        border: none;
        background: #F57C00;
        color: #fff;
        padding: 14px 18px;
        border-radius: 10px;
        font-weight: 700;
        transition: 0.2s ease;
    }

    .btn-submit:hover {
        background: #e66f00;
    }

    .login-link {
        text-align: center;
        margin-top: 18px;
        font-size: 14px;
        color: #4b5563;
    }

    .login-link a {
        color: #003B73;
        font-weight: 600;
        text-decoration: none;
    }

    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .signup-body {
            padding: 20px;
        }
    }
</style>

<div class="signup-page">
    <div class="signup-card">
        <div class="signup-header">
            <h1>Criar conta</h1>
            <p>Preencha os dados para registar-se no sistema.</p>
        </div>

        <div class="signup-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('signup.submit') }}">
                @csrf

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="nome">Nome completo</label>
                        <input id="nome" type="text" name="nome" value="{{ old('nome') }}" class="form-control" placeholder="Digite o seu nome" required>
                    </div>

                    <div class="form-group full">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="exemplo@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="text" name="telefone" value="{{ old('telefone') }}" class="form-control" placeholder="(xx) xxxxx-xxxx">
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo de conta</label>
                        <select id="tipo" name="tipo" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="estudante" {{ old('tipo') === 'estudante' ? 'selected' : '' }}>Estudante</option>
                            <option value="docente" {{ old('tipo') === 'docente' ? 'selected' : '' }}>Docente</option>
                            <option value="admin" {{ old('tipo') === 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" class="form-control" placeholder="Mínimo 6 caracteres" required>
                    </div>

                    <div class="form-group">
                        <label for="senha_confirmation">Confirmar senha</label>
                        <input id="senha_confirmation" type="password" name="senha_confirmation" class="form-control" placeholder="Repita a senha" required>
                    </div>

                    <div class="form-group full">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" class="form-select" required>
                            <option value="ativo" {{ old('estado') === 'ativo' ? 'selected' : '' }}>Ativo</option>
                            <option value="inativo" {{ old('estado') === 'inativo' ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Criar conta</button>
            </form>

            <div class="login-link">
                Já tem conta? <a href="{{ route('login', ['tipo' => 'estudante']) }}">Entrar</a>
            </div>
        </div>
    </div>
</div>

@endsection
