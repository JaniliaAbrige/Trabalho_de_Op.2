<style>
.home-page {
    background: #fff;
}

/* HERO */

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
    color: rgba(255,255,255,.85);
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


/* QUICK ACCESS */

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


/* GRID */

.quick-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}


/* CARD */

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
    box-shadow: 0 8px 20px rgba(0,59,115,.08);
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


/* RESPONSIVO */

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

@extends('layouts.app')

@section('title', 'Início')

@section('content')

<div class="home-page">

    {{-- HERO --}}
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <span class="hero-label">SIGEC</span>

                <h1>
                    Gestão de cursos
                    <span>num só lugar.</span>
                </h1>

                <p>
                    Plataforma para gestão de cursos, inscrições,
                    docentes e estudantes.
                </p>

                <a href="" class="btn-hero">
                    Consultar cursos
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>


    {{-- ACESSOS --}}
    <section class="quick-section">
        <div class="container">

            <div class="section-heading">
                <span>Acesso rápido</span>
                <h2>O que pretende fazer?</h2>
            </div>

            <div class="quick-grid">

                <a href="" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <div>
                        <h3>Cursos</h3>
                        <p>Consultar cursos disponíveis</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>


                <a href="" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>

                    <div>
                        <h3>Inscrições</h3>
                        <p>Gerir inscrições dos estudantes</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>


                <a href="#" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                    <div>
                        <h3>Docentes</h3>
                        <p>Consultar informação dos docentes</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>


                 <a href="{{ route('login') }}" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <div>
                        <h3>Estudantes</h3>
                        <p>Consultar estudantes registados</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>


                <a href="#" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-chart-column"></i>
                    </div>

                    <div>
                        <h3>Relatórios</h3>
                        <p>Consultar dados e relatórios</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>


                <a href="{{ route('usuarios.index') }}" class="quick-card">
                    <div class="card-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>

                    <div>
                        <h3>Utilizadores</h3>
                        <p>Gerir utilizadores do sistema</p>
                    </div>

                    <i class="fas fa-chevron-right card-arrow"></i>
                </a>

            </div>

        </div>
    </section>

</div>

@endsection