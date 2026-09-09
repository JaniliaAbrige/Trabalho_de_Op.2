```blade
<footer class="main-footer">
    <div class="container">
        <div class="footer-bottom">
            <span>
                © {{ date('Y') }} SIGEC. Todos os direitos reservados.
            </span>
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
```
