<?php
require_once('Portfolio.php');
$portfolio = new Portfolio();
$projects = $portfolio->getProjects();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Portfolio</title>
</head>
<body>
    <h1>My Portfolio</h1>
    <div class="projects">
        <?php foreach ($projects as $project): ?>
            <div class="project">
                <h2><?php echo htmlspecialchars($project['name']); ?></h2>
                <?php if ($project['img']): ?>
                    <p><img src="<?php echo htmlspecialchars($project['img']); ?>" alt="<?php echo htmlspecialchars($project['name']); ?>"></p>
                <?php endif; ?>
                <p><?php echo htmlspecialchars($project['text']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
