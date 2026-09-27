<?php
$project_names = [];
$projects = file(__DIR__. '/data/projects.txt');

foreach($projects as $json_line) {
    if (json_decode($json_line,true)['name']) {
        array_push($project_names, json_decode($json_line,true)['name']);
    }
}


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['title']) {
        $title = $_POST['title'];
    } else $errors[] = 'Task title is required';

    if ($_POST['project']) {
        $project = $_POST['project'];
    } else $errors[] = 'Project description is required';

    if ($_POST['description']) {
        $description = $_POST['description'];
    } else $errors[] = 'Task description is required';

    if ($_POST['status']) {
        $status = $_POST['status'];
    } else $errors[] = 'Task status is required';

    if ($_POST['priority']) {
        $priority = $_POST['priority'];
    } else $errors[] = 'Task priority is required';

    if ($_POST['due']) {
        $due = $_POST['due'];
    } else $errors[] = 'Task due is required';

    if ($_POST['complexity']) {
        $complexity = $_POST['complexity'];
    } else $errors[] = 'Task complexity is required';

    if ($_POST['owner']) {
        $owner = $_POST['owner'];
    } else $errors[] = 'Task owner is required';

    $tasks_path = '/data/tasks.txt';
    if (!$errors) {
        $task_arr = array(
            'title' => $title, 
            'project' => $project, 
            'description' => $description, 
            'status' => $status,
            'priority' => $priority,
            'due' => $due,
            'complexity' => $complexity,
            'owner' => $owner
            );
        
        file_put_contents(__DIR__ . $tasks_path, PHP_EOL . json_encode($task_arr),FILE_APPEND);
        header('Location: task-list.php');
        exit();
    }
}   
?>
<!doctype html>
<html lang="et">
<head id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Task Form</title>

</head>



<body id="task-form-page">
    <?php 
    include('nav.php');
    ?>
    <h1> Task form</h1>
    <form id="task-form" method="post">
        <div>
            Task
            <input type="text" id="task-title" name="title">
        </div>

        <div>
            Project
            <select id="task-project" name="project">
                <?php foreach($project_names as $project_name):?>
                <option> <?php echo $project_name ?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div>
            Status
            <select id="task-status" name="status">
                <option value="Planning">Planning</option>
                <option value="Active">Active</option>
                <option value="Done">Done</option>
            </select>
        </div>
        
        <div>
            Priority
            <select id="task-priority" name="priority">
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>
        </div>

        <div>
            Due
            <input type="date" id="task-due" name="due">
        </div>

        <div>
            Description
            <textarea id="task-description" name="description"></textarea>
        </div>

        <div>
            Complexity
            <input type="text" id="task-complexity" name="complexity">
        </div>

        <div>
            Owner
            <input type="text" id="owner" name="owner">
        </div>

        <div>
            <button type="submit" id="submit-button" name="submit">Submit</button>
        </div>
    </form>
    <?php 
    include('footer.php')
    ?>
</body>


</html>