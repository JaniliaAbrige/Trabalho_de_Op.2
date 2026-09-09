<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top main-navbar">
    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand d-flex align-items-center gap-2"
           href="{{ Route::has('dashboard') ? route('dashboard') : url('/') }}">

            <div class="brand-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <div class="brand-text">
                <span class="brand-name">SIGEC</span>
                <small>Sistema de Gestão de Cursos</small>
            </div>
        </a>

        {{-- BOTÃO MOBILE --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Abrir menu">

            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav mx-auto align-items-lg-center">

                {{-- INÍCIO --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}"
                       href="{{ Route::has('dashboard') ? route('dashboard') : url('/') }}">
                        <i class="fas fa-home me-1"></i>
                        Início
                    </a>
                </li>

                {{-- CURSOS --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="fas fa-book-open me-1"></i>
                        Cursos
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('cursos.index') ? route('cursos.index') : '#' }}">
                                <i class="fas fa-list me-2"></i>
                                Lista de Cursos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('cursos.create') ? route('cursos.create') : '#' }}">
                                <i class="fas fa-plus-circle me-2"></i>
                                Novo Curso
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('categorias.index') ? route('categorias.index') : '#' }}">
                                <i class="fas fa-layer-group me-2"></i>
                                Categorias
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- INSCRIÇÕES --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="fas fa-file-signature me-1"></i>
                        Inscrições
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('inscricoes.index') ? route('inscricoes.index') : '#' }}">
                                <i class="fas fa-list-check me-2"></i>
                                Todas as Inscrições
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('inscricoes.create') ? route('inscricoes.create') : '#' }}">
                                <i class="fas fa-user-plus me-2"></i>
                                Nova Inscrição
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('inscricoes.pendentes') ? route('inscricoes.pendentes') : '#' }}">
                                <i class="fas fa-clock me-2"></i>
                                Pendentes
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- USUÁRIOS --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="fas fa-users me-1"></i>
                        Utilizadores
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('usuarios.index') }}">
                                <i class="fas fa-users me-2"></i>
                                Todos os Utilizadores
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('usuarios.create') }}">
                                <i class="fas fa-user-plus me-2"></i>
                                Novo Utilizador
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- RELATÓRIOS --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="fas fa-chart-column me-1"></i>
                        Relatórios
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('relatorios.inscricoes') ? route('relatorios.inscricoes') : '#' }}">
                                <i class="fas fa-file-lines me-2"></i>
                                Inscrições
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ Route::has('relatorios.cursos') ? route('relatorios.cursos') : '#' }}">
                                <i class="fas fa-chart-pie me-2"></i>
                                Cursos
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>

            {{-- ÁREA DO UTILIZADOR --}}
            <div class="navbar-user-area">

                {{-- NOTIFICAÇÕES --}}
                <a href="{{ Route::has('notificacoes.index') ? route('notificacoes.index') : '#' }}"
                   class="notification-btn"
                   title="Notificações">

                    <i class="fas fa-bell"></i>

                    <span class="notification-badge">0</span>
                </a>

                {{-- PERFIL --}}
                @auth
                    <div class="dropdown">

                        <button class="user-profile dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            <div class="user-avatar">
                                {{ strtoupper(substr(auth()->user()->nome ?? 'U', 0, 1)) }}
                            </div>

                            <div class="user-info d-none d-xl-block">
                                <strong>
                                    {{ auth()->user()->nome ?? 'Utilizador' }}
                                </strong>

                                <small>
                                    {{ ucfirst(auth()->user()->tipo ?? 'Utilizador') }}
                                </small>
                            </div>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end profile-menu">

                            <li class="profile-header">

                                <div class="profile-avatar">
                                    {{ strtoupper(substr(auth()->user()->nome ?? 'U', 0, 1)) }}
                                </div>

                                <div>
                                    <strong>
                                        {{ auth()->user()->nome ?? 'Utilizador' }}
                                    </strong>

                                    <small>
                                        {{ auth()->user()->email ?? '' }}
                                    </small>
                                </div>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ Route::has('perfil') ? route('perfil') : '#' }}">
                                    <i class="fas fa-user me-2"></i>
                                    Meu Perfil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ Route::has('definicoes') ? route('definicoes') : '#' }}">
                                    <i class="fas fa-cog me-2"></i>
                                    Definições
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST"
                                      action="{{ Route::has('logout') ? route('logout') : '#' }}">
                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item logout-item">
                                        <i class="fas fa-right-from-bracket me-2"></i>
                                        Terminar Sessão
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                @endauth

            </div>

        </div>
    </div>
</nav>


