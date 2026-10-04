<?php
try {
    $tasks = file(__DIR__ . '/data/tasks.txt');
    $tasks_arr = [];
    foreach ($tasks as $json_line) {
        array_push($tasks_arr, json_decode($json_line, true));
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}
?>
<!doctype html>
<html lang="et">

<head id="page-header">
    <meta charset="UTF-8">
    <title>HW 3 | Task List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body id="task-list-page">
    <?php
    include('nav.php');
    ?>
    <div>
        <table id="tasks-table">
            <h3>Tasks</h3>
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
            <?php
            foreach ($tasks_arr as $task): ?>
                <tr>
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
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php
    include('footer.php')
        ?>
</body>


</html>