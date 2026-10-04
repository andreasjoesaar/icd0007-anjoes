<?php
$errors = [];
$projects_arr = [];
$projects_path = __DIR__ . '/data/projects.txt';

if (file_exists($projects_path)) {
    $projects = file($projects_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($projects as $line) {
        $projects_arr[] = json_decode($line, true);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton']) && !empty($_POST['deleteId'])) {
    $id_to_delete = $_POST['deleteId'];
    $project_name_to_delete = "";

    foreach ($projects_arr as $p) {
        if (isset($p['id']) && $p['id'] === $id_to_delete) {
            $project_name_to_delete = $p['name'] ?? '';
            break;
        }
    }

    $has_tasks = false;
    $tasks_path = __DIR__ . '/data/tasks.txt';
    if (file_exists($tasks_path)) {
        $tasks = file($tasks_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($tasks as $line) {
            $clean_line = trim($line);
            if (empty($clean_line)) continue; 
            
            $t = json_decode($clean_line, true);
            if (isset($t['project']) && $t['project'] === $project_name_to_delete) {
                $has_tasks = true;
                break;
            }
        }
    }

    if (!$has_tasks) {
        $new_projects = [];
        foreach ($projects_arr as $p) {
            if (!isset($p['id']) || $p['id'] !== $id_to_delete) {
                $new_projects[] = json_encode($p, JSON_UNESCAPED_UNICODE) . PHP_EOL;
            }
        }
        file_put_contents($projects_path, implode("", $new_projects));
        header("Location: project-list.php");
        exit();
    } else {
        $errors[] = "Cannot delete project with one or more tasks";
    }
}

?>
<!doctype html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>HW 3 | Project Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body id="project-list-page">
    <?php 
    include('header.php');
    include('nav.php');
    ?>
    <div class="error-block" id="error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </div>
    <table id="projects-table">
        <h3>Projects</h3>
        <?php if ($projects_arr): ?>
            <tr>
                <th name="name">Name</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Priority</th>
            </tr>

        <?php else: ?>
            <p>No projects yet.</p>
        <?php endif ?>
        <?php foreach ($projects_arr as $project): ?>
            <tr>
                <td data-project-id="<?php echo htmlspecialchars($project['id'] ?? ''); ?>">
                    <?php echo htmlspecialchars($project['name'] ?? ''); ?> </td>
                <td> <?php echo htmlspecialchars($project['status'] ?? ''); ?> </td>
                <td> <?php echo htmlspecialchars($project['deadline'] ?? ''); ?> </td>
                <td> <?php echo htmlspecialchars($project['priority'] ?? ''); ?> </td>
                <td>
                    <a href="project-form.php?id=<?php echo urlencode($project['id'] ?? ''); ?>"
                        id="project-edit-link-<?php echo htmlspecialchars($project['id'] ?? ''); ?>">Edit</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="deleteId" value="<?php echo htmlspecialchars($project['id'] ?? ''); ?>">
                        <button type="submit" class="delete-button" name="deleteButton" value="delete"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php
    include('footer.php')
        ?>
</body>


</html>