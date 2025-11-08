<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="assets/logo/LogoSite.png">
</head>

<body>
    <div class="reg-container">
        <div class="reg-form">
            <h2>Регистрация</h2>
            <a href="index.php" class="back-link">← На главную</a><br>
            <?php if (!empty($_SESSION['alert']['error'])): ?>
                <span><?= $_SESSION['alert']['error'] ?></span>
            <?php endif; ?>
            <form action="app/do_registr.php" method="post">
                <div class="input-group">
                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login" placeholder="Введите логин" required>
                </div>

                <div class="input-group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" placeholder="user@example.com" required>
                </div>

                <div class="input-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone" placeholder="+7 (___) ___-__-__" required>
                    <input type="hidden" name="number" id="phone_hidden">
                </div>

                <div class="input-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>

                <div class="input-group">
                    <label for="confirm-password">Подтвердите пароль</label>
                    <input type="password" id="confirm-password" name="confirm-password " placeholder="Подтвердите пароль" required>
                </div>

                <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">Я согласен с <a href="rule.php">условиями использования</a> и <a href="rule.html">политикой конфиденциальности</a></label>
                </div>

                <button type="submit" class="reg-button">Зарегистрироваться</button>
            </form>

            <div class="login-link">
                <p>Уже есть аккаунт? <a href="auto.php">Войти</a></p>
            </div>
        </div>

        <div class="reg-info">
            <div class="logo">
                <img src="assets/logo/LogoSite.png" alt="Логотип">
            </div>
            <h3>Онлайн Кинотеатр</h3>
            <p>Создайте аккаунт для доступа ко всем возможностям</p>
        </div>
    </div>

    <script>
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);

            let formattedValue = '+7 (';
            if (value.length > 1) {
                formattedValue += value.substring(1, 4) + ') ';
            }
            if (value.length >= 5) {
                formattedValue += value.substring(4, 7) + '-';
            }
            if (value.length >= 8) {
                formattedValue += value.substring(7, 9) + '-';
                if (value.length >= 10) {
                    formattedValue += value.substring(9, 11);
                }
            }

            e.target.value = formattedValue;
            document.getElementById('phone_hidden').value = value;
        });

        document.getElementById('confirm-password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const submitBtn = document.querySelector('.reg-button');

            if (password !== confirmPassword && confirmPassword !== '') {
                this.setCustomValidity('Пароли не совпадают');
            } else {
                this.setCustomValidity('');
            }
        });

        // document.getElementById('phone').addEventListener('input', function(e) {
        //     let value = e.target.value.replace(/\D/g, '');
        //     if (value.length > 11) value = value.substring(0, 11);

        //     let formattedValue = '+7 (';
        //     if (value.length > 1) {
        //         formattedValue += value.substring(1, 4) + ') ';
        //     }
        //     if (value.length >= 5) {
        //         formattedValue += value.substring(4, 7) + '-';
        //     }
        //     if (value.length >= 8) {
        //         formattedValue += value.substring(7, 9) + '-';
        //         if (value.length >= 10) {
        //             formattedValue += value.substring(9, 11);
        //         }
        //     }

        //     e.target.value = formattedValue;
        // });
    </script>
</body>

</html>