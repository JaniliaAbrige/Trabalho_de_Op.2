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

    .welcome-card {
        background: #003B73;
        color: #fff;
        border-radius: 16px;
        padding: 25px;
        margin-bottom: 28px;
    }

    .welcome-card h4 {
        font-weight: 700;
        margin-bottom: 7px;
    }

    .welcome-card p {
        margin: 0;
        opacity: .85;
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
                <i class="fa-solid fa-house me-2"></i>
                Meu Dashboard
            </h2>

            <p>
                Consulte os seus cursos, inscrições e informações académicas.
            </p>

        </div>

        <div class="profile-badge">
            <i class="fa-solid fa-user-graduate"></i>
            Estudante
        </div>

    </div>


    {{-- BOAS-VINDAS --}}
    <div class="welcome-card">

        <h4>
            Olá, {{ auth()->user()->nome }}!
        </h4>

        <p>
            Bem-vindo ao sistema académico. Aqui pode acompanhar a sua
            vida académica num único lugar.
        </p>

    </div>


    {{-- ESTATÍSTICAS --}}
    <div class="row g-4">

        {{-- INSCRIÇÕES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Minhas Inscrições
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->estudante?->inscricoes()->count() ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- CURSOS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Meus Cursos
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->estudante?->cursos()->count() ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- INSCRIÇÕES PENDENTES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Pendentes
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->estudante?->inscricoes()->where('estado', 'pendente')->count() ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- APROVADAS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Aprovadas
                        </div>

                        <div class="stat-value">
                            {{ auth()->user()->estudante?->inscricoes()->where('estado', 'aprovada')->count() ?? 0 }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ACESSOS RÁPIDOS --}}
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
                        <strong>Cursos</strong>
                        <small>Consultar cursos disponíveis</small>
                    </div>

                </a>

            </div>


            <div class="col-md-4">

                <a href="#" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>

                    <div>
                        <strong>Minhas Inscrições</strong>
                        <small>Acompanhar inscrições</small>
                    </div>

                </a>

            </div>


            <div class="col-md-4">

                <a href="#" class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>

                    <div>
                        <strong>Pagamentos</strong>
                        <small>Consultar pagamentos</small>
                    </div>

                </a>

            </div>

        </div>

    </div>


    {{-- INFORMAÇÕES --}}
    <div class="dashboard-section">

        <div class="section-header">

            <h5>
                <i class="fa-solid fa-circle-info me-2"></i>
                A minha área académica
            </h5>

        </div>

        <div class="row g-3">

            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>

                        <strong>Meu Perfil</strong>

                        <small>
                            Consulte e actualize os seus dados pessoais.
                        </small>

                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fa-solid fa-bell"></i>
                    </div>

                    <div>

                        <strong>Notificações</strong>

                        <small>
                            Consulte avisos e comunicações académicas.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection