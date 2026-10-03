<?php
$project_names = [];
$projects_file = __DIR__. '/data/projects.txt';


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

    $title = $_POST['title'] ?? "";
    $project = $_POST['project'] ?? "";
    $description = $_POST['description'] ?? "";
    $status = $_POST['status'] ?? "";
    $priority = $_POST['priority'] ?? "";
    $due = $_POST['due'] ?? "";
    $complexity = $_POST['complexity'] ?? "";
    $owner = $_POST['owner'] ?? "";

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
                <option value="<?php echo htmlspecialchars($project_name); ?>"><?php echo htmlspecialchars($project_name); ?></option>
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
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
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
            <input type="text" id="task-owner" name="owner">
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