<?php
session_start();

require_once __DIR__ . '/app/boot.php';

// Проверка авторизации
if (!isset($_SESSION['uid'])) {
    header('Location: auto.php'); // или куда нужно перенаправлять неавторизованных
    exit;
}

// Обработка сохранения описания
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $description = trim($_POST['description']);
    $userId = $_SESSION['uid'];

    // Защита от SQL-инъекций через подготовленные запросы
    $stmt = pdo()->prepare("UPDATE users SET descriptions = ? WHERE id = ?");
    $stmt->execute([$description, $userId]);

    // Обновляем данные пользователя после сохранения (чтобы сразу отобразить новое описание)
    $stmt = pdo()->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
} else {
    // Загрузка данных пользователя при обычном GET-запросе
    $stmt = pdo()->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['uid']]);
    $user = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="assets/logo/LogoSite.png">
</head>

<body>
    <div class="profile-container">
        <div class="profile-form">
            <h2>Личный кабинет</h2>
            <a href="index.php" class="back-link">← На главную</a>
            <div class="tabs">
                <button class="tab-button active" onclick="openTab(event, 'profile')">Профиль</button>
                <button class="tab-button" onclick="openTab(event, 'favorites')">Любимые фильмы</button>
                <button class="tab-button" onclick="openTab(event, 'reviews')">Отзывы</button>
            </div>
            <div id="profile" class="tab-content">
                <form method="POST">
                    <!-- <div class="input-group">
                        <label for="username">Никнейм</label>
                        <input type="text" id="username" value="">
                    </div>
                    <div class="input-group">
                        <label for="email">Электронная почта</label>
                        <input type="email" id="email" value="">
                    </div> -->
                    <div class="lich">
                        <p>Логин: <?= htmlspecialchars($user['login']) ?></p>
                        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                        <p>Телефон: <?= htmlspecialchars($user['number']) ?></p>
                    </div>
                    <div class="input-group">
                        <label for="description">Описание профиля</label>
                        <textarea id="description" name="description" rows="4"><?= htmlspecialchars($user['descriptions']) ?></textarea>
                    </div>
                    <button type="submit" class="save-button">Сохранить изменения</button>


                    <!-- <div class="input-group">
                        <label for="password">Текущий пароль</label>
                        <input type="password" id="password" placeholder="Введите текущий пароль">
                    </div>

                    <div class="input-group">
                        <label for="new-password">Новый пароль</label>
                        <input type="password" id="new-password" placeholder="Введите новый пароль">
                    </div>

                    <div class="input-group">
                        <label for="confirm-password">Подтвердите пароль</label>
                        <input type="password" id="confirm-password" placeholder="Подтвердите новый пароль">
                    </div> -->

                </form>
            </div>
            <div id="favorites" class="tab-content" style="display: none;">
                <h3>Любимые фильмы</h3>
                <div class="movies-grid">
                    <div class="movie-card">
                        <img src="assets/films/crysis.png" alt="Фильм 1">
                        <h4>Кризис среднего возраста</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/f1.png" alt="Фильм 2">
                        <h4>F1</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/gruppakrovi.png" alt="Фильм 3">
                        <h4>Группа крови</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/kraken.png" alt="Фильм 4">
                        <h4>Кракен</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/1.png" alt="Фильм 5">
                        <h4>Одно целое</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/superman.png" alt="Фильм 6">
                        <h4>Супермен</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/эддингтон.png" alt="Фильм 7">
                        <h4>Эддингтон</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/red.png" alt="Фильм 8">
                        <h4>Красный шелк</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/Континуум.png" alt="Фильм 9">
                        <h4>Континуум</h4>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/PN.png" alt="Фильм 10">
                        <h4>Пункт назначения: Узы крови</h4>
                    </div>
                </div>
            </div>
            <div id="reviews" class="tab-content" style="display: none;">
                <h3>Мои отзывы</h3>
                <div class="review-item">
                    <div class="review-header">
                        <img src="assets/films/crysis.png" alt="Фильм" class="review-image">
                        <div class="review-info">
                            <h4>Кризис среднего возраста</h4>
                            <div class="rating">
                                <span>⭐️⭐️⭐️⭐️⭐️</span>
                                <span>5/5</span>
                            </div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Отличный фильм! Очень понравился сюжет и актерская игра. Так же моему другу Диме понравился этот фильм, ведь через 5 лет он столкнется с этим. Рекомендую всем!</p>
                    </div>
                    <div class="review-actions">
                        <button class="edit-btn">Редактировать</button>
                        <button class="delete-btn">Удалить</button>
                    </div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <img src="assets/films/f1.png" alt="Фильм" class="review-image">
                        <div class="review-info">
                            <h4>F1</h4>
                            <div class="rating">
                                <span>⭐️⭐️⭐️⭐️</span>
                                <span>4/5</span>
                            </div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Интересный фильм о гонках. Графика отличная, но сюжет немного предсказуем.</p>
                    </div>
                    <div class="review-actions">
                        <button class="edit-btn">Редактировать</button>
                        <button class="delete-btn">Удалить</button>
                    </div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <img src="assets/films/gruppakrovi.png" alt="Фильм" class="review-image">
                        <div class="review-info">
                            <h4>Группа крови</h4>
                            <div class="rating">
                                <span>⭐️⭐️⭐️⭐️⭐️</span>
                                <span>5/5</span>
                            </div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Очень трогательный фильм о войне. Отличная игра актеров!</p>
                    </div>
                    <div class="review-actions">
                        <button class="edit-btn">Редактировать</button>
                        <button class="delete-btn">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-info">
            <div class="logo">
                <img src="assets/logo/LogoSite.png" alt="Логотип">
            </div>
            <h3>Онлайн Кинотеатр</h3>
            <p>Ваш персональный кинотеатр</p>
        </div>
    </div>
    <script>
        function openTab(evt, tabName) {

            var i, tabcontent, tabbuttons;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }


            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
            }


            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>