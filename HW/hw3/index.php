<?php
try {
    $projects = file(__DIR__ . '/data/projects.txt');
    $project_arr = [];
    $project_count = 0;
    $done_count = 0;
    foreach ($projects as $json_line) {
        $project_count++;
        array_push($project_arr, json_decode($json_line, true)['name']);
        if (json_decode($json_line, true)['status'] == 'Done') {
            $done_count++;
        }
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}

try {
    $tasks = file(__DIR__ . '/data/tasks.txt');
    $task_count = 0;
    foreach ($tasks as $json_line) {
        $task_count++;
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}


?>
<!doctype html>
<html lang="et">

<head id="page-header">
    <meta charset="UTF-8">
    <title>HW 3</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
    include('header.php')
?>

<body id="dashboard-page">
    <?php
    include('nav.php')
        ?>

    <p id="welcome-text">
        Welcome to the task manager
    </p>

    <div class="overview-blocks">
        <div class="overview-block" id="overview-block-1">
            <a href="project-list.php"><h3>Nr of projects:</h3></a>
            <p>
                <?php echo $project_count ?>
            </p>
        </div>
        <div class="overview-block" id="overview-block-2">
            <a href="task-list.php"><h3>Nr of tasks:</h3></a>
            <p>
                <?php echo $task_count ?>
            </p>
        </div>
        <div class ="overview-block" id="overview-block-3">
            <h3>Nr Done</h3>
            <p>
                <?php echo $done_count ?>
            </p>
        </div>
    </div>

    <?php
    include('footer.php')
        ?>
</body>

</html>