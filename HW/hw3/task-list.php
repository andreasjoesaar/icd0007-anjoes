<?php
$tasks_path = __DIR__ . '/data/tasks.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton']) && !empty($_POST['deleteId'])) {
    $id_to_delete = $_POST['deleteId'];
    if (file_exists($tasks_path)) {
        $tasks = file($tasks_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $new_tasks = [];
        foreach ($tasks as $line) {
            $t = json_decode($line, true);
            if (!isset($t['id']) || $t['id'] !== $id_to_delete) {
                $new_tasks[] = $line . PHP_EOL;
            }
        }
        file_put_contents($tasks_path, implode("", $new_tasks));
    }
    header("Location: task-list.php");
    exit();
}

$tasks_arr = [];
if (file_exists($tasks_path)) {
    $tasks = file($tasks_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($tasks as $line) {
        $tasks_arr[] = json_decode($line, true);
    }
}
?>
<!doctype html>
<html lang="et">

<head id="page-header">
    <meta charset="UTF-8">
    <title>HW 3 | Task List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
include('header.php')
    ?>

<body id="task-list-page">
    <?php
    include('nav.php');
    ?>
    <div>
        <table id="tasks-table">
            <h3>Tasks</h3>
            <?php if ($tasks_arr): ?>
                <tr>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due</th>
                    <th>Complexity</th>
                    <th>Owner</th>
                </tr>
            <?php endif ?>
            <?php
            foreach ($tasks_arr as $task): ?>
                <tr>
                    <!--
                        <td >
                            <?php echo $task['task-id'] ?>
                        </td>
                        -->
                    <td data-task-id="<?php echo htmlspecialchars($task['id'] ?? ''); ?>"> <?php echo htmlspecialchars($task['title'] ?? ''); ?> </td>
                    <td>
                        <?php echo $task['project'] ?>
                    </td>
                    <td>
                        <?php echo $task['description'] ?>
                    </td>
                    <td>
                        <?php echo $task['status'] ?>
                    </td>
                    <td>
                        <?php echo $task['priority'] ?>
                    </td>
                    <td>
                        <?php echo $task['due'] ?>
                    </td>
                    <td>
                        <?php echo $task['complexity'] ?>
                    </td>
                    <td>
                        <?php echo $task['owner'] ?>
                    </td>
                    <td>
                        <a href="task-form.php?id=<?php echo urlencode($task['id'] ?? ''); ?>"
                            id="task-edit-link-<?php echo htmlspecialchars($task['id'] ?? ''); ?>">Edit</a>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="deleteId" value="<?php echo htmlspecialchars($task['id'] ?? ''); ?>">
                            <button type="submit" class="delete-button" name="deleteButton" value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php
    include('footer.php')
        ?>
</body>


</html>