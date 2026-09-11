@extends('layouts.app')

@section('content')

<style>
    .dashboard-page {
        background: #f6f8fb;
        min-height: calc(100vh - 70px);
        padding: 30px;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .dashboard-title h2 {
        margin: 0;
        font-weight: 700;
        color: #003B73;
    }

    .dashboard-title p {
        margin: 6px 0 0;
        color: #6b7280;
    }

    .admin-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 10px 16px;
        border-radius: 10px;
        color: #003B73;
        font-weight: 600;
    }

    /* CARDS */
    .stat-card {
        background: #fff;
        border: 1px solid #e8edf3;
        border-radius: 16px;
        padding: 22px;
        height: 100%;
        transition: .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0, 59, 115, .08);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2fb;
        color: #003B73;
        font-size: 20px;
    }

    .stat-label {
        color: #6b7280;
        font-size: 14px;
        margin-top: 18px;
    }

    .stat-value {
        color: #111827;
        font-size: 28px;
        font-weight: 700;
        margin-top: 3px;
    }

    /* SECTION */
    .dashboard-section {
        background: #fff;
        border: 1px solid #e8edf3;
        border-radius: 16px;
        padding: 24px;
        margin-top: 28px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
    }

    .section-header h5 {
        margin: 0;
        color: #003B73;
        font-weight: 700;
    }

    /* QUICK ACTIONS */
    .quick-card {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 17px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #fff;
        color: #111827;
        text-decoration: none;
        transition: .2s ease;
        height: 100%;
    }

    .quick-card:hover {
        border-color: #003B73;
        background: #f8fbff;
        transform: translateY(-2px);
    }

    .quick-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 10px;
        background: #eaf2fb;
        color: #003B73;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .quick-card strong {
        display: block;
        font-size: 14px;
    }

    .quick-card small {
        color: #6b7280;
    }

    /* TABLE */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
    }

    .table tbody td {
        vertical-align: middle;
        font-size: 14px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .status {
        display: inline-flex;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active {
        background: #e9f8ef;
        color: #198754;
    }

    .status-pending {
        background: #fff7df;
        color: #9a6700;
    }

    @media (max-width: 768px) {
        .dashboard-page {
            padding: 20px 15px;
        }

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }
</style>

<div class="dashboard-page">

    {{-- CABEÇALHO --}}
    <div class="dashboard-header">

        <div class="dashboard-title">
            <h2>
                <i class="fa-solid fa-chart-line me-2"></i>
                Dashboard
            </h2>

            <p>
                Visão geral da gestão académica.
            </p>
        </div>

        <div class="admin-badge">
            <i class="fa-solid fa-user-shield"></i>
            Administrador
        </div>

    </div>


    {{-- ESTATÍSTICAS --}}
    <div class="row g-4">

        {{-- CURSOS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label mt-0">
                            Total de Cursos
                        </div>

                        <div class="stat-value">
                            {{ \App\Models\Curso::count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- DISCIPLINAS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label mt-0">
                            Disciplinas
                        </div>

                        <div class="stat-value">
                            {{ \App\Models\Disciplina::count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-book"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- DOCENTES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label mt-0">
                            Docentes
                        </div>

                        <div class="stat-value">
                            {{ \App\Models\Docente::count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- ESTUDANTES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label mt-0">
                            Estudantes
                        </div>

                        <div class="stat-value">
                            {{ \App\Models\Estudante::count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ACÇÕES RÁPIDAS --}}
    <div class="dashboard-section">

        <div class="section-header">
            <h5>
                <i class="fa-solid fa-bolt me-2"></i>
                Ações rápidas
            </h5>
        </div>

        <div class="row g-3">

            <div class="col-xl-3 col-md-6">
                <a href="{{ route('cursos.create') }}" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-plus"></i>
                    </div>

                    <div>
                        <strong>Novo Curso</strong>
                        <small>Cadastrar curso</small>
                    </div>

                </a>
            </div>


            <div class="col-xl-3 col-md-6">
                <a href="{{ route('disciplinas.create') }}" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </div>

                    <div>
                        <strong>Nova Disciplina</strong>
                        <small>Cadastrar disciplina</small>
                    </div>

                </a>
            </div>


            <div class="col-xl-3 col-md-6">
                <a href="{{ route('usuarios.create') }}" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <strong>Novo Utilizador</strong>
                        <small>Criar utilizador</small>
                    </div>

                </a>
            </div>


            <div class="col-xl-3 col-md-6">
                <a href="{{ route('estudantes.create') }}" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>

                    <div>
                        <strong>Novo Estudante</strong>
                        <small>Registar estudante</small>
                    </div>

                </a>
            </div>

        </div>

    </div>


    {{-- RESUMO DO SISTEMA --}}
    <div class="dashboard-section">

        <div class="section-header">

            <h5>
                <i class="fa-solid fa-layer-group me-2"></i>
                Resumo do sistema
            </h5>

        </div>

        <div class="row g-3">

            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-folder"></i>
                    </div>

                    <div>
                        <strong>Categorias</strong>

                        <small>
                            {{ \App\Models\Categoria::count() }}
                            categorias registadas
                        </small>
                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div>
                        <strong>Utilizadores</strong>

                        <small>
                            {{ \App\Models\Usuario::count() }}
                            utilizadores registados
                        </small>
                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>

                    <div>
                        <strong>Inscrições</strong>

                        <small>
                            {{ \App\Models\Inscricao::count() }}
                            inscrições registadas
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- INFORMAÇÃO --}}
    <div class="dashboard-section">

        <div class="section-header">

            <h5>
                <i class="fa-solid fa-circle-info me-2"></i>
                Estado do sistema
            </h5>

        </div>

        <div class="row g-3">

            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div>
                        <strong>Sistema operacional</strong>
                        <small>Todos os serviços principais estão disponíveis.</small>
                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>

                    <div>
                        <strong>
                            {{ now()->format('d/m/Y') }}
                        </strong>

                        <small>
                            Data atual do sistema
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection