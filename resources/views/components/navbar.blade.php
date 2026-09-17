<style>
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

.sg-navbar {
    background: #fff;
    border-bottom: 1px solid var(--sg-border);
    padding: 16px 0;
    font-family: var(--sg-font-body);
}

.sg-navbar-inner {
    display: flex;
    align-items: center;
    gap: 32px;
}

.sg-logo {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: var(--sg-font-heading);
    font-size: 20px;
    font-weight: 700;
    color: var(--sg-text);
    text-decoration: none;
    flex-shrink: 0;
}

.sg-logo span {
    color: var(--sg-primary);
}

.sg-search {
    flex: 1;
    max-width: 380px;
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--sg-primary-light);
    border-radius: 8px;
    padding: 10px 16px;
}

.sg-search i {
    color: var(--sg-primary);
    font-size: 13px;
}

.sg-search input {
    border: none;
    background: transparent;
    outline: none;
    font-size: 13px;
    color: var(--sg-text);
    width: 100%;
    font-family: var(--sg-font-body);
}

.sg-search input::placeholder {
    color: #9CA3AF;
}

.sg-nav-links {
    display: flex;
    align-items: center;
    gap: 26px;
    margin-left: auto;
}

.sg-nav-links a {
    color: var(--sg-text);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: .2s;
}

.sg-nav-links a:hover {
    color: var(--sg-primary);
}

.sg-nav-actions {
    display: flex;
    align-items: center;
    gap: 18px;
}

.sg-btn-login {
    color: var(--sg-text);
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

.sg-btn-login:hover {
    color: var(--sg-primary);
}

.sg-btn-signup {
    background: var(--sg-primary);
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: .2s;
}

.sg-btn-signup:hover {
    background: var(--sg-primary-dark);
}

@media (max-width: 991px) {
    .sg-search,
    .sg-nav-links {
        display: none;
    }
}
</style>

<nav class="sg-navbar">
    <div class="container">
        <div class="sg-navbar-inner">
            <a href="{{ url('/') }}" class="sg-logo">SIGEC</a>

            <div class="sg-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="O que pretende pesquisar?">
            </div>

            <div class="sg-nav-links">
                <a href="">Cursos</a>
                <a href="">Docentes</a>
                <a href="">Estudantes</a>
            </div>

            <div class="sg-nav-actions">
                <a href="" class="sg-btn-login">Entrar</a>
                <a href="" class="sg-btn-signup">Criar conta</a>
            </div>
        </div>
    </div>
</nav>
