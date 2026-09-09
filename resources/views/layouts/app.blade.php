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

            --azul: #003B73;
            --laranja: #F57C00;
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

            background: #FFFFFF;

            color: #003B73;

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

            background: #003B73;
            border: 1px solid #003B73;

            color: #FFFFFF;

            padding: 10px 18px;

            border-radius: 8px;

            font-weight: 600;

            transition: all 0.2s ease;

        }


        .btn-primary-custom:hover {

            background: #F57C00;
            border-color: #F57C00;

            color: #FFFFFF;

            transform: translateY(-1px);

        }


        /* =====================================================
           BOTÃO LARANJA
        ====================================================== */

        .btn-orange {

            background: #F57C00;
            border: 1px solid #F57C00;

            color: #FFFFFF;

            padding: 10px 18px;

            border-radius: 8px;

            font-weight: 600;

            transition: all 0.2s ease;

        }


        .btn-orange:hover {

            background: #003B73;
            border-color: #003B73;

            color: #FFFFFF;

        }


        /* =====================================================
           CARDS
        ====================================================== */

        .card-system {

            background: #FFFFFF;

            border: 1px solid rgba(0, 59, 115, 0.10);

            border-radius: 12px;

            box-shadow:
                0 4px 15px rgba(0, 59, 115, 0.05);

        }


        /* =====================================================
           ALERTAS
        ====================================================== */

        .alert-system {

            border: 1px solid rgba(0, 59, 115, 0.10);

            border-radius: 9px;

            color: #003B73;

            background: #FFFFFF;

        }


        /* =====================================================
           SELEÇÃO
        ====================================================== */

        ::selection {

            background: #F57C00;
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
            background: #003B73;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F57C00;
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