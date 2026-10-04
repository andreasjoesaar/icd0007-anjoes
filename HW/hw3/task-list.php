<?php
try {
    $tasks = file(__DIR__ . '/data/tasks.txt');
    $tasks_arr = [];
    $task_idx = 0;
    foreach ($tasks as $json_line) {
        $json_arr = json_decode($json_line, true);
        $json_arr['task-id'] = $task_idx;
        $task_idx++;
        array_push($tasks_arr, $json_arr);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task_to_delete = intval($_POST['deleteButton']);
        foreach ($tasks_arr as $task) {
            if ($task['task-id'] === $task_to_delete) {
                $idx_to_delete = $task['task-id'];
                delete($idx_to_delete);
            }
        }
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}

function delete($index_to_delete)
{
    try {
        $tasks_path = __DIR__ . '/data/tasks.txt';
        $tasks = file($tasks_path);
        unset($tasks[$index_to_delete]);
        file_put_contents($tasks_path, $tasks);
        header("Location: task-list.php");
    } catch (Exception $e) {
        echo "Unable to open file" . $e->getMessage() . PHP_EOL;
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
                <form name="deleteId" method="post">
                    <tr>
                        <!--
                        <td >
                            <?php echo $task['task-id'] ?>
                        </td>
                        -->
                        <td>
                            <?php echo $task['title'] ?>
                        </td>
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
                            <button type="submit" name="editButton" value="edit">Edit</button>
                        </td>
                        <td>
                            <button type="submit" class="delete-button" name="deleteButton"
                                value="<?php echo $task['task-id'] ?>">Delete</button>
                        </td>
                    </tr>
                </form>
            <?php endforeach ?>
        </table>
    </div>
    <?php
    include('footer.php')
        ?>
</body>


</html>