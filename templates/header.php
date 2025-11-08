<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/logo/LogoSite.png">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="index.php">deity & dmsh</a></h1>
                </div>
                <nav class="nav-menu">
                    <div class="mbpanel" onclick="toggleMenu()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="nav-links" id="navLinks">
                        <a href="films.php">Фильмы</a>
                        <a onclick="scrollToNewMovies()" href="#">Новинки</a>
                        <a onclick="scrollToPopularMovies()" href="#">Популярное</a>
                    </div>
                    <div class="auth-button">
                        <?php if (!isset($_SESSION['uid'])):  ?>
                            <a href="auto.php">Войти</a>
                        <?php else:  ?>
                            <a href="cab.php" style="color: white;"><?= $user['login'] ?> </a>
                            <a href="app/logout.php">Выйти</a>
                        <?php endif;  ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>