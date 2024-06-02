<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("user.php");

session_start(); // Сессия должна быть запущена до любых выводов данных

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    if ($user->login($name, $password)) {
        header("Location:./admin-data.php"); // Убедитесь, что путь правильный
        exit(); // Завершить скрипт после перенаправления
    } else {
        echo "Неправильный логин или пароль.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Вход</h1>
    </header>
    <div class="container">
        <form action="login.php" method="POST">
            <div>
                <input type="text" placeholder="Введите имя пользователя" name="name" required>
                <input type="password" placeholder="Введите пароль" name="password" required>
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
</body>
</html>
