<?php
include('partials/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("user.php");

session_start();

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    if ($user->login($name, $password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->getUserIdByName($name); 
        $_SESSION['is_admin'] = $user->isAdmin($name);

        header("Location: admin-data.php");
        exit();
    } else {
        echo "Incorrect login or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <div class="container">
        <form action="login.php" method="POST">
            <div>
                <input type="text" placeholder="Enter Username" name="name" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
    <?php include('partials/footer.php'); ?>
</body>
</html>
