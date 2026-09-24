@php

@endphp

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap');

:root {
    --sg-primary: #6C3CE9;
    --sg-primary-dark: #4C1FB8;
    --sg-primary-light: #F1ECFE;
    --sg-teal: #2DD4BF;
    --sg-text: #1F2333;
    --sg-muted: #6B7280;
    --sg-border: #ECEAF5;
    --sg-font-heading: 'Poppins', sans-serif;
    --sg-font-body: 'Inter', sans-serif;
}

.home-page {
    background: #fff;
    font-family: var(--sg-font-body);
}


/* ================= HERO ================= */

.hero-section {
    background: linear-gradient(180deg, #FBFAFF 0%, #F4F1FE 100%);
    padding: 70px 0 90px;
    position: relative;
    overflow: hidden;
}

.hero-grid {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 0.9fr;
    align-items: center;
    gap: 40px;
}

.hero-content {
    max-width: 560px;
}

.hero-content h1 {
    font-family: var(--sg-font-heading);
    color: var(--sg-text);
    font-size: 46px;
    line-height: 1.2;
    font-weight: 700;
    margin: 0;
}

.hero-content h1 .accent {
    color: var(--sg-primary);
}

.hero-content p {
    color: var(--sg-muted);
    font-size: 15px;
    line-height: 1.8;
    margin: 22px 0 30px;
    max-width: 440px;
}

.hero-actions {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 40px;
}

.btn-hero {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--sg-primary);
    color: #fff;
    padding: 13px 26px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: .2s;
}

.btn-hero:hover {
    background: var(--sg-primary-dark);
}

.btn-hero-ghost {
    display: inline-flex;
    align-items: center;
    color: var(--sg-text);
    background: #fff;
    border: 1px solid var(--sg-border);
    padding: 13px 26px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: .2s;
}

.btn-hero-ghost:hover {
    border-color: var(--sg-primary);
    color: var(--sg-primary);
}

.hero-highlights {
    display: flex;
    gap: 28px;
    margin-bottom: 26px;
}

.hero-highlight {
    display: flex;
    align-items: center;
    gap: 8px;
}

.hero-highlight i {
    color: var(--sg-primary);
    font-size: 14px;
}

.hero-highlight span {
    font-size: 12px;
    font-weight: 600;
    color: var(--sg-text);
}

.hero-stat {
    display: inline-flex;
    align-items: baseline;
    gap: 8px;
    margin-bottom: 22px;
}

.hero-stat strong {
    font-family: var(--sg-font-heading);
    font-size: 20px;
    color: var(--sg-text);
}

.hero-stat span {
    font-size: 12px;
    color: var(--sg-muted);
}

.hero-partners {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 26px;
    padding-top: 22px;
    border-top: 1px solid var(--sg-border);
}

.hero-partners span {
    font-family: var(--sg-font-heading);
    color: #B4AFC4;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .3px;
}

/* ---- photo + floating badges ---- */

.hero-visual {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 460px;
}

.hero-visual-circle {
    position: absolute;
    width: 340px;
    height: 340px;
    background: linear-gradient(145deg, var(--sg-primary), #9B6DFF);
    border-radius: 50%;
}

.hero-visual-ring {
    position: absolute;
    width: 420px;
    height: 420px;
    border: 1px dashed rgba(108,60,233,.25);
    border-radius: 50%;
}

.hero-visual img.hero-photo {
    position: relative;
    z-index: 1;
    height: 430px;
    width: auto;
    object-fit: contain;
}

.hero-badge {
    position: absolute;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 10px;
    background: #fff;
    border-radius: 12px;
    padding: 10px 16px;
    box-shadow: 0 14px 30px rgba(76,31,184,.16);
}

.hero-badge .badge-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--sg-primary-light);
    color: var(--sg-primary);
    font-size: 13px;
    flex-shrink: 0;
}

.hero-badge strong {
    display: block;
    color: var(--sg-text);
    font-size: 14px;
    line-height: 1.1;
}

.hero-badge span {
    display: block;
    color: var(--sg-muted);
    font-size: 11px;
    margin-top: 2px;
}

.hero-badge-cursos {
    top: 6%;
    right: -2%;
}

.hero-badge-videos {
    top: 42%;
    left: -8%;
}

.hero-badge-colaboracao {
    bottom: 6%;
    right: 4%;
}


/* ================= PORQUÊ SE JUNTAR A NÓS ================= */

.why-section {
    padding: 80px 0;
    text-align: center;
}

