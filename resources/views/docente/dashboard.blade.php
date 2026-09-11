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

    .profile-badge {
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
    }

    .stat-value {
        color: #111827;
        font-size: 28px;
        font-weight: 700;
        margin-top: 3px;
    }

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
    }

    .quick-card strong {
        display: block;
        font-size: 14px;
    }

    .quick-card small {
        color: #6b7280;
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
                <i class="fa-solid fa-chalkboard-user me-2"></i>
                Dashboard
            </h2>

            <p>
                Acompanhe os seus cursos, turmas e estudantes.
            </p>
        </div>

        <div class="profile-badge">
            <i class="fa-solid fa-user-tie"></i>
            Docente
        </div>

    </div>


    {{-- ESTATÍSTICAS --}}
    <div class="row g-4">

        {{-- CURSOS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Meus Cursos
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->docente?->cursos()->count() ?? 0 }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- TURMAS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Minhas Turmas
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->docente?->turmas()->count() ?? 0 }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- DISCIPLINAS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Disciplinas
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->docente?->cursos()->withCount('disciplinas')->get()->sum('disciplinas_count') ?? 0 }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-book"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- ESTUDANTES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Estudantes
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->docente?->turmas()->withCount('estudantes')->get()->sum('estudantes_count') ?? 0 }}
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
                Acesso rápido
            </h5>
        </div>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="#" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <div>
                        <strong>Meus Cursos</strong>
                        <small>Consultar cursos atribuídos</small>
                    </div>

                </a>
            </div>


            <div class="col-md-4">
                <a href="#" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div>
                        <strong>Minhas Turmas</strong>
                        <small>Consultar as minhas turmas</small>
                    </div>

                </a>
            </div>


            <div class="col-md-4">
                <a href="#" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <div>
                        <strong>Horários</strong>
                        <small>Consultar horários das aulas</small>
                    </div>

                </a>
            </div>

        </div>

    </div>


    {{-- ÁREA ACADÉMICA --}}
    <div class="dashboard-section">

        <div class="section-header">

            <h5>
                <i class="fa-solid fa-graduation-cap me-2"></i>
                Área académica
            </h5>

        </div>

        <div class="row g-3">

            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>

                    <div>
                        <strong>Estudantes</strong>
                        <small>
                            Acompanhe os estudantes das suas turmas.
                        </small>
                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>

                    <div>
                        <strong>Acompanhamento académico</strong>
                        <small>
                            Consulte informações relacionadas às suas turmas.
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection