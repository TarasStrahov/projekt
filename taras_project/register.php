<?php
require_once("user.php");
include('partials/header.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    

    $user->register($name, $password);
    echo "Succsesfully registered";
}
?>

<form action="register.php" method="POST">
<link rel="stylesheet" href="css/styles.css">

    <div>
        <input type="text" placeholder="Enter Username" name="name" required>
        <input type="password" placeholder="Enter Password" name="password" required>
        <button type="submit">Register</button>
    </div>
</form>
<?php include('partials/footer.php');
?>
