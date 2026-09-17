<style>
.sg-footer {
    background: #1F1B33;
    color: rgba(255,255,255,.7);
    padding: 60px 0 24px;
    font-family: var(--sg-font-body, 'Inter', sans-serif);
}

.sg-footer-grid {
    display: grid;
    grid-template-columns: 1.3fr 1fr 1fr 1fr;
    gap: 32px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255,255,255,.1);
}

.sg-footer-brand {
    font-family: var(--sg-font-heading, 'Poppins', sans-serif);
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 12px;
}

.sg-footer-brand span {
    color: #A78BFA;
}

.sg-footer-grid p {
    font-size: 13px;
    line-height: 1.7;
    max-width: 260px;
    margin: 0;
}

.sg-footer-col h4 {
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    margin: 0 0 18px;
}

.sg-footer-col ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.sg-footer-col a {
    color: rgba(255,255,255,.65);
    text-decoration: none;
    font-size: 13px;
    transition: .2s;
}

.sg-footer-col a:hover {
    color: #A78BFA;
}

.sg-footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 22px;
    font-size: 12px;
    color: rgba(255,255,255,.45);
}

.sg-footer-social {
    display: flex;
    gap: 14px;
}

.sg-footer-social a {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 13px;
    transition: .2s;
}

.sg-footer-social a:hover {
    background: #6C3CE9;
}

@media (max-width: 767px) {
    .sg-footer-grid {
        grid-template-columns: 1fr 1fr;
    }

    .sg-footer-bottom {
        flex-direction: column;
        gap: 14px;
        text-align: center;
    }
}
</style>

<footer class="sg-footer">
    <div class="container">

        <div class="sg-footer-grid">
            <div>
                <p class="sg-footer-brand">SIG<span>EC</span></p>
                <p>Plataforma para gestão de cursos, inscrições, docentes e estudantes, num só lugar.</p>
            </div>

            <div class="sg-footer-col">
                <h4>Plataforma</h4>
                <ul>
                    <li><a href="">Cursos</a></li>
                    <li><a href="">Inscrições</a></li>
                    <li><a href="">Docentes</a></li>
                    <li><a href="">Estudantes</a></li>
                </ul>
            </div>

            <div class="sg-footer-col">
                <h4>Instituição</h4>
                <ul>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Relatórios</a></li>
                    <li><a href="">Utilizadores</a></li>
                    <li><a href="">Contacto</a></li>
                </ul>
            </div>

            <div class="sg-footer-col">
                <h4>Suporte</h4>
                <ul>
                    <li><a href="">Central de ajuda</a></li>
                    <li><a href="">Termos de uso</a></li>
                    <li><a href="">Privacidade</a></li>
                </ul>
            </div>
        </div>

        <div class="sg-footer-bottom">
            <span>&copy; {{ date('Y') }} SIGEC. Todos os direitos reservados.</span>

            <div class="sg-footer-social">
                <a href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

    </div>
</footer>
