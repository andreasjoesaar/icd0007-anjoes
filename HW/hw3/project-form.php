<?php
$name = $description = $status = $deadline = $priority = "";
$featured = "no";
$projects_path = __DIR__ . '/data/projects.txt';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    if (file_exists($projects_path)) {
        $projects = file($projects_path, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        foreach ($projects as $line) {
            $decoded = json_decode($line, true);
            if (isset($decoded['id']) && $decoded['id'] === $_GET['id']) {
                $name = $decoded['name'] ?? '';
                $description = $decoded['description'] ?? '';
                $status = $decoded['status'] ?? '';
                $deadline = $decoded['deadline'] ?? '';
                $priority = $decoded['priority'] ?? '';
                $featured = $decoded['featured'] ?? false;
                break;
            }
        }
    }
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])) {
        $errors[] = 'Project title is required';
    } else if (strlen($_POST['name']) < 5 || strlen($_POST['name']) > 25) {
        $errors[] = 'Project title must be between 5 and 25 chars';
    }
    $name = $_POST['name'];

    if (empty($_POST['description'])) {
        $errors[] = 'Project decription is required';
    } else if (strlen($_POST['description']) < 5 || strlen($_POST['description']) > 40) {
        $errors[] = 'Project description must be between 5 and 40 chars';
    }
    $description = $_POST['description'];

    if ($_POST['status'] == "") {
        $errors[] = 'Project status is required';
    }
    $status = $_POST['status'];

    if (empty($_POST['deadline'])) {
        $errors[] = 'Project deadline is required';
    } else if (strtotime($_POST['deadline']) < strtotime('today')) {
        $errors[] = 'Project deadline cannot be earlier than today';
    }
    $deadline = $_POST['deadline'];

    if (!empty($_POST['priority'])) {
        $priority = $_POST['priority'];
    } else
        $errors[] = 'Project priority is required';

    $featured = (isset($_POST['featured']) && $_POST['featured'] === 'yes') ? 'yes' : 'no';


    $projects_path = '/data/projects.txt';
    $projects_path_full = __DIR__ . '/data/projects.txt';
    $edit_id = $_POST['id'] ?? $_GET['id'] ?? null;
    if (!$errors) {
        $project_arr = array(
            'id' => $edit_id ? $edit_id : uniqid('proj_'),
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'deadline' => $deadline,
            'featured' => $featured,
            'priority' => $priority
        );

        if ($edit_id && file_exists($projects_path_full)) {
            $new_file_contents = [];
            $file_to_edit_as_arr = file($projects_path_full, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($file_to_edit_as_arr as $line) {
                $decoded = json_decode($line, true);
                if (isset($decoded['id']) && $decoded['id'] === $edit_id) {
                    $new_file_contents[] = json_encode($project_arr, JSON_UNESCAPED_UNICODE) . PHP_EOL;
                } else {
                    $new_file_contents[] = $line . PHP_EOL;
                }
            }
            file_put_contents($projects_path_full, implode("", $new_file_contents));
        } else {
            file_put_contents($projects_path_full, json_encode($project_arr, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
        }

        header('Location: project-list.php');
        exit();
    }
}
?>
<!doctype html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>HW 3 | Project Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body id="project-form-page">
    <?php include('header.php'); ?>
    <?php
    include('nav.php');
    ?>
    <h1> Project form</h1>

    <div class="error-block" id="error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </div>

    <form id="project-form" method="post"
        action="project-form.php<?php echo isset($_GET['id']) ? '?id=' . urlencode($_GET['id']) : ''; ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? $_POST['id'] ?? ''); ?>">
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
                <input type="radio" name="featured" id="project-featured-yes" <?php if ($featured === true || $featured === "yes")
                    echo "checked"; ?> value="yes">
                <label> yes</label>
            </div>
            <div>
                <input type="radio" name="featured" id="project-featured-no" <?php if ($featured === false || $featured === "no" || $featured === "")
                    echo "checked"; ?> value="no">
                <label> no</label>
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