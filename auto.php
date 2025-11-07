<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="assets/logo/LogoSite.png">
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Авторизация</h2>
            <a href="index.php" class="back-link">← На главную</a>
            <?php if(!empty($_SESSION['alert']['success'])):?>
                <span><?= $_SESSION['alert']['success'] ?></span>
            <?php endif;?>
            <form action="app/do_auto.php" method="post">
                <div class="input-group">
                    <label for="email">Логин</label>
                    <input type="text" id="email" name="login" placeholder="Логин" required>
                </div>
                <div class="input-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Пароль" required>
                </div>
                <div class="options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Запомнить меня</label>
                    </div>
                    <a href="fp/forgot.html" class="forgot-password">Забыли пароль?</a>
                </div>
                <button type="submit" class="login-button">Авторизация</button>
            </form>
            <div class="login-link">
                <p>Нет аккаунта? <a href="reg.php">Зарегистрироваться</a></p>
            </div>
        </div>


        <div class="login-info">
            <div class="logo">
                <img src="assets/logo/LogoSite.png" alt="Логотип">
            </div>
            <h3>Онлайн Кинотеатр</h3>
            <p>Отличный просмотр, только у нас</p>
        </div>
    </div>
</body>

</html>