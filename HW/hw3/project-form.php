<?php
$name = $description = $status = $deadline = $priority = "";
$featured = "no";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])) {
        $errors[] = 'Project title is required';
    } else if (strlen($_POST['name']) <= 5 || strlen($_POST['name']) > 25) {
        $errors[] = 'Project title must be between 5 and 25 chars';
    }
    $name = $_POST['name'];

    if (empty($_POST['description'])) {
        $errors[] = 'Project decription is required';
    } else if (strlen($_POST['description']) <= 5 || strlen($_POST['description']) > 40) {
        $errors[] = 'Project description must be between 5 and 40 chars';
    }
    $description = $_POST['description'];

    if ($_POST['status'] == "") {
        $errors[] = 'Project status is required';
    }
    $status = $_POST['status'];

    if (empty($_POST['deadline'])) {
        $errors[] = 'Project deadline is required';
    } else if (strtotime($_POST['deadline']) < time()) {
        $errors[] = 'Project deadline cannot be earlier than today';
    }
    $deadline = $_POST['deadline'];

    if (!empty($_POST['priority'])) {
        $priority = $_POST['priority'];
    } else
        $errors[] = 'Project priority is required';

    if (!isset($_POST['featured']) || $_POST['featured'] == false) {
        $featured = false;
    } else {
        $featured = true;
    }

    /*
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? '';
    $deadline = $_POST['deadline'] ?? '';
    $priority = $_POST['priority'] ?? '';
    */

    $projects_path = '/data/projects.txt';
    if (!$errors) {
        $project_arr = array(
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'deadline' => $deadline,
            'featured' => $featured,
            'priority' => $priority
        );

        file_put_contents(__DIR__ . $projects_path, json_encode($project_arr) . PHP_EOL, FILE_APPEND);
        header('Location: project-list.php');
        exit();
    }
}
?>
<!doctype html>
<html lang="et">

<head id="page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>



<body id="project-form-page">
    <?php
    include('nav.php');
    ?>
    <h1> Project form</h1>

    <block class="error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </block>

    <form id="project-form" method="post">
        <div>
            Title
            <input type="text" id="project-name" name="name" value="<?php echo $name ?>">
        </div>

        <div>
            Description
            <textarea id="project-description" name="description"><?php echo $description ?></textarea>
        </div>

        <div>
            Status
            <select id="project-status" name="status">
                <option value="<?php echo $status ?>"> <?php echo $status ?></option>
                <option value="Planning">Planning</option>
                <option value="Active">Active</option>
                <option value="Done">Done</option>
            </select>
        </div>

        <div>
            Deadline
            <input type="date" id="project-deadline" name="deadline" value="<?php echo $deadline ?>">
        </div>

        <div>
            Featured
            <div>
                <input type="radio" name="project-featured" id="project-featured" value="">
                <label> Yes</label>
            </div>
            <div>
                <input type="radio" name="project-featured" id="project-featured" value="">
                <label> No</label>
            </div>

        </div>
        <div>
            Priority
            <select id="project-priority" name="priority">
                <option value="<?php echo $priority ?>"><?php echo $priority ?></option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
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