@extends('layouts.app')

@section('title', 'Início')

@section('content')

<style>
    .home-page {
        background: #fff;
        min-height: calc(100vh - 70px);
    }

    /* =========================
       HERO
    ========================= */
    .hero-section {
        background: #003B73;
        padding: 70px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border: 50px solid rgba(245, 124, 0, 0.15);
        border-radius: 50%;
        right: -100px;
        top: -100px;
    }

    .hero-content {
        max-width: 650px;
        position: relative;
        z-index: 1;
    }

    .hero-label {
        display: inline-block;
        color: #F57C00;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 12px;
    }

    .hero-content h1 {
        color: #fff;
        font-size: 44px;
        line-height: 1.15;
        font-weight: 700;
        margin: 0;
    }

    .hero-content h1 span {
        display: block;
        color: #F57C00;
    }

    .hero-content p {
        color: rgba(255, 255, 255, .85);
        font-size: 16px;
        line-height: 1.7;
        margin: 20px 0 28px;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #F57C00;
        color: #fff;
        padding: 12px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-hero:hover {
        background: #fff;
        color: #003B73;
    }

    /* =========================
       QUICK ACCESS
    ========================= */
    .quick-section {
        padding: 50px 0 60px;
    }

    .section-heading {
        margin-bottom: 28px;
    }

    .section-heading span {
        color: #F57C00;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .section-heading h2 {
        color: #003B73;
        font-size: 25px;
        margin: 5px 0 0;
        font-weight: 700;
    }

    /* =========================
       GRID
    ========================= */
    .quick-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    /* =========================
       CARD
    ========================= */
    .quick-card {
        position: relative;
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        text-decoration: none;
        transition: .2s ease;
    }

    .quick-card:hover {
        border-color: #003B73;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 59, 115, .08);
    }

    .card-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f7fb;
        color: #003B73;
        border-radius: 7px;
        font-size: 18px;
    }

    .quick-card h3 {
        margin: 0 0 4px;
        color: #111827;
        font-size: 15px;
        font-weight: 600;
    }

    .quick-card p {
        margin: 0;
        color: #6b7280;
        font-size: 12px;
    }

    .card-arrow {
        margin-left: auto;
        color: #9ca3af;
        font-size: 11px;
    }

    /* =========================
       PERFIS
    ========================= */
    .profile-card .card-icon {
        background: #eef5fb;
    }

    .profile-card:hover .card-icon {
        background: #003B73;
        color: #fff;
    }

    /* =========================
       RESPONSIVO
    ========================= */
    @media (max-width: 991px) {
        .quick-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 575px) {
        .hero-section {
            padding: 50px 0;
        }

        .hero-content h1 {
            font-size: 34px;
        }

        .quick-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="home-page">

    {{-- =========================
         HERO
    ========================= --}}
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">

                <span class="hero-label">
                    SIGEC
                </span>

                <h1>
                    Gestão de cursos
                    <span>num só lugar.</span>
                </h1>

                <p>
                    Plataforma para gestão de cursos, inscrições,
                    docentes e estudantes.
                </p>

                {{-- Vai para o login como estudante --}}
                <a href="{{ route('login', ['tipo' => 'estudante']) }}"
                   class="btn-hero">

                    Aceder ao sistema

                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>
        </div>
    </section>


    {{-- =========================
         PERFIS DE ACESSO
    ========================= --}}
    <section class="quick-section">

        <div class="container">

            <div class="section-heading">

                <span>
                    Acesso ao sistema
                </span>

                <h2>
                    Selecione o seu perfil
                </h2>

            </div>


            <div class="quick-grid">

                {{-- ADMINISTRADOR --}}
                <a href="{{ route('login', ['tipo' => 'admin']) }}"
                   class="quick-card profile-card">

                    <div class="card-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div>
                        <h3>
                            Administrador
                        </h3>

                        <p>
                            Gerir cursos, utilizadores e sistema
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>


                {{-- DOCENTE --}}
                <a href="{{ route('login', ['tipo' => 'docente']) }}"
                   class="quick-card profile-card">

                    <div class="card-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                    <div>
                        <h3>
                            Docente
                        </h3>

                        <p>
                            Aceder às turmas e atividades letivas
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>


                {{-- ESTUDANTE --}}
                <a href="{{ route('login', ['tipo' => 'estudante']) }}"
                   class="quick-card profile-card">

                    <div class="card-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <div>
                        <h3>
                            Estudante
                        </h3>

                        <p>
                            Consultar cursos e inscrições
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>


                {{-- CURSOS --}}
                <a href="{{ route('cursos.index') }}"
                   class="quick-card">

                    <div class="card-icon">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <div>
                        <h3>
                            Cursos
                        </h3>

                        <p>
                            Consultar cursos disponíveis
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>


                {{-- DISCIPLINAS --}}
                <a href="{{ route('disciplinas.index') }}"
                   class="quick-card">

                    <div class="card-icon">
                        <i class="fas fa-book"></i>
                    </div>

                    <div>
                        <h3>
                            Disciplinas
                        </h3>

                        <p>
                            Consultar disciplinas dos cursos
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>


                {{-- UTILIZADORES --}}
                <a href="{{ route('usuarios.index') }}"
                   class="quick-card">

                    <div class="card-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>

                    <div>
                        <h3>
                            Utilizadores
                        </h3>

                        <p>
                            Gerir utilizadores do sistema
                        </p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>

                </a>

            </div>

        </div>

    </section>

</div>

@endsection