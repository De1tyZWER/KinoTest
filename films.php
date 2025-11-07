<?php
session_start();

require_once __DIR__ . '/app/boot.php';
$stmt = pdo()->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([
    $_SESSION['uid']
]);
$user = $stmt->fetch();
?>

<?php require_once 'templates/header.php' ?>

    <main style="margin-top: 80px;">
        <section id="scrollN" class="new-movies">
            <div class="container">
                <h2>Новинки</h2>
                <div class="movies-grid">
                    <div class="movie-card">
                        <img src="assets/films/crysis.png" alt="Фильм 1">
                        <h3>Кризис среднего возраста</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/f1.png" alt="Фильм 2">
                        <h3>F1</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/gruppakrovi.png" alt="Фильм 3">
                        <h3>Группа крови</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/kraken.png" alt="Фильм 4">
                        <h3>Кракен</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/1.png" alt="Фильм 5">
                        <h3>Одно целое</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/superman.png" alt="Фильм 6">
                        <h3>Супермен</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/эддингтон.png" alt="Фильм 7">
                        <h3>Эддингтон</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/red.png" alt="Фильм 8">
                        <h3>Красный шелк</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/Континуум.png" alt="Фильм 9">
                        <h3>Континуум</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/PN.png" alt="Фильм 10">
                        <h3>Пункт назначения: Узы крови</h3>
                    </div>
                </div>
            </div>
        </section>

        <section id="scrollP" class="new-movies">
            <div class="container">
                <h2>Популярное</h2>
                <div class="movies-grid">
                    <div class="movie-card">
                        <img src="assets/films/crysis.png" alt="Фильм 1">
                        <h3>Кризис среднего возраста</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/f1.png" alt="Фильм 2">
                        <h3>F1</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/gruppakrovi.png" alt="Фильм 3">
                        <h3>Группа крови</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/kraken.png" alt="Фильм 4">
                        <h3>Кракен</h3>
                    </div>
                    <div class="movie-card">
                        <img src="assets/films/1.png" alt="Фильм 5">
                        <h3>Одно целое</h3>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php require_once 'templates/footer.php' ?>