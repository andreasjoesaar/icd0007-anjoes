<?php
$project_names = [];
$projects_file = __DIR__. '/data/projects.txt';
$title = $project = $status = $due = $description = $priority = $complexity = $owner = "";

if (file_exists($projects_file)) {
    $projects = file($projects_file, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    foreach($projects as $json_line) {
    if (json_decode($json_line,true)['name']) {
        array_push($project_names, json_decode($json_line,true)['name']);
    }
}

}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['title'])) {
        $errors[] = 'Task title is required';
    } else if (strlen($_POST['title']) <= 5 || strlen($_POST['title']) > 25) {
        $errors[] = 'Task title must be between 5 and 25 chars';
    }
    $title = $_POST['title'];

    $project = $_POST['project'] ?? "";

    if ($_POST['status'] == "") {
        $errors[] = 'Task status is required';
    }
    $status = $_POST['status'];

    if ($_POST['priority'] == "") {
        $errors[] = 'Task priority is required';
    }
    $priority = $_POST['priority'];

    if (empty($_POST['due'])) {
        $errors[] = 'Task due is required';
    } else if (strtotime($_POST['due']) < time()) {
        $errors[] = 'Task due cannot be earlier than today';
    }
    $due = $_POST['due'];

    if (empty($_POST['description'])) {
        $errors[] = 'Task decription is required';
    } else if (strlen($_POST['description']) <= 5 || strlen($_POST['description']) > 40) {
        $errors[] = 'Task description must be between 5 and 40 chars';
    }
    $description = $_POST['description'];

    if (!empty($_POST['complexity'])) {
        $complexity = $_POST['complexity'];
    } else {
        $errors[] = 'Task complexity is required';
    }
    $complexity = $_POST['complexity'];

    if (empty($_POST['owner'])) {
        $errors[] = 'Task owner is required';
    } else if (strlen($_POST['owner']) <= 2 || strlen($_POST['owner']) > 22) {
        $errors[] = 'Task owner must be between 5 and 40 chars';
    }
    $owner = $_POST['owner'];

    /* 
    Need kõik validationid tuleks teha !empty()-ga
    if (!empty($_POST['title'])) {
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
    */
    /*
    $title = $_POST['title'] ?? "";
    
    $description = $_POST['description'] ?? "";
    $status = $_POST['status'] ?? "";
    $priority = $_POST['priority'] ?? "";
    $due = $_POST['due'] ?? "";
    $complexity = $_POST['complexity'] ?? "";
    $owner = $_POST['owner'] ?? "";
    */

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
        
        file_put_contents(__DIR__ . $tasks_path, json_encode($task_arr, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
        header('Location: task-list.php');
        exit();
    }
}   
?>
<!doctype html>
<html lang="et">
<head id = "page-header">
    <meta charset="UTF-8">
    <title>HW 3 | Task Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>



<body id="task-form-page">
    <?php 
    include('nav.php');
    ?>
    <h1> Task form</h1>
    <block class="error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </block>
    <form id="task-form" method="post">
        <div>
            Task
            <input type="text" id="task-title" name="title" value="<?php echo $title ?>">
        </div>

        <div>
            Project
            <select id="task-project" name="project">
                <option value="<?php echo $project ?>"><?php echo $project ?></option>
                <?php foreach($project_names as $project_name):?>
                <option value="<?php echo htmlspecialchars($project_name); ?>"><?php echo htmlspecialchars($project_name); ?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div>
            Status
            <select id="task-status" name="status">
                <option value="<?php echo $status ?>"><?php echo $status ?></option>
                <option value="Planning">Planning</option>
                <option value="Active">Active</option>
                <option value="Done">Done</option>
            </select>
        </div>
        
        <div>
            Priority
            <select id="task-priority" name="priority">
                <option value="<?php echo $priority ?>"><?php echo $priority ?></option>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
            </select>
        </div>

        <div>
            Due
            <input type="date" id="task-due" name="due" value="<?php echo $due ?>">
        </div>

        <div>
            Description
            <textarea id="task-description" name="description"><?php echo $description ?></textarea>
        </div>

        <div>
            Complexity
            <input type="text" id="task-complexity" name="complexity" value="<?php echo $complexity ?>">
        </div>

        <div>
            Owner
            <input type="text" id="task-owner" name="owner" value="<?php echo $owner ?>">
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