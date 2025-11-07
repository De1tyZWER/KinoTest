<?php
session_start();
require_once __DIR__ . '/boot.php';

$stmt = pdo()->prepare("SELECT * FROM users WHERE login=? AND password = ?");
$stmt->execute([
    $_POST['login'],
    $_POST['password']
]);
$user = $stmt->fetch();

if(!$stmt->rowCount()){
    $_SESSION['alert']['error'] = "Не успех!";
    header('Location: ../auto.php');
    exit;
}
else{
    $_SESSION['uid'] = $user["id"];
    $_SESSION['login'] = $user["login"];
    header('Location: ../index.php');
    exit;

}


?>