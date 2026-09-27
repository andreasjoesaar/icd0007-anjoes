<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else $errors[] = 'Project title is required';

    if ($_POST['description']) {
        $description = $_POST['description'];
    } else $errors[] = 'Project description is required';

    if ($_POST['status']) {
        $status = $_POST['status'];
    } else $errors[] = 'Project status is required';

    if ($_POST['deadline']) {
        $deadline = $_POST['deadline'];
    } else $errors[] = 'Project deadline is required';

    if ($_POST['priority']) {
        $priority = $_POST['priority'];
    } else $errors[] = 'Project priority is required';

    if ($_POST['featured']) {
        $featured = $_POST['featured'];
    }
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
        
        file_put_contents(__DIR__ . $projects_path, json_encode($project_arr) . PHP_EOL,FILE_APPEND);
        header('Location: project-list.php');
        exit();
    }
}
?>
<!doctype html>
<html lang="et">
<head id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project Form</title>

</head>



<body id="project-form-page">
    <?php 
    include('nav.php');
    ?>
    <h1> Project form</h1>
    <form id="project-form" method="post">
        <div>
            Title
            <input type="text" id="project-name" name="name">
        </div>

        <div>
            Description
            <textarea id="project-description" name="description"></textarea>
        </div>

        <div>
            Status
            <select id="project-status" name="status">
                <option value="Planning">Planning</option>
                <option value="Active">Active</option>
                <option value="Done">Done</option>
            </select>
        </div>

        <div>
            Deadline
            <input type="date" id="project-deadline" name="deadline">
        </div>

        <div>
            Featured
            <input type="radio" name="featured" id="project-featured">
        </div>
        <div>
            Priority
            <select id="project-priority" name="priority">
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