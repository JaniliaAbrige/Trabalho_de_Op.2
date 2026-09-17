<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Criar conta | SIGEC</title>


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

        .login-page::before {
            content: "";
            position: absolute;

            width: 480px;
            height: 480px;

            top: -180px;
            left: -140px;

            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.35), rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }




        /* =========================
           CARTÃO DE REGISTO
        ========================= */

        .login-card {
            position: relative;
            z-index: 1;

            width: 100%;
            max-width: 970px;

            min-height: 640px;

            background: #fff;
            border-radius: 26px;
            overflow: hidden;

            box-shadow: 0 40px 80px rgba(30, 10, 70, .35);
        }


        /* ---- foto: mancha orgânica diagonal, recortada só em CSS ---- */

        .login-photo {
            position: absolute;
            inset: 0;

            background-image: url('{{ asset('imgs/login-foto.jpg') }}');
            background-size: cover;
            background-position: center;

            clip-path: url(#signupBlobClip);
        }

        .login-photo::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(200deg, rgba(31,10,70,0) 35%, rgba(31,10,70,.6) 100%);
        }

        .login-photo-text {
            position: absolute;
            right: 6%;
            bottom: 8%;
            left: 46%;
            z-index: 1;

            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 26px;
            font-weight: 700;
            line-height: 1.3;
            text-align: right;
        }


        /* ---- decoração de espiral, acima do título ---- */

        .login-swirl {
            width: 70px;
            height: 70px;
            margin-bottom: 6px;
        }


        /* ---- painel do formulário ---- */

        .login-form-panel {
            position: relative;
            z-index: 1;

            max-width: 60%;

            padding: 46px 20px 40px 56px;
        }

        .login-header {
            margin-bottom: 26px;
        }

        .login-header h2 {
            font-family: 'Poppins', sans-serif;
            color: var(--sg-text);
            font-size: 30px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -.3px;
        }

        .login-header h2 .accent {
            color: var(--sg-primary);
        }


        /* =========================
           FORM — estilo underline
        ========================= */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            color: var(--sg-muted);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            border: none;
            border-bottom: 1px solid #d8d5e2;
            border-radius: 0;
            padding: 6px 2px 10px;
            font-size: 14px;
            color: var(--sg-text);
            background: transparent;
        }

        .form-control::placeholder {
            color: #b9b6c6;
        }

        .form-control:focus {
            outline: none;
            border-bottom-color: var(--sg-primary);
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='10' height='6'><path d='M0 0 L5 6 L10 0' fill='none' stroke='%239ca3af' stroke-width='1.4'/></svg>");
            background-repeat: no-repeat;
            background-position: right 2px center;
            padding-right: 18px;
        }

        .password-toggle {
            position: absolute;
            right: 2px;
            bottom: 10px;

            border: none;
            background: transparent;
            color: #9ca3af;
            cursor: pointer;
            font-size: 13px;
        }

        .field-error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 5px;
        }


        /* =========================
           BOTÕES
        ========================= */

        .btn-login {
            width: 100%;
            max-width: 300px;

            height: 46px;

            border: none;
            border-radius: 8px;

            background: var(--sg-primary);
            color: #fff;

            font-size: 14px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;
            transition: .2s;

            margin-bottom: 14px;
        }

        .btn-login:hover {
            background: var(--sg-primary-dark);
        }

        .divider-or {
            text-align: center;
            color: var(--sg-muted);
            font-size: 12px;
            max-width: 300px;
            margin-bottom: 14px;
        }

        .btn-google {
            width: 100%;
            max-width: 300px;

            height: 46px;

            border: 1px solid #e2e0ea;
            border-radius: 8px;

            background: #fff;
            color: var(--sg-text);

            font-size: 13px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            cursor: pointer;
            text-decoration: none;

            margin-bottom: 18px;
        }

        .btn-google img {
            width: 16px;
            height: 16px;
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
            margin-bottom: 18px;
            max-width: 300px;
        }


        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            font-size: 12px;
            color: var(--sg-muted);
        }

        .login-footer a {
            color: var(--sg-primary);
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            color: var(--sg-primary-dark);
        }

        .login-menu-icon {
            position: absolute;
            left: 56px;
            bottom: 26px;
            z-index: 1;

            color: var(--sg-text);
            font-size: 16px;
            opacity: .6;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 850px) {

            .login-photo {
                clip-path: none;
                position: relative;
                inset: auto;
                height: 220px;
            }

            .login-photo-text {
                left: 8%;
                text-align: left;
                bottom: 8%;
                font-size: 20px;
            }

            .login-form-panel {
                max-width: 100%;
                padding: 32px 24px;
            }

            .login-menu-icon {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

    </style>

</head>


<body>


<div class="login-page">

    {{-- SVG só para definir o clip-path orgânico da foto — não é renderizado sozinho --}}
    <svg width="0" height="0" style="position:absolute;">
        <clipPath id="signupBlobClip" clipPathUnits="objectBoundingBox">
            <path d="M1,0
                     L0.62,0
                     C0.50,0.08 0.48,0.18 0.55,0.28
                     C0.62,0.38 0.58,0.48 0.50,0.55
                     C0.42,0.62 0.48,0.72 0.58,0.80
                     C0.65,0.86 0.60,0.94 0.65,1
                     L1,1
                     Z" />
        </clipPath>
    </svg>


    <div class="login-card">

        <div class="login-photo">
            <div class="login-photo-text">
                Prepara-te para a melhor
                aventura académica
            </div>
        </div>

        <div class="login-form-panel">

            {{-- DECORAÇÃO --}}
            <svg class="login-swirl" viewBox="0 0 70 70" fill="none">
                <path d="M5 40 A30 30 0 0 1 35 5" stroke="#1F2333" stroke-width="2"/>
                <path d="M12 40 A22 22 0 0 1 35 13" stroke="#1F2333" stroke-width="2"/>
                <path d="M19 40 A14 14 0 0 1 35 21" stroke="#6C3CE9" stroke-width="2"/>
            </svg>

            {{-- CABEÇALHO --}}
            <div class="login-header">
                <h2><span class="accent">Criar</span>conta</h2>
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
                 FORMULÁRIO — campos batem com UsuarioController::store()
            ================================================== --}}

            <form method="POST"
                  action="{{ route('usuarios.store') }}">

                @csrf

                {{--
                    ESTADO: o controller exige 'estado' (ativo|inativo).
                    O design não tem esse campo, então envio sempre "ativo"
                    — muda para um <select> se quiseres deixar o admin
                    decidir isto depois, em vez de aqui.
                --}}
                <input type="hidden" name="estado" value="ativo">


                {{-- NOME --}}

                <div class="form-group">

                    <label for="nome" class="form-label">Nome Completo</label>

                    <div class="input-wrapper">
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            class="form-control"
                            value="{{ old('nome') }}"
                            required
                            autofocus
                        >
                    </div>

                    @error('nome')
                        <div class="field-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email" class="form-label">Email</label>

                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >
                    </div>

                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- CONTACTO + TIPO DE CONTA --}}

                <div class="form-row">

                    <div class="form-group">

                        <label for="telefone" class="form-label">Contacto <span style="color:#c7c4d4;">(opcional)</span></label>

                        <div class="input-wrapper">
                            <input
                                type="text"
                                id="telefone"
                                name="telefone"
                                class="form-control"
                                value="{{ old('telefone') }}"
                            >
                        </div>

                        @error('telefone')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="tipo" class="form-label">Tipo de conta</label>

                        <div class="input-wrapper">
                            <select id="tipo" name="tipo" class="form-control" required>
                                <option value="" disabled {{ old('tipo') ? '' : 'selected' }}>Selecionar</option>
                                <option value="estudante" @selected(old('tipo') === 'estudante')>Estudante</option>
                                <option value="docente" @selected(old('tipo') === 'docente')>Docente</option>
                                <option value="admin" @selected(old('tipo') === 'admin')>Admin</option>
                            </select>
                        </div>

                        @error('tipo')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                {{-- SENHA + CONFIRMAÇÃO --}}

                <div class="form-row">

                    <div class="form-group">

                        <label for="senha" class="form-label">Senha</label>

                        <div class="input-wrapper">
                            <input
                                type="password"
                                id="senha"
                                name="senha"
                                class="form-control"
                                autocomplete="new-password"
                                required
                            >

                            <button type="button" class="password-toggle" data-target="senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                        @error('senha')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="senha_confirmation" class="form-label">Confirmar Senha</label>

                        <div class="input-wrapper">
                            <input
                                type="password"
                                id="senha_confirmation"
                                name="senha_confirmation"
                                class="form-control"
                                autocomplete="new-password"
                                required
                            >

                            <button type="button" class="password-toggle" data-target="senha_confirmation">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                    </div>

                </div>


                {{-- BOTÃO --}}

                <button type="submit" class="btn-login">
                    Criar conta
                </button>

            </form>

            <div class="divider-or">Ou</div>

            <a href="" class="btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                Continuar com Google
            </a>

            <div class="login-footer">
                Já tem uma conta? <a href="{{ route('login') }}">Entrar</a>
            </div>

        </div>

        <a href="{{ route('inicio') }}" class="login-menu-icon">
            <i class="fas fa-bars"></i>
        </a>

    </div>

</div>


{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

    document.querySelectorAll('.password-toggle').forEach(function (btn) {

        btn.addEventListener('click', function () {

            const input = document.getElementById(this.dataset.target);

            const type =
                input.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';

            input.setAttribute('type', type);

            const icon = this.querySelector('i');

            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }

        });

    });

</script>


</body>

</html>
