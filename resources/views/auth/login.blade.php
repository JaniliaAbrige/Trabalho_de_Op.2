<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Entrar | SIGEC</title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }


        .login-page {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           LADO ESQUERDO
        ========================= */

        .login-brand {
            width: 45%;
            background: #003B73;
            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 60px;

            position: relative;
            overflow: hidden;
        }


        .login-brand::after {
            content: "";

            position: absolute;

            width: 320px;
            height: 320px;

            border: 55px solid rgba(245, 124, 0, .15);

            border-radius: 50%;

            right: -150px;
            bottom: -150px;
        }


        .brand-content {
            max-width: 430px;
            position: relative;
            z-index: 2;
        }


        .brand-logo {
            width: 70px;
            height: 70px;

            background: rgba(255, 255, 255, .1);

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 25px;

            font-size: 30px;
            color: #F57C00;
        }


        .brand-content h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 15px;
        }


        .brand-content h1 span {
            color: #F57C00;
        }


        .brand-content p {
            color: rgba(255, 255, 255, .82);
            line-height: 1.7;
            font-size: 15px;
        }


        /* =========================
           LADO DIREITO
        ========================= */

        .login-area {
            width: 55%;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }


        .login-box {
            width: 100%;
            max-width: 430px;
        }


        .login-header {
            margin-bottom: 30px;
        }


        .login-header h2 {
            color: #003B73;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }


        .login-header p {
            color: #6b7280;
            font-size: 14px;
            margin: 0;
        }


        /* =========================
           PERFIL
        ========================= */

        .selected-profile {
            display: flex;
            align-items: center;
            gap: 12px;

            background: #f3f7fb;

            border: 1px solid #dbe5ef;

            border-radius: 8px;

            padding: 12px 14px;

            margin-bottom: 25px;
        }


        .profile-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #003B73;
            color: #fff;

            border-radius: 7px;

            font-size: 16px;
        }


        .profile-text small {
            display: block;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 2px;
        }


        .profile-text strong {
            color: #003B73;
            font-size: 14px;
        }


        .change-profile {
            margin-left: auto;

            color: #003B73;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;
        }


        .change-profile:hover {
            color: #F57C00;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }


        .form-label {
            color: #374151;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #9ca3af;

            font-size: 14px;

            pointer-events: none;
        }


        .form-control {
            height: 48px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            padding-left: 42px;

            font-size: 14px;

            box-shadow: none;
        }


        .form-control:focus {
            border-color: #003B73;

            box-shadow: 0 0 0 3px rgba(0, 59, 115, .08);
        }


        .password-toggle {
            position: absolute;

            right: 14px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: #9ca3af;

            cursor: pointer;
        }


        /* =========================
           OPTIONS
        ========================= */

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }


        .remember {
            display: flex;
            align-items: center;
            gap: 7px;

            color: #6b7280;

            font-size: 12px;
        }


        .remember input {
            accent-color: #003B73;
        }


        /* =========================
           BOTÃO
        ========================= */

        .btn-login {
            width: 100%;

            height: 48px;

            border: none;

            border-radius: 7px;

            background: #003B73;

            color: #fff;

            font-size: 14px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 10px;

            transition: .2s;
        }


        .btn-login:hover {
            background: #002b54;
        }


        /* =========================
           ALERTA
        ========================= */

        .login-alert {
            background: #fff3e8;

            border: 1px solid #ffd7b5;

            color: #b45309;

            padding: 12px 14px;

            border-radius: 7px;

            font-size: 13px;

            margin-bottom: 20px;
        }


        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            text-align: center;

            margin-top: 25px;

            color: #9ca3af;

            font-size: 11px;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 850px) {

            .login-page {
                display: block;
            }

            .login-brand {
                width: 100%;
                min-height: 260px;
                padding: 40px 30px;
            }

            .login-brand .brand-content {
                max-width: 600px;
            }

            .brand-content h1 {
                font-size: 32px;
            }

            .login-area {
                width: 100%;
                padding: 40px 25px;
            }
        }


        @media (max-width: 500px) {

            .login-brand {
                min-height: 230px;
                padding: 30px 20px;
            }

            .login-area {
                padding: 30px 20px;
            }

            .brand-content h1 {
                font-size: 28px;
            }

            .login-header h2 {
                font-size: 24px;
            }
        }

    </style>

</head>


<body>


<div class="login-page">


    {{-- =====================================================
         LADO ESQUERDO
    ====================================================== --}}

    <div class="login-brand">

        <div class="brand-content">

            <div class="brand-logo">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <h1>
                Bem-vindo ao
                <span>SIGEC</span>
            </h1>

            <p>
                Sistema Integrado de Gestão de Cursos.
                Aceda à plataforma para gerir ou consultar
                informações académicas de acordo com o seu perfil.
            </p>

        </div>

    </div>


    {{-- =====================================================
         LADO DIREITO
    ====================================================== --}}

    <div class="login-area">

        <div class="login-box">


            {{-- CABEÇALHO --}}

            <div class="login-header">

                <h2>
                    Entrar no sistema
                </h2>

                <p>
                    Utilize as suas credenciais para continuar.
                </p>

            </div>


            {{-- PERFIL SELECIONADO --}}

            @php

                $iconesTipo = [

                    'admin' => 'fa-user-shield',

                    'docente' => 'fa-chalkboard-teacher',

                    'estudante' => 'fa-user-graduate',

                ];

            @endphp


            <div class="selected-profile">

                <div class="profile-icon">

                    <i class="fas {{ $iconesTipo[$tipo] }}"></i>

                </div>


                <div class="profile-text">

                    <small>
                        Perfil selecionado
                    </small>

                    <strong>
                        {{ $nomeTipo }}
                    </strong>

                </div>


                <a href="{{ route('inicio') }}"
                   class="change-profile">

                    Alterar

                </a>

            </div>


            {{-- ERROS --}}

            @if($errors->any())

                <div class="login-alert">

                    <i class="fas fa-circle-exclamation me-2"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- MENSAGEM DE SUCESSO --}}

            @if(session('success'))

                <div class="login-alert">

                    <i class="fas fa-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =================================================
                 FORMULÁRIO
            ================================================== --}}

            <form method="POST"
                  action="{{ route('login.submit') }}">

                @csrf


                {{-- PERFIL --}}
                <input type="hidden"
                       name="tipo"
                       value="{{ $tipo }}">


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email"
                           class="form-label">

                        Email

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Digite o seu email"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>

                </div>


                {{-- SENHA --}}

                <div class="form-group">

                    <label for="senha"
                           class="form-label">

                        Senha

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>


                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            class="form-control"
                            placeholder="Digite a sua senha"
                            autocomplete="current-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword">

                            <i class="fas fa-eye"></i>

                        </button>

                    </div>

                </div>


                {{-- OPÇÕES --}}

                <div class="login-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="lembrar"
                            value="1"
                        >

                        Lembrar-me

                    </label>

                </div>


                {{-- BOTÃO --}}

                <button
                    type="submit"
                    class="btn-login">

                    Entrar

                    <i class="fas fa-arrow-right"></i>

                </button>

            </form>


            {{-- FOOTER --}}

            <div class="login-footer">

                SIGEC — Sistema Integrado de Gestão de Cursos

            </div>


        </div>

    </div>

</div>


{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('senha');


    if (togglePassword && password) {

        togglePassword.addEventListener('click', function () {

            const type =
                password.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';

            password.setAttribute('type', type);


            const icon =
                this.querySelector('i');


            if (type === 'password') {

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            } else {

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            }

        });

    }

</script>


</body>

</html>