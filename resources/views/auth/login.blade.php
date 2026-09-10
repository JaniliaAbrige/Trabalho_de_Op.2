<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Entrar | SIGEC</title>


    {{-- BOOTSTRAP --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- FONT AWESOME --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    {{-- FONTE --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        :root {
            --azul: #003B73;
            --laranja: #F57C00;
            --branco: #FFFFFF;
        }


        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            background: #FFFFFF;

            color: var(--azul);

        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .login-page {

            min-height: 100vh;

            display: flex;

        }


        /* =====================================================
           LADO ESQUERDO
        ===================================================== */

        .login-brand {

            width: 48%;

            min-height: 100vh;

            background: var(--azul);

            color: var(--branco);

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 60px;

            position: relative;

            overflow: hidden;

        }


        .brand-content {

            max-width: 470px;

            position: relative;

            z-index: 2;

        }


        /* Elementos decorativos */

        .decor-circle {

            position: absolute;

            border-radius: 50%;

            border: 2px solid rgba(255,255,255,0.10);

        }


        .circle-one {

            width: 330px;

            height: 330px;

            right: -150px;

            top: -100px;

        }


        .circle-two {

            width: 450px;

            height: 450px;

            left: -260px;

            bottom: -220px;

        }


        .orange-line {

            width: 65px;

            height: 5px;

            background: var(--laranja);

            border-radius: 20px;

            margin-bottom: 25px;

        }


        /* =====================================================
           LOGO
        ===================================================== */

        .brand-logo {

            display: flex;

            align-items: center;

            gap: 14px;

            margin-bottom: 45px;

        }


        .brand-logo-icon {

            width: 58px;

            height: 58px;

            background: var(--branco);

            color: var(--azul);

            border-radius: 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 27px;

        }


        .brand-logo-text {

            display: flex;

            flex-direction: column;

        }


        .brand-logo-text strong {

            font-size: 29px;

            font-weight: 800;

            line-height: 1;

        }


        .brand-logo-text span {

            font-size: 11px;

            opacity: .75;

            margin-top: 6px;

        }


        /* =====================================================
           TEXTO
        ===================================================== */

        .brand-content h1 {

            font-size: 43px;

            line-height: 1.12;

            font-weight: 800;

            margin-bottom: 20px;

        }


        .brand-content h1 span {

            color: var(--laranja);

        }


        .brand-description {

            font-size: 15px;

            line-height: 1.8;

            opacity: .82;

            margin-bottom: 35px;

        }


        /* =====================================================
           BENEFÍCIOS
        ===================================================== */

        .brand-features {

            display: flex;

            flex-direction: column;

            gap: 16px;

        }


        .brand-feature {

            display: flex;

            align-items: center;

            gap: 12px;

            font-size: 13px;

        }


        .feature-icon {

            width: 36px;

            height: 36px;

            flex-shrink: 0;

            border-radius: 9px;

            background: var(--laranja);

            color: var(--branco);

            display: flex;

            align-items: center;

            justify-content: center;

        }


        /* =====================================================
           LADO DIREITO
        ===================================================== */

        .login-form-area {

            width: 52%;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px;

            background: var(--branco);

        }


        .login-card {

            width: 100%;

            max-width: 430px;

        }


        /* =====================================================
           CABEÇALHO
        ===================================================== */

        .login-header {

            margin-bottom: 30px;

        }


        .login-header h2 {

            color: var(--azul);

            font-size: 30px;

            font-weight: 800;

            margin-bottom: 8px;

        }


        .login-header p {

            color: var(--azul);

            opacity: .65;

            font-size: 13px;

            margin: 0;

        }


        /* =====================================================
           ALERTA
        ===================================================== */

        .login-alert {

            border: 1px solid rgba(245,124,0,.25);

            border-left: 4px solid var(--laranja);

            background: var(--branco);

            color: var(--azul);

            border-radius: 8px;

            padding: 12px 14px;

            font-size: 12px;

            margin-bottom: 20px;

        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {

            margin-bottom: 20px;

        }


        .form-label {

            color: var(--azul);

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;

        }


        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: var(--azul);

            opacity: .7;

            font-size: 14px;

            z-index: 3;

        }


        .form-control-login {

            width: 100%;

            height: 50px;

            border: 1px solid rgba(0,59,115,.18);

            border-radius: 9px;

            padding: 0 45px;

            color: var(--azul);

            background: var(--branco);

            font-size: 13px;

            outline: none;

            transition: all .2s ease;

        }


        .form-control-login:focus {

            border-color: var(--azul);

            box-shadow: 0 0 0 3px rgba(0,59,115,.08);

        }


        .form-control-login::placeholder {

            color: var(--azul);

            opacity: .4;

        }


        /* =====================================================
           MOSTRAR SENHA
        ===================================================== */

        .password-toggle {

            position: absolute;

            right: 14px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: var(--azul);

            opacity: .6;

            cursor: pointer;

            z-index: 3;

        }


        .password-toggle:hover {

            color: var(--laranja);

            opacity: 1;

        }


        /* =====================================================
           OPÇÕES
        ===================================================== */

        .login-options {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }


        .remember-option {

            display: flex;

            align-items: center;

            gap: 7px;

            color: var(--azul);

            font-size: 12px;

        }


        .remember-option input {

            accent-color: var(--laranja);

        }


        .forgot-password {

            color: var(--laranja);

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

        }


        .forgot-password:hover {

            color: var(--azul);

        }


        /* =====================================================
           BOTÃO LOGIN
        ===================================================== */

        .btn-login {

            width: 100%;

            height: 50px;

            border: none;

            border-radius: 9px;

            background: var(--azul);

            color: var(--branco);

            font-size: 14px;

            font-weight: 700;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            cursor: pointer;

            transition: all .2s ease;

        }


        .btn-login:hover {

            background: var(--laranja);

            color: var(--branco);

            transform: translateY(-1px);

        }


        /* =====================================================
           DIVISOR
        ===================================================== */

        .login-divider {

            display: flex;

            align-items: center;

            gap: 12px;

            margin: 27px 0;

            color: var(--azul);

            opacity: .35;

            font-size: 10px;

        }


        .login-divider::before,
        .login-divider::after {

            content: "";

            height: 1px;

            flex: 1;

            background: rgba(0,59,115,.15);

        }


        /* =====================================================
           ACESSO ESTUDANTE
        ===================================================== */

        .student-info {

            border: 1px solid rgba(0,59,115,.10);

            border-radius: 10px;

            padding: 15px;

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .student-info-icon {

            width: 38px;

            height: 38px;

            border-radius: 9px;

            background: var(--laranja);

            color: var(--branco);

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .student-info strong {

            display: block;

            color: var(--azul);

            font-size: 12px;

            margin-bottom: 3px;

        }


        .student-info span {

            color: var(--azul);

            opacity: .6;

            font-size: 10px;

            line-height: 1.4;

        }


        /* =====================================================
           FOOTER LOGIN
        ===================================================== */

        .login-footer {

            text-align: center;

            margin-top: 30px;

            color: var(--azul);

            opacity: .5;

            font-size: 10px;

        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 991.98px) {

            .login-brand {

                width: 42%;

                padding: 35px;

            }


            .login-form-area {

                width: 58%;

            }


            .brand-content h1 {

                font-size: 34px;

            }

        }


        @media (max-width: 767.98px) {

            .login-page {

                display: block;

            }


            .login-brand {

                width: 100%;

                min-height: auto;

                padding: 30px 25px;

            }


            .brand-logo {

                margin-bottom: 30px;

            }


            .brand-content h1 {

                font-size: 31px;

            }


            .brand-description {

                font-size: 13px;

                margin-bottom: 25px;

            }


            .brand-features {

                display: none;

            }


            .login-form-area {

                width: 100%;

                min-height: auto;

                padding: 45px 25px;

            }


            .login-card {

                max-width: 100%;

            }

        }


    </style>

</head>


<body>

<div class="login-page">


    {{-- =====================================================
         LADO DA MARCA
    ====================================================== --}}

    <section class="login-brand">

        <div class="decor-circle circle-one"></div>
        <div class="decor-circle circle-two"></div>


        <div class="brand-content">


            {{-- LOGO --}}

            <div class="brand-logo">

                <div class="brand-logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <div class="brand-logo-text">

                    <strong>SIGEC</strong>

                    <span>
                        Sistema de Gestão de Cursos
                    </span>

                </div>

            </div>


            <div class="orange-line"></div>


            <h1>
                O seu percurso
                <span>académico</span>
                começa aqui.
            </h1>


            <p class="brand-description">

                Aceda à plataforma para acompanhar
                as suas inscrições, cursos e informações
                académicas de forma simples e segura.

            </p>


            <div class="brand-features">

                <div class="brand-feature">

                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <span>
                        Consulte os cursos disponíveis
                    </span>

                </div>


                <div class="brand-feature">

                    <div class="feature-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>

                    <span>
                        Acompanhe as suas inscrições
                    </span>

                </div>


                <div class="brand-feature">

                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>

                    <span>
                        Receba notificações importantes
                    </span>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         FORMULÁRIO
    ====================================================== --}}

    <section class="login-form-area">

        <div class="login-card">


            {{-- CABEÇALHO --}}

            <div class="login-header">

                <h2>
                    Bem-vindo de volta
                </h2>

                <p>
                    Entre na sua conta para continuar.
                </p>

            </div>



            {{-- ERROS --}}

            @if($errors->any())

                <div class="login-alert">

                    <i class="fas fa-circle-exclamation me-2"></i>

                    {{ $errors->first() }}

                </div>

            @endif



            {{-- SUCESSO --}}

            @if(session('success'))

                <div class="login-alert">

                    <i class="fas fa-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif



            {{-- FORMULÁRIO --}}

            <form method="POST"
                  action="{{ route('login.submit') }}">

                @csrf


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
                            class="form-control-login"
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
                            class="form-control-login"
                            placeholder="Digite a sua senha"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            title="Mostrar senha">

                            <i class="fas fa-eye"></i>

                        </button>

                    </div>

                </div>



                {{-- OPÇÕES --}}

                <div class="login-options">

                    <label class="remember-option">

                        <input
                            type="checkbox"
                            name="lembrar"
                            value="1"
                            {{ old('lembrar') ? 'checked' : '' }}
                        >

                        <span>
                            Lembrar-me
                        </span>

                    </label>


                    <a href="#"
                       class="forgot-password">

                        Esqueceu a senha?

                    </a>

                </div>



                {{-- BOTÃO --}}

                <button
                    type="submit"
                    class="btn-login">

                    <span>
                        Entrar na plataforma
                    </span>

                    <i class="fas fa-arrow-right"></i>

                </button>

            </form>



            <div class="login-divider">
                ACESSO À PLATAFORMA
            </div>



            {{-- INFORMAÇÃO --}}

            <div class="student-info">

                <div class="student-info-icon">

                    <i class="fas fa-user-graduate"></i>

                </div>

                <div>

                    <strong>
                        Área do Estudante
                    </strong>

                    <span>
                        Utilize as credenciais fornecidas
                        pela instituição para entrar.
                    </span>

                </div>

            </div>



            <div class="login-footer">

                © {{ date('Y') }} SIGEC · Sistema de Gestão de Cursos

            </div>

        </div>

    </section>

</div>



<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('senha');


    togglePassword.addEventListener('click', function () {

        const type =
            password.getAttribute('type') === 'password'
                ? 'text'
                : 'password';


        password.setAttribute('type', type);


        const icon =
            this.querySelector('i');


        icon.classList.toggle('fa-eye');

        icon.classList.toggle('fa-eye-slash');

    });

</script>

</body>
</html>