.section-eyebrow {
    display: block;
    color: var(--sg-primary);
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
}

.section-heading-center {
    font-family: var(--sg-font-heading);
    color: var(--sg-text);
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 46px;
}

.why-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    text-align: left;
}

.why-card {
    padding: 30px 26px;
    border: 1px solid var(--sg-border);
    border-radius: 14px;
    transition: .2s ease;
}

.why-card:hover {
    box-shadow: 0 16px 30px rgba(76,31,184,.08);
    transform: translateY(-3px);
}

.why-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: linear-gradient(145deg, var(--sg-primary), #9B6DFF);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    margin-bottom: 20px;
}

.why-card h3 {
    font-family: var(--sg-font-heading);
    margin: 0 0 10px;
    color: var(--sg-text);
    font-size: 16px;
    font-weight: 600;
}

.why-card p {
    margin: 0;
    color: var(--sg-muted);
    font-size: 13px;
    line-height: 1.7;
}


/* ================= DOMINE (imagem + texto) ================= */

.domine-section {
    padding: 20px 0 90px;
}

.domine-grid {
    display: grid;
    grid-template-columns: 0.85fr 1.15fr;
    gap: 56px;
    align-items: center;
}

.domine-visual {
    position: relative;
    height: 420px;
}

.domine-visual::before {
    content: "";
    position: absolute;
    width: 140px;
    height: 140px;
    background: var(--sg-teal);
    opacity: .2;
    border-radius: 30px;
    top: -20px;
    right: 10%;
    transform: rotate(12deg);
}

.domine-visual img {
    position: absolute;
    border-radius: 16px;
    object-fit: cover;
    box-shadow: 0 20px 40px rgba(31,27,51,.15);
}

.domine-img-main {
    width: 64%;
    height: 80%;
    top: 6%;
    left: 0;
    z-index: 1;
}

.domine-img-secondary {
    width: 50%;
    height: 56%;
    bottom: 0;
    right: 0;
    z-index: 2;
    border: 6px solid #fff;
}

.domine-content h2 {
    font-family: var(--sg-font-heading);
    color: var(--sg-text);
    font-size: 30px;
    font-weight: 700;
    margin: 0 0 18px;
    max-width: 440px;
}

.domine-content > p {
    color: var(--sg-muted);
    font-size: 14px;
    line-height: 1.8;
    max-width: 470px;
    margin: 0 0 30px;
}

.domine-points {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.domine-point {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.domine-point .point-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: var(--sg-primary-light);
    color: var(--sg-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}

.domine-point p {
    margin: 0;
    color: var(--sg-text);
    font-size: 13px;
    line-height: 1.6;
}


/* ================= CURSOS GRATUITOS ================= */

.courses-section {
    padding: 20px 0 90px;
}

.courses-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 30px;
}

.courses-heading h2 {
    font-family: var(--sg-font-heading);
    color: var(--sg-text);
    font-size: 24px;
    font-weight: 700;
    margin: 0;
    position: relative;
    padding-bottom: 12px;
}

.courses-heading h2::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 46px;
    height: 3px;
    background: var(--sg-primary);
    border-radius: 2px;
}

.courses-heading a {
    color: var(--sg-primary);
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
}

.courses-row {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 18px;
}

.course-card {
    border: 1px solid var(--sg-border);
    border-radius: 14px;
    padding: 22px 18px;
    transition: .2s ease;
}

.course-card:hover {
    box-shadow: 0 16px 30px rgba(76,31,184,.08);
    transform: translateY(-3px);
}

.course-icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 18px;
    margin-bottom: 18px;
}

.course-card h3 {
    font-family: var(--sg-font-heading);
    margin: 0 0 14px;
    color: var(--sg-text);
    font-size: 14px;
    font-weight: 600;
}

.course-instructors {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    color: var(--sg-muted);
}

.course-avatars {
    display: flex;
}

.course-avatars span {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--sg-primary-light);
    color: var(--sg-primary);
    font-size: 9px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #fff;
    margin-left: -6px;
}

.course-avatars span:first-child {
    margin-left: 0;
}

.courses-dots {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-top: 30px;
}

.courses-dots span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--sg-border);
}

.courses-dots span.active {
    background: var(--sg-primary);
    width: 18px;
    border-radius: 3px;
}


/* ================= CURSOS PREMIUM ================= */

.premium-section {
    padding: 20px 0 80px;
}

.premium-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.premium-card {
    border: 1px solid var(--sg-border);
    border-radius: 16px;
    overflow: hidden;
    background: #fff;
    transition: .2s ease;
}

