<?php require_once 'templates/header.php' ?>
<?php
session_start();

require_once __DIR__ . '/app/boot.php';
$stmt = pdo()->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([
    $_SESSION['uid'] ?? null
]);
$user = $stmt->fetch();
?>

<main>
    <section class="promo-banner">
        <div class="container">
            <h2>Правила</h2>
            <p>Если админ молчит — он думает, как тебя наказать</p>
            <p>Твой пинг выше — твои проблемы</p>
            <p>Если ты прав — всё равно бан</p></p>
            <p>Спорить с правилами — нарушение правил</p>
            <p>Если ты пропал на неделю — начинай с нуля, как новичок</p>
            <p>Не писать «админ, посмотри в лс» — он не твой друг</p>
            <p>Ты не в праве предлагать новые правила (кроме этого списка)</p>
            <p>Если ты думаешь, что админ ошибся — перезайди и подумай ещё раз</p>
            <p>Любовь к серверу не освобождает от ответственности</p>
        </div>
    </section>

    </section>
</main>
<?php require_once 'templates/footer.php' ?>