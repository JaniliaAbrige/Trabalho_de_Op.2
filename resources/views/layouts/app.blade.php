<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'SIGEC')
    </title>


    {{-- =====================================================
         BOOTSTRAP
    ====================================================== --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- =====================================================
         FONT AWESOME
    ====================================================== --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    {{-- =====================================================
         FONTE
    ====================================================== --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- =====================================================
         ESTILOS GERAIS
    ====================================================== --}}

    <style>

        :root {

            --azul: #6C3CE9;
            --laranja: #9B6DFF;
            --branco: #FFFFFF;

        }


        * {
            box-sizing: border-box;
        }


        html {
            min-height: 100%;
        }


        body {

            margin: 0;

            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: #F8F7FC;

            color: #1F2333;

            font-family: 'Inter', sans-serif;

            font-size: 14px;

        }


        main {
            flex: 1;
        }


        a {
            color: inherit;
        }


        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        /* =====================================================
           BOTÃO PRINCIPAL
        ====================================================== */

        .btn-primary-custom {

            background: #6C3CE9;
            border: 1px solid #6C3CE9;

            color: #FFFFFF;

            padding: 10px 18px;

            border-radius: 8px;

            font-weight: 600;

            transition: all 0.2s ease;

        }


        .btn-primary-custom:hover {

            background: #4C1FB8;
            border-color: #4C1FB8;

            color: #FFFFFF;

            transform: translateY(-1px);

        }


        /* =====================================================
           BOTÃO LARANJA
        ====================================================== */

        .btn-orange {

            background: #9B6DFF;
            border: 1px solid #9B6DFF;

            color: #FFFFFF;

            padding: 10px 18px;

            border-radius: 8px;

            font-weight: 600;

            transition: all 0.2s ease;

        }


        .btn-orange:hover {

            background: #6C3CE9;
            border-color: #6C3CE9;

            color: #FFFFFF;

        }


        /* =====================================================
           CARDS
        ====================================================== */

        .card-system {

            background: #FFFFFF;

            border: 1px solid rgba(108, 60, 233, 0.12);

            border-radius: 12px;

            box-shadow:
                0 4px 15px rgba(108, 60, 233, 0.08);

        }


        /* =====================================================
           ALERTAS
        ====================================================== */

        .alert-system {

            border: 1px solid rgba(108, 60, 233, 0.12);

            border-radius: 9px;

            color: #1F2333;

            background: #FFFFFF;

        }


        /* =====================================================
           SELEÇÃO
        ====================================================== */

        ::selection {

            background: #6C3CE9;
            color: #FFFFFF;

        }


        /* =====================================================
           SCROLLBAR
        ====================================================== */

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #FFFFFF;
        }

        ::-webkit-scrollbar-thumb {
            background: #6C3CE9;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #9B6DFF;
        }


        /* =====================================================
           RESPONSIVIDADE
        ====================================================== */

        @media (max-width: 767.98px) {

            body {
                font-size: 13px;
            }

        }

    </style>


    @stack('styles')

    <style>
        .dashboard-page,
        .categoria-page,
        .curso-page,
        .signup-page {
            background: #F8F7FC !important;
        }

        .dashboard-title h2,
        .admin-badge,
        .section-header h5,
        .quick-icon,
        .page-header h1,
        .card-title-area h2,
        .section-title,
        .login-link a {
            color: #6C3CE9 !important;
        }

        .stat-icon,
        .quick-icon {
            background: #F1ECFE !important;
        }

        .quick-card:hover,
        .form-control:focus,
        .form-select:focus {
            border-color: #6C3CE9 !important;
        }

        .quick-card:hover {
            background: #FAF8FF !important;
        }

        .title-icon,
        .signup-header {
            background: linear-gradient(135deg, #6C3CE9, #9B6DFF) !important;
        }

        .section-title {
            border-bottom-color: #6C3CE9 !important;
        }

        .required,
        .btn-registar,
        .btn-submit {
            background-color: #9B6DFF !important;
            border-color: #9B6DFF !important;
        }

        .required {
            background-color: transparent !important;
            color: #6C3CE9 !important;
        }

        .btn-registar:hover,
        .btn-submit:hover {
            background-color: #4C1FB8 !important;
            border-color: #4C1FB8 !important;
        }

        button:hover:not(.password-toggle),
        input[type="submit"]:hover,
        input[type="button"]:hover,
        a[class*="btn-"]:hover {
            background: #000000 !important;
            background-color: #000000 !important;
            border-color: #000000 !important;
            color: #FFFFFF !important;
        }
    </style>

</head>


<body>


    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

    <x-navbar />


    {{-- =====================================================
         CONTEÚDO
    ====================================================== --}}

    <main>

        @yield('content')

    </main>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <x-footer />


    {{-- =====================================================
         BOOTSTRAP JS
    ====================================================== --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    @stack('scripts')

</body>

</html>
