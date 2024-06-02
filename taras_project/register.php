<?php
require_once("user.php");
include('partials/header.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    
    // Регистрация пользователя
    $user->register($name, $password);
    echo "Пользователь успешно зарегистрирован.";
}
?>

<form action="register.php" method="POST">
<link rel="stylesheet" href="css/styles.css">

    <div>
        <input type="text" placeholder="Введите имя пользователя" name="name" required>
        <input type="password" placeholder="Введите пароль" name="password" required>
        <button type="submit">Зарегистрировать</button>
    </div>
</form>
<?php include('partials/footer.php');
?>
