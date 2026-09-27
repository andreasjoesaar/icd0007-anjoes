<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['name']) {
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

    if ($_POST['deadline']) {
        $featured = $_POST['featured'];
    }

    $projects_path = 'data/projects.txt';
    if (!$errors) {
        $project_arr = array(
            'name' => $name, 
            'description' => $description, 
            'status' => $status, 
            'deadline' => $deadline,
            'featured' => $featured
            );
        
        file_put_contents($projects_path, PHP_EOL . json_encode($project_arr),FILE_APPEND);

    }
}   

?>

<!doctype html>
<html lang="et">
<header id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project Form</title>

</header>



<body>
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
                <option value="planning">Planning</option>
                <option value="active">Active</option>
                <option value="done">Done</option>
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
            <button type="submit" id="submit-button" name="submit">Submit</button>
        </div>
    </form>
    <?php 
    include('footer.php')
    ?>
</body>


</html>