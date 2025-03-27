<?php if (!isset($_COOKIE['cookie_accept'])): ?>
    <div class="cookie-notice">
        <p>Este site usa cookies para melhorar a experiência do usuário. <a href="/pages/cookie_policy.php">Saiba mais</a>.</p>
        <button onclick="acceptCookies()">Aceitar</button>
    </div>
    <script>
        function acceptCookies() {
            fetch('/includes/accept_cookies.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector('.cookie-notice').style.display = 'none';
                    }
                });
        }
    </script>
<?php endif; ?>