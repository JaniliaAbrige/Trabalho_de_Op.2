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

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
        }


        :root {
            --sg-primary: #6C3CE9;
            --sg-primary-dark: #4C1FB8;
            --sg-primary-light: #F1ECFE;
            --sg-text: #1F2333;
            --sg-muted: #6b7280;
        }


        /* =========================
           FUNDO LILÁS DA PÁGINA
        ========================= */

        .login-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 60px 30px;

            background: linear-gradient(160deg, #8B5CF6 0%, #6C3CE9 55%, #5B21B6 100%);

            position: relative;
            overflow: hidden;
        }

        /* bolha grande, topo-esquerda */
        .login-page::before {
            content: "";
            position: absolute;

            width: 480px;
            height: 480px;

            top: -160px;
            left: -160px;

            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.35), rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        /* bolha escura, topo-direita */
        .login-page::after {
            content: "";
            position: absolute;

            width: 260px;
            height: 260px;

            top: 20px;
            right: 8%;

            background: radial-gradient(circle at 40% 40%, #2A1050, rgba(42,16,80,0));
            border-radius: 50%;
        }



        /* =========================
           CARTÃO DE LOGIN
        ========================= */

        .login-card {
            position: relative;
            z-index: 1;

            width: 100%;
            max-width: 1080px;

            min-height: 770px;

            display: flex;

            background: #fff;
            border-radius: 22px;
            overflow: hidden;

            box-shadow: 0 40px 80px rgba(30, 10, 70, .35);
        }


        /* ---- lado esquerdo: foto com borda ondulada em CSS puro ---- */

        .login-photo {
            flex: 0 0 54%;
            position: relative;

            background-image: url('{{ asset('imgs/login-foto.jpg') }}');
            background-size: cover;
            background-position: center;

            /* onda desenhada com SVG clip-path, sem depender de imagem pronta */
            clip-path: url(#loginWaveClip);
        }

        .login-photo::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(31,10,70,0) 40%, rgba(31,10,70,.55) 100%);
        }

        .login-photo-text {
            position: absolute;
            left: 8%;
            bottom: 12%;
            right: 20%;
            z-index: 1;

            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 26px;
            font-weight: 700;
            line-height: 1.25;
        }


        /* ---- lado direito: form ---- */

        .login-form-panel {
            flex: 1;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 60px;
        }

        .login-box {
            width: 130%;
            max-width: 360px;
        }


        .login-header {
            margin-bottom: 22px;
        }

        .login-header h2 {
            font-family: 'Poppins', sans-serif;
            color: var(--sg-text);
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-header p {
            color: var(--sg-muted);
            font-size: 13px;
            margin: 0;
        }


        /* =========================
           PERFIL
        ========================= */

        .selected-profile {
            display: flex;
            align-items: center;
            gap: 10px;

            background: var(--sg-primary-light);

            border: 1px solid #E4D9FC;

            border-radius: 8px;

            padding: 10px 12px;

            margin-bottom: 20px;
        }


        .profile-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--sg-primary);
            color: #fff;

            border-radius: 7px;

            font-size: 14px;

            flex-shrink: 0;
        }


        .profile-text small {
            display: block;
            color: var(--sg-muted);
            font-size: 10px;
            margin-bottom: 2px;
        }


        .profile-text strong {
            color: var(--sg-text);
            font-size: 13px;
        }


        .change-profile {
            margin-left: auto;

            color: var(--sg-primary);

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;
        }


        .change-profile:hover {
            color: var(--sg-primary-dark);
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 16px;
        }


        .form-label {
            color: #374151;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            color: #9ca3af;

            font-size: 13px;

            pointer-events: none;
        }


        .form-control {
            height: 44px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            padding-left: 38px;

            font-size: 13px;

            box-shadow: none;
        }


        .form-control:focus {
            border-color: var(--sg-primary);

            box-shadow: 0 0 0 3px rgba(108, 60, 233, .12);
        }


        .password-toggle {
            position: absolute;

            right: 13px;
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

            margin-bottom: 20px;
        }


        .remember {
            display: flex;
            align-items: center;
            gap: 6px;

            color: var(--sg-muted);

            font-size: 11px;
        }


        .remember input {
            accent-color: var(--sg-primary);
        }


        /* =========================
           BOTÃO
        ========================= */

        .btn-login {
            width: 100%;

            height: 44px;

            border: none;

            border-radius: 7px;

            background: var(--sg-primary);

            color: #fff;

            font-size: 13px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            transition: .2s;
        }


        .btn-login:hover {
            background: var(--sg-primary-dark);
        }


        /* =========================
           ALERTA
        ========================= */

        .login-alert {
            background: #fff3e8;

            border: 1px solid #ffd7b5;

            color: #b45309;

            padding: 10px 12px;

            border-radius: 7px;

            font-size: 12px;

            margin-bottom: 16px;
        }


        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            text-align: center;

            margin-top: 18px;

            color: #9ca3af;

            font-size: 10px;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 850px) {

            .login-card {
                flex-direction: column;
                min-height: 0;
            }

            .login-photo {
                flex: 0 0 220px;
                clip-path: none;
            }

            .login-photo-text {
                right: 8%;
                font-size: 20px;
            }

            .login-form-panel {
                padding: 36px 28px;
            }
        }

        @media (max-width: 480px) {

            .login-page {
                padding: 0;
            }

            .login-card {
                border-radius: 0;
                min-height: 100vh;
            }
        }

    </style>

</head>


<body>


<div class="login-page">

    {{-- SVG só para definir o clip-path da onda — não é renderizado sozinho --}}
    <svg width="0" height="0" style="position:absolute;">
        <clipPath id="loginWaveClip" clipPathUnits="objectBoundingBox">
            <path d="M0,0
                     L0.82,0
                     C0.97,0.06 0.95,0.16 0.83,0.22
                     C0.71,0.28 0.72,0.38 0.87,0.46
                     C1.02,0.54 0.98,0.64 0.83,0.70
                     C0.68,0.76 0.70,0.87 0.88,0.93
                     C0.96,0.96 0.97,0.98 0.90,1
                     L0,1
                     Z" />
        </clipPath>
    </svg>


    <div class="login-card">

        <div class="login-photo">
            <div class="login-photo-text">
                O curso certo para impulsionar o seu futuro
            </div>
        </div>

        <div class="login-form-panel">

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

    @include('components.navbar')

</html>