<style>
    /* =========================================================
       NAVBAR
    ========================================================= */

    .main-navbar {
        min-height: 76px;
        border-bottom: 1px solid rgba(0, 59, 115, 0.10);
        box-shadow: 0 2px 12px rgba(0, 59, 115, 0.06);
        z-index: 1030;
    }

    /* =========================================================
       BRAND
    ========================================================= */

    .navbar-brand {
        text-decoration: none;
        min-width: 220px;
    }

    .brand-icon {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;

        background: #003B73;
        color: #FFFFFF;

        border-radius: 10px;
        font-size: 20px;
    }

    .brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }

    .brand-name {
        color: #003B73;
        font-size: 21px;
        font-weight: 800;
        letter-spacing: 0.5px;
    }

    .brand-text small {
        color: #003B73;
        opacity: 0.75;
        font-size: 10px;
        margin-top: 3px;
    }

    /* =========================================================
       MENU
    ========================================================= */

    .main-navbar .navbar-nav {
        gap: 4px;
    }

    .main-navbar .nav-link {
        color: #003B73;
        font-weight: 600;
        font-size: 14px;
        padding: 27px 13px !important;
        position: relative;
        transition: all 0.2s ease;
    }

    .main-navbar .nav-link:hover,
    .main-navbar .nav-link:focus,
    .main-navbar .nav-link.active {
        color: #F57C00;
    }

    .main-navbar .nav-link::after {
        transition: transform 0.2s ease;
    }

    .main-navbar .nav-link.active::before,
    .main-navbar .nav-link:hover::before {
        content: "";
        position: absolute;
        left: 13px;
        right: 13px;
        bottom: 13px;
        height: 3px;
        background: #F57C00;
        border-radius: 10px;
    }

    /* =========================================================
       DROPDOWN
    ========================================================= */

    .main-navbar .dropdown-menu {
        margin-top: 0;
        border: 1px solid rgba(0, 59, 115, 0.10);
        border-radius: 10px;
        padding: 8px;
        min-width: 220px;
        box-shadow: 0 10px 30px rgba(0, 59, 115, 0.12);
    }

    .main-navbar .dropdown-item {
        color: #003B73;
        font-size: 14px;
        font-weight: 500;
        padding: 10px 12px;
        border-radius: 7px;
        transition: all 0.2s ease;
    }

    .main-navbar .dropdown-item:hover,
    .main-navbar .dropdown-item:focus {
        background: #F57C00;
        color: #FFFFFF;
    }

    .main-navbar .dropdown-item i {
        width: 18px;
        text-align: center;
    }

    .main-navbar .dropdown-divider {
        border-color: rgba(0, 59, 115, 0.10);
    }

    /* =========================================================
       UTILIZADOR
    ========================================================= */

    .navbar-user-area {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .notification-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #003B73;
        background: #FFFFFF;

        border: 1px solid rgba(0, 59, 115, 0.12);

        position: relative;
        text-decoration: none;

        transition: all 0.2s ease;
    }

    .notification-btn:hover {
        background: #003B73;
        color: #FFFFFF;
    }

    .notification-badge {
        position: absolute;
        top: -3px;
        right: -3px;

        min-width: 17px;
        height: 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #F57C00;
        color: #FFFFFF;

        border-radius: 50%;
        font-size: 9px;
        font-weight: 700;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 9px;

        border: none;
        background: transparent;
        color: #003B73;

        padding: 5px;

        border-radius: 8px;
    }

    .user-profile:hover {
        color: #F57C00;
    }

    .user-avatar,
    .profile-avatar {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #003B73;
        color: #FFFFFF;

        font-size: 15px;
        font-weight: 700;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        line-height: 1.2;
    }

    .user-info strong {
        font-size: 13px;
    }

    .user-info small {
        font-size: 10px;
        color: #003B73;
        opacity: 0.7;
        margin-top: 2px;
    }

    /* =========================================================
       PERFIL DROPDOWN
    ========================================================= */

    .profile-menu {
        min-width: 260px !important;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        color: #003B73;
    }

    .profile-header .profile-avatar {
        width: 42px;
        height: 42px;
    }

    .profile-header div:last-child {
        display: flex;
        flex-direction: column;
    }

    .profile-header strong {
        font-size: 13px;
    }

    .profile-header small {
        font-size: 10px;
        margin-top: 2px;
        opacity: 0.7;
    }

    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 991.98px) {

        .main-navbar {
            min-height: 68px;
        }

        .navbar-brand {
            min-width: auto;
        }

        .main-navbar .navbar-nav {
            margin-top: 15px;
            align-items: stretch !important;
        }

        .main-navbar .nav-link {
            padding: 12px 10px !important;
        }

        .main-navbar .nav-link.active::before,
        .main-navbar .nav-link:hover::before {
            left: 0;
            right: auto;
            bottom: 6px;
            width: 35px;
        }

        .navbar-user-area {
            margin-top: 12px;
            padding-bottom: 12px;
        }

        .main-navbar .dropdown-menu {
            box-shadow: none;
            border-radius: 8px;
        }
    }
</style>