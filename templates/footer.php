<link rel="stylesheet" href="css/style.css">

<body>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Кинотеатр Оффлайн</h3>
                    <p>Худшие фильмы и сериалы в одном месте</p>
                </div>
                <div class="footer-section">
                    <h4>Контакты</h4>
                    <p>Телефон: +7 (937) 088-35-26</p>
                    <p>Email: konishev1914@gmail.com</p>
                </div>
                <div class="footer-section">
                    <h4>Информация</h4>
                    <ul>
                        <li><a href="#">О нас</a></li>
                        <li><a href="rule.php">Правила</a></li>
                        <li><a href="#">Помощь</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Кинотеатр Онлайн. Все права не защищены, можно красть.</p>
            </div>
        </div>
    </footer>
    <script>
        function scrollToNewMovies() {
            const section = document.getElementById('scrollN');
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }

        function scrollToPopularMovies() {
            const section = document.getElementById('scrollP');
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }

        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
</body>

</html>