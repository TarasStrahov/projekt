<?php
require_once('Portfolio.php');
$portfolio = new Portfolio();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $img = $_POST['img'];
    $text = $_POST['text'];

    if ($action == 'add') {
        $portfolio->addProject($name, $img, $text);
    } elseif ($action == 'edit') {
        $portfolio->updateProject($id, $name, $img, $text);
    } elseif ($action == 'delete') {
        $portfolio->deleteProject($id);
    }

    header("Location: manageportfolio   .php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Portfolio</title>
</head>
<body>
    <h1>Manage Portfolio</h1>
    <form method="POST" action="manage.php">
        <input type="hidden" name="id" id="id">
        <label>Name: <input type="text" name="name" id="name" required></label>
        <label>Image URL: <input type="url" name="img" id="img"></label>
        <label>Text: <textarea name="text" id="text" required></textarea></label>
        <input type="hidden" name="action" id="action" value="add">
        <button type="submit">Save</button>
    </form>

    <h2>Projects</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Text</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $projects = $portfolio->getProjects();
            foreach ($projects as $project) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($project['name']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($project['img']) . "' alt='" . htmlspecialchars($project['name']) . "' width='50'></td>";
                echo "<td>" . htmlspecialchars($project['text']) . "</td>";
                echo "<td>
                    <button onclick='editProject(" . json_encode($project) . ")'>Edit</button>
                    <form method='POST' action='manage.php' style='display:inline'>
                        <input type='hidden' name='id' value='" . $project['id'] . "'>
                        <input type='hidden' name='action' value='delete'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function editProject(project) {
            document.getElementById('id').value = project.id;
            document.getElementById('name').value = project.name;
            document.getElementById('img').value = project.img;
            document.getElementById('text').value = project.text;
            document.getElementById('action').value = 'edit';
        }
    </script>
</body>
</html>
