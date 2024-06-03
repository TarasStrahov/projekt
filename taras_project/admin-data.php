<?php
include('partials/header.php');
require_once('user.php');

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.php');
    exit();
}

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $userid = $_POST['userid'] ?? null;

        switch ($action) {
            case 'add':
                $user->register($name, $password);
                break;
            case 'edit':
                $user->edit($userid, $name, $password);
                break;
            case 'delete':
                $user->delete($userid);
                break;
        }
    }
}
$users = $user->getAllUsers();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>User Settings</title>
</head>
<body>
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h1>User Settings</h1>
                <form id="userForm" method="POST" action="admin-data.php">
                    <input type="hidden" id="userid" name="userid">
                    <label for="name">Username:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <input type="hidden" id="action" name="action">
                    <button type="submit" onclick="document.getElementById('action').value='add'">Add</button>
                    <button type="submit" onclick="document.getElementById('action').value='edit'">Edit</button>
                    <button type="submit" onclick="document.getElementById('action').value='delete'">Delete</button>
                </form>
                
                <h2>List of Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($u->userid); ?></td>
                                <td><?php echo htmlspecialchars($u->name); ?></td>
                                <td><?php echo htmlspecialchars($u->password); ?></td>
                                <td><button onclick="editUser(<?php echo htmlspecialchars(json_encode($u)); ?>)">Edit</button></td>
                                <td><button onclick="deleteUser(<?php echo htmlspecialchars($u->userid); ?>)">Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
function editUser(user) {
    document.getElementById('userid').value = user.userid;
    document.getElementById('name').value = user.name;
    document.getElementById('password').value = '';
}

function deleteUser(userid) {
    document.getElementById('userid').value = userid;
    document.getElementById('action').value = 'delete';
    document.getElementById('userForm').submit();
}
</script>
<?php include('partials/footer.php'); ?>
</body>
</html>