.premium-card-link {
    display: block;
    color: inherit;
    text-decoration: none;
}

.premium-card:hover {
    box-shadow: 0 16px 30px rgba(76,31,184,.08);
    transform: translateY(-3px);
}

.premium-thumb {
    position: relative;
    height: 180px;
}

.premium-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.premium-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    color: var(--sg-text);
}

.premium-body {
    padding: 20px;
}

.premium-body h3 {
    font-family: var(--sg-font-heading);
    font-size: 15px;
    font-weight: 600;
    color: var(--sg-text);
    margin: 0 0 10px;
}

.premium-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
}

.premium-rating {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    color: var(--sg-muted);
}

.premium-rating i {
    color: #FFC107;
}

.premium-author {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: var(--sg-muted);
}

.premium-author img {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    object-fit: cover;
}

.premium-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid var(--sg-border);
}

.premium-price {
    font-family: var(--sg-font-heading);
    font-size: 15px;
    font-weight: 700;
    color: var(--sg-primary);
}


/* ================= INSTRUTORES ================= */

.instructors-section {
    background: #3B1578;
    padding: 70px 0;
    color: #fff;
    text-align: center;
}

.instructors-section .section-eyebrow {
    color: #A78BFA;
}

.instructors-section h2 {
    color: #fff;
    font-family: var(--sg-font-heading);
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 40px;
}

.instructors-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.instructor-card {
    background: #fff;
    border-radius: 16px;
    padding: 16px;
    text-align: left;
    color: var(--sg-text);
    display: flex;
    flex-direction: column;
}

.instructor-card-img-wrapper {
    position: relative;
    width: 100%;
    height: 220px;
    background-color: #f3f4f6;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 16px;
}

.instructor-card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.instructor-card h4 {
    font-family: var(--sg-font-heading);
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 4px;
    color: var(--sg-text);
}

.instructor-card p {
    font-size: 13px;
    color: var(--sg-muted);
    margin: 0;
}


/* ================= MENTOR BANNER ================= */

.mentor-section {
    padding: 90px 0;
}

.mentor-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.mentor-content h2 {
    font-family: var(--sg-font-heading);
    font-size: 28px;
    font-weight: 700;
    color: var(--sg-text);
    margin: 0 0 20px;
    line-height: 1.3;
}

.mentor-list {
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
}

.mentor-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: var(--sg-muted);
    margin-bottom: 12px;
}

.mentor-list li::before {
    content: "";
    width: 6px;
    height: 6px;
    background: var(--sg-teal);
    border-radius: 50%;
}

.mentor-visual {
    position: relative;
    display: flex;
    justify-content: center;
}

.mentor-visual img {
    width: 80%;
    border-radius: 20px;
}

.mentor-stat-badge {
    position: absolute;
    background: #fff;
    padding: 10px 16px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    font-size: 12px;
    font-weight: 700;
    color: var(--sg-text);
}

.mentor-stat-badge.badge-1 { top: 10%; right: 5%; }
.mentor-stat-badge.badge-2 { top: 40%; left: 0%; }
.mentor-stat-badge.badge-3 { bottom: 10%; left: 10%; }


/* ================= ARTIGOS E ACTIVIDADES ================= */

.articles-section {
    padding: 20px 0 90px;
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.article-card {
    border: 1px solid var(--sg-border);
    border-radius: 16px;
    overflow: hidden;
}

.article-thumb {
    height: 160px;
    position: relative;
}

.article-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--sg-primary);
    color: #fff;
    font-size: 10px;
    padding: 4px 10px;
    border-radius: 12px;
    font-weight: 600;
}

.article-body {
    padding: 18px;
}

.article-body h4 {
    font-family: var(--sg-font-heading);
    font-size: 14px;
    font-weight: 600;
    color: var(--sg-text);
    margin: 0;
    line-height: 1.4;
}


/* ================= RESPONSIVO ================= */

