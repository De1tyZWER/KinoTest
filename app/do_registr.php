<?php
session_start();
require_once __DIR__ . '/boot.php';

$stmt = pdo()->prepare("SELECT * FROM users WHERE login = ? OR email = ?");
$stmt->execute([
    $_POST['login'],
    $_POST['email']
]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) {
    $_SESSION['alert']['error'] = "Такой логин или почта уже зарегистрированы!";
    header('Location: ../reg.php');
    exit;
} else {
    $_SESSION['uid'] = $user["id"];
    $_SESSION['alert']['success'] = "Успешная регистрация!";
    header('Location: ../auto.php');
}

$stmt1 = pdo()->prepare("INSERT INTO users (login, email, number, password) VALUES (?, ?, ?, ?)");
$stmt1->execute([
    $_POST['login'],
    $_POST['email'],
    $_POST['number'],
    $_POST['password'],
]);
