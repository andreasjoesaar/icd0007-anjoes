<?php
$project_names = [];
$projects_file = __DIR__. '/data/projects.txt';
$title = $project = $status = $due = $description = $priority = $complexity = $owner = "";


if (file_exists($projects_file)) {
        $projects = file($projects_file, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        foreach($projects as $json_line) {
            $decoded = json_decode($json_line, true);
            if ($decoded && isset($decoded['name'])) {
                array_push($project_names, $decoded['name']);
            }
        }
    }


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $edit = true;
    $task_idx = $_GET['id'];
    $tasks_path = __DIR__ . '/data/tasks.txt';
    $tasks = file($tasks_path);

    $task_to_edit = [];
    foreach ($tasks as $line) {
        $decoded = json_decode($line, true);
        if (isset($decoded['id']) && $decoded['id'] === $_GET['id']) {
            $task_to_edit = $decoded;
            break;
        }
    }

    if (!empty($task_to_edit)) {
        $title = $task_to_edit['title'] ?? '';
        $project = $task_to_edit['project'] ?? '';
        $description = $task_to_edit['description'] ?? '';
        $status = $task_to_edit['status'] ?? '';
        $priority = $task_to_edit['priority'] ?? '';
        $due = $task_to_edit['due'] ?? '';
        $complexity = $task_to_edit['complexity'] ?? '';
        $owner = $task_to_edit['owner'] ?? '';
    }
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['title'])) {
        $errors[] = 'Task title is required';
    } else if (strlen($_POST['title']) < 5 || strlen($_POST['title']) > 25) {
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
    } else if (strtotime($_POST['due']) < strtotime('today')) {
        $errors[] = 'Task due cannot be earlier than today';
    }
    $due = $_POST['due'];

    if (empty($_POST['description'])) {
        $errors[] = 'Task decription is required';
    } else if (strlen($_POST['description']) < 5 || strlen($_POST['description']) > 40) {
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
    } else if (strlen($_POST['owner']) < 2 || strlen($_POST['owner']) > 22) {
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

    $tasks_path = __DIR__ . '/data/tasks.txt';
    $edit_id = $_POST['id'] ?? $_GET['id'] ?? null;
    if (!$errors) {
        $task_arr = array(
            'title' => $title,
            'project' => $project,
            'description' => $description,
            'status' => $status,
            'priority' => $priority,
            'due' => $due,
            'complexity' => $complexity,
            'owner' => $owner,
            'id' => $edit_id ? $edit_id : uniqid('task_')
        );

        if (!$edit_id) {
            file_put_contents($tasks_path, json_encode($task_arr, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
        } else {
            $new_file_contents = [];
            $file_to_edit_as_arr = file($tasks_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($file_to_edit_as_arr as $line) {
                $decoded = json_decode($line, true);
                if (isset($decoded['id']) && $decoded['id'] === $edit_id) {
                    // This is the one we are editing, push the NEW data instead
                    // Make sure $task_arr includes the ID: $task_arr['id'] = $_GET['id'];
                    $new_file_contents[] = json_encode($task_arr, JSON_UNESCAPED_UNICODE) . PHP_EOL;
                } else {
                    // Not the one we are editing, keep the OLD line intact
                    $new_file_contents[] = $line . PHP_EOL;
                }
            }
            file_put_contents($tasks_path, implode("", $new_file_contents));
        }
        
        
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

<?php
    include('header.php')
?>

<body id="task-form-page">
    <?php 
    include('nav.php');
    ?>
    <h1> Task form</h1>
    <div class="error-block" id= "error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </div>
    <form id="task-form" method="post" action="task-form.php<?php echo isset($_GET['id']) ? '?id=' . urlencode($_GET['id']) : ''; ?>">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? $_POST['id'] ?? ''); ?>">
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
                <option value="">Select Priority</option>
                <option value="Low" <?php if ($priority === 'Low') echo 'selected'; ?>>Low</option>
                <option value="Medium" <?php if ($priority === 'Medium') echo 'selected'; ?>>Medium</option>
                <option value="High" <?php if ($priority === 'High') echo 'selected'; ?>>High</option>
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
             <select id="complexity" name="complexity">
                <option value="<?php echo $complexity ?>"><?php echo $complexity ?></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
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