@media (max-width: 991px) {
    .hero-grid {
        grid-template-columns: 1fr;
    }

    .hero-visual {
        height: 360px;
        margin-top: 30px;
    }

    .hero-visual img.hero-photo {
        height: 340px;
    }

    .why-grid {
        grid-template-columns: 1fr 1fr;
    }

    .domine-grid {
        grid-template-columns: 1fr;
    }

    .domine-visual {
        height: 320px;
    }

    .courses-row {
        grid-template-columns: repeat(3, 1fr);
    }

    .premium-grid, .articles-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .instructors-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .mentor-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 575px) {
    .hero-section {
        padding: 50px 0 90px;
    }

    .hero-content h1 {
        font-size: 32px;
    }

    .why-grid {
        grid-template-columns: 1fr;
    }

    .courses-row, .premium-grid, .instructors-grid, .articles-grid {
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
            <div class="hero-grid">

                <div class="hero-content">
                    <h1>
                        Impulsione Suas
                        <span class="accent">Habilidades</span>
                        E <span class="accent">Enriqueça</span> A Sua
                        <span class="accent">Carreira</span>
                    </h1>

                    <p>
                        Acede ao sistema mais atual de aprendizagem online e a
                        materiais que ajudam o teu conhecimento a crescer.
                    </p>

                    <div class="hero-actions">
                        <a href="" class="btn-hero">Iniciar</a>
                        <a href="" class="btn-hero-ghost">Saber mais</a>
                    </div>

                    <div class="hero-highlights">
                        <div class="hero-highlight">
                            <i class="fas fa-microphone"></i>
                            <span>Public Speaking</span>
                        </div>
                        <div class="hero-highlight">
                            <i class="fas fa-briefcase"></i>
                            <span>Career-Oriented</span>
                        </div>
                        <div class="hero-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Creative Thinking</span>
                        </div>
                    </div>

                    <div class="hero-stat">
                        <strong>250+</strong>
                        <span>Collaboration</span>
                    </div>

                    <div class="hero-partners">
                        <span>duolingo</span>
                        <span>Codecov</span>
                        <span>UserTesting</span>
                        <span>magic leap</span>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="hero-visual-ring"></div>
                    <div class="hero-visual-circle"></div>

                    <img src="{{ asset('imgs/hero-estudante.png') }}" alt="Estudante SIGEC" class="hero-photo">

                    <div class="hero-badge hero-badge-cursos">
                        <div class="badge-icon"><i class="fas fa-graduation-cap"></i></div>
                        <div>
                            <strong>5K+</strong>
                            <span>cursos online</span>
                        </div>
                    </div>

                    <div class="hero-badge hero-badge-videos">
                        <div class="badge-icon"><i class="fas fa-play"></i></div>
                        <div>
                            <strong>2K+</strong>
                            <span>Vídeos em curso</span>
                        </div>
                    </div>

                    <div class="hero-badge hero-badge-colaboracao">
                        <div class="badge-icon"><i class="fas fa-users"></i></div>
                        <div>
                            <strong>250+</strong>
                            <span>Collaboration</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- PORQUÊ SE JUNTAR A NÓS --}}
    <section class="why-section">
        <div class="container">

            <span class="section-eyebrow">Programa de Cursos</span>
            <h2 class="section-heading-center">porquê se juntar a nós?</h2>

            <div class="why-grid">

                <div class="why-card">
                    <div class="why-icon"><i class="fas fa-briefcase"></i></div>
                    <h3>Experiência real</h3>
                    <p>Trabalha diretamente com empresas em projetos reais de desenvolvimento, para dominar as tuas competências e construir um portefólio sólido.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Trabalho garantido</h3>
                    <p>O nosso programa procura eliminar o risco financeiro do teu percurso de formação, com uma opção de encaminhamento profissional garantido.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fas fa-brain"></i></div>
                    <h3>Conhecimento a longo prazo</h3>
                    <p>Interage e aprende com mentores que trabalham em empresas de referência, para te preparares para as entrevistas do teu emprego ideal.</p>
                </div>

            </div>

        </div>
    </section>


    {{-- DOMINE AS HABILIDADES --}}
    <section class="domine-section">
        <div class="container">
            <div class="domine-grid">

                <div class="domine-visual">
                    <img src="{{ asset('imgs/estudante-mochila.png') }}" alt="Estudante" class="domine-img-main">
                    <img src="{{ asset('imgs/docente-sala.jpg') }}" alt="Docente em sala de aula" class="domine-img-secondary">
                </div>

                <div class="domine-content">
                    <h2>Domine as habilidades para impulsionar a tua carreira</h2>
                    <p>
                        Certifica-te, domina competências tecnológicas modernas e
                        avança na tua carreira, seja no início ou já com
                        experiência. 95% dos estudantes reportam que o conteúdo
                        prático ajudou diretamente a sua carreira.
                    </p>

                    <div class="domine-points">
                        <div class="domine-point">
                            <div class="point-icon"><i class="fas fa-certificate"></i></div>
                            <p>Adquire certificação em mais de 100 cursos promissores</p>
                        </div>

                        <div class="domine-point">
                            <div class="point-icon"><i class="fas fa-chart-line"></i></div>
                            <p>Constrói competências ao teu ritmo, de laboratórios a cursos completos</p>
                        </div>

                        <div class="domine-point">
                            <div class="point-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            <p>Mantém-te motivado com instrutores envolventes</p>
                        </div>

                        <div class="domine-point">
                            <div class="point-icon"><i class="fas fa-cloud"></i></div>
                            <p>Acompanha as tecnologias mais recentes em cloud</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ESCOLHA O SEU CURSO FAVORITO --}}
    <section class="courses-section">
        <div class="container">

            <div class="courses-heading">
                <h2>Escolha o seu curso favorito no plano Gratuito</h2>
                <a href="">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="courses-row">

                <div class="course-card" role="link" tabindex="0" onclick="window.location.href='{{ route('signup') }}'" onkeydown="if (event.key === 'Enter' || event.key === ' ') window.location.href='{{ route('signup') }}'">
                    <div class="course-icon" style="background:#DD0031;"><i class="fab fa-angular"></i></div>
                    <h3>Angular Development</h3>
                    <div class="course-instructors">
                        <div class="course-avatars">
                            <span>A</span><span>B</span>
                        </div>
                        Instructors 20+
                    </div>
                </div>

                <div class="course-card" role="link" tabindex="0" onclick="window.location.href='{{ route('signup') }}'" onkeydown="if (event.key === 'Enter' || event.key === ' ') window.location.href='{{ route('signup') }}'">
                    <div class="course-icon" style="background:#3776AB;"><i class="fab fa-python"></i></div>
                    <h3>Python Development</h3>
                    <div class="course-instructors">
                        <div class="course-avatars">
                            <span>P</span><span>K</span>
                        </div>
                        Instructors 20+
                    </div>
                </div>

                <div class="course-card" role="link" tabindex="0" onclick="window.location.href='{{ route('signup') }}'" onkeydown="if (event.key === 'Enter' || event.key === ' ') window.location.href='{{ route('signup') }}'">
                    <div class="course-icon" style="background:#339933;"><i class="fab fa-node-js"></i></div>
                    <h3>NodeJS Development</h3>
                    <div class="course-instructors">
                        <div class="course-avatars">
                            <span>N</span><span>J</span>
                        </div>
                        Instructors 20+
                    </div>
                </div>

                <div class="course-card" role="link" tabindex="0" onclick="window.location.href='{{ route('signup') }}'" onkeydown="if (event.key === 'Enter' || event.key === ' ') window.location.href='{{ route('signup') }}'">
                    <div class="course-icon" style="background:#777BB4;"><i class="fab fa-php"></i></div>
                    <h3>PHP Development</h3>
                    <div class="course-instructors">
                        <div class="course-avatars">
                            <span>P</span><span>H</span>
                        </div>
                        Instructors 20+
                    </div>
                </div>

                <div class="course-card" role="link" tabindex="0" onclick="window.location.href='{{ route('signup') }}'" onkeydown="if (event.key === 'Enter' || event.key === ' ') window.location.href='{{ route('signup') }}'">
                    <div class="course-icon" style="background:#FF2D20;"><i class="fab fa-laravel"></i></div>
                    <h3>Laravel Development</h3>
                    <div class="course-instructors">
                        <div class="course-avatars">
                            <span>L</span><span>D</span>
                        </div>
                        Instructors 20+
                    </div>
                </div>

            </div>

            <div class="courses-dots">
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </section>


    {{-- CURSOS NO PLANO PREMIUM --}}
    <section class="premium-section">
        <div class="container">
            <div class="courses-heading">
                <h2>Cursos no plano premium</h2>
                <a href="{{ route('cursos.index') }}">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="premium-grid">
                @forelse($cursosPremium as $curso)
                    <a href="{{ route('signup') }}" class="premium-card premium-card-link">
                        <div class="premium-thumb">
                            <img
                                src="{{ $curso->capa ? asset('storage/' . $curso->capa) : asset('Imgs/graduada.png') }}"
                                alt="Capa do curso {{ $curso->nome }}"
                            >
                            <span class="premium-badge">
                                {{ $curso->categoria?->nome ?? 'Curso premium' }}
                            </span>
                        </div>
                        <div class="premium-body">
                            <h3>{{ $curso->nome }}</h3>
                            <div class="premium-meta">
                                <div class="premium-rating">
                                    <i class="fas fa-book-open"></i>
                                    <span>{{ ucfirst($curso->modalidade) }}</span>
                                </div>
                                <div class="premium-author">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>{{ $curso->duracao ?: 'Formação profissional' }}</span>
                                </div>
                            </div>
                            <div class="premium-footer">
                                <span class="premium-price">
                                    {{ number_format((float) $curso->preco, 2, ',', '.') }} MTs
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="premium-empty">
                        <i class="fas fa-book-open"></i>
                        <p>Ainda não existem cursos premium cadastrados.</p>
                    </div>
                @endforelse
            </div>

            <div class="courses-dots">
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </section>


    {{-- CLASSES TOP E MELHORES INSTRUTORES --}}
    <section class="instructors-section">
        <div class="container">
            <span class="section-eyebrow">Instrutores</span>
            <h2>Classes Top e melhores instrutores</h2>

            <div class="instructors-grid">
                <div class="instructor-card">
                    <div class="instructor-card-img-wrapper">
                        <img src="{{ asset('imgs/Bibi.jpeg') }}" alt="Joyce Pence">
                    </div>
                    <h4>Abiner Gabriel</h4>
                    <p>Data Base Developer</p>
                </div>


                <div class="instructor-card">
                    <div class="instructor-card-img-wrapper">
                        <img src="{{ asset('imgs/Meque.jpeg') }}" alt="Ruben Holmes">
                    </div>
                    <h4>Mequelina Cossa</h4>
                    <p>Software Engineer</p>


            </div>
            <div class="instructor-card">
                    <div class="instructor-card-img-wrapper">
                        <img src="{{ asset('imgs/Janny.jpeg') }}" alt="Ruben Holmes">
                    </div>
                    <h4>Janília Abrige</h4>
                    <p>FrontEnd Developer</p>
                </div>

                <div class="instructor-card">
                    <div class="instructor-card-img-wrapper">
                        <img src="{{ asset('imgs/Djudju.jpeg') }}" alt="Edith Dorsey">
                    </div>
                    <h4>Aarsídio Munguambe</h4>
                    <p>Web Developer</p>
                </div>

        </div>


    </section>

