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
    <title>HW 2</title>
</head>

<body id="dashboard-page">
    <?php
    include('nav.php')
        ?>


    <p id="welcome-text">
        Welcome to the task manager
    </p>
    <table>
        
        
            <td id="overview-block-1">
                <h3>Nr of projects:</h3>
                <p>
                    <?php echo $project_count ?>
                </p>
            </td>
        
        
    </table>    

    <div id="overview-block-2">
        <h3>Nr of tasks</h3>
        <?php echo $task_count?>
    </div>

    <div id="overview-block-3">
        <h3>Nr Done</h3>
        <?php echo $done_count?>

    </div>

    <table border="1px" id="tasks-table">
        Last tasks
        <!--
        TODO: txt faili parser
        -->
        <tr>
            <th> Task name</th>
            <th> Date </th>
        </tr>
        <tr>
            <td> Task 1</td>
            <td> 13.09.2026</td>
        </tr>
        <tr>
            <td> Task 2</td>
            <td> 20.09.2026</td>
        </tr>


    </table>

    <?php 
    include('footer.php')
    ?>
</body>

</html>