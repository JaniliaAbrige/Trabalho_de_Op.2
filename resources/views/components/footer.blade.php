<footer class="main-footer">
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

<style>
    .main-footer {
        background: #003B73;
        color: #FFFFFF;
        margin-top: auto;
    }

    .footer-bottom {
        min-height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 12px;
        color: #FFFFFF;
        opacity: 0.9;
    }

    @media (max-width: 767.98px) {
        .footer-bottom {
            min-height: 42px;
            font-size: 11px;
            padding: 8px 15px;
        }
    }
</style>