</div>
{{-- JUNTE-SE COMO MENTOR --}}
    <section class="mentor-section">
        <div class="container">
            <div class="mentor-grid">
                <div class="mentor-content">
                    <h2>Quer partilhar seu conhecimento connosco? Junte-se como um mentor</h2>
                    <ul class="mentor-list">
                        <li>Ensine a sua paixão e alcance milhares de estudantes em todo o país.</li>
                        <li>Trabalhe no seu próprio horário e crie cursos no seu ritmo.</li>
                        <li>Construa a sua marca pessoal e ganhe uma renda extra garantida.</li>
                        <li>Aceda a ferramentas exclusivas para criação de conteúdo.</li>
                    </ul>
                    <a href="" class="btn-hero">Start Teaching Today</a>
                </div>

                <div class="mentor-visual">
                    <img src="{{ asset('imgs/mentor-banner.jpg') }}" alt="Mentor">
                    <div class="mentor-stat-badge badge-1">100+</div>
                    <div class="mentor-stat-badge badge-2">80+</div>
                    <div class="mentor-stat-badge badge-3">50K+</div>
                </div>
            </div>
        </div>
    </section>


    {{-- ARTIGOS RECENTES E ACTIVIDADES --}}
    <section class="articles-section">
        <div class="container">
            <div class="courses-heading">
                <h2>Artigos recentes e actividades</h2>
                <a href="">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="articles-grid">
                <div class="article-card">
                    <div class="article-thumb">
                        <img src="{{ asset('imgs/article1.jpg') }}" alt="Artigo">
                        <span class="article-tag">Tech & Design</span>
                    </div>
                    <div class="article-body">
                        <h4>The Impact of LMS on Academic Journey in Education</h4>
                    </div>
                </div>

                <div class="article-card">
                    <div class="article-thumb">
                        <img src="{{ asset('imgs/article2.jpg') }}" alt="Artigo">
                        <span class="article-tag">Tech & Design</span>
                    </div>
                    <div class="article-body">
                        <h4>Maximizing Academic Success with the Right LMS</h4>
                    </div>
                </div>

                <div class="article-card">
                    <div class="article-thumb">
                        <img src="{{ asset('imgs/article3.jpg') }}" alt="Artigo">
                        <span class="article-tag">Tech & Design</span>
                    </div>
                    <div class="article-body">
                        <h4>Maximizing Academic Success with the Right LMS</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
