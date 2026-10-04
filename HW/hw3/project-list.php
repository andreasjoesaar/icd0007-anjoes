<?php
$errors = [];
try {
    $projects = file(__DIR__ . '/data/projects.txt');
    $projects_arr = [];
    $project_idx = 0;
    foreach ($projects as $json_line) {
        $json_arr = json_decode($json_line, true);
        $json_arr['project-id'] = $project_idx;
        $project_idx++;
        array_push($projects_arr, $json_arr);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteButton'])) {
        $project_to_delete = intval($_POST['deleteButton']);
        foreach ($projects_arr as $project) {
            if ($project['project-id'] === $project_to_delete) {
                $idx_to_delete = $project['project-id'];
                $title_to_delete = $project['name'];
                delete($idx_to_delete, $title_to_delete);
            }
        }
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}

function delete($index_to_delete, $title_to_delete)
{
    try {
        $projects_path = __DIR__ . '/data/projects.txt';
        $tasks_path = __DIR__ . '/data/tasks.txt';
        $projects = file($projects_path);
        $tasks = file($tasks_path);
        $has_tasks = false;

        foreach($tasks as $task_json) {
            $task_arr = json_decode($task_json, true);
            if ($task_arr['project'] === $title_to_delete) {
                $has_tasks = true;
            }   
        }

        if (!$has_tasks) {
            unset($projects[$index_to_delete]);
            file_put_contents($projects_path, $projects);
            header("Location: project-list.php");
        } else {
            $GLOBALS['errors'][] = "Cannot delete project with one or more tasks";
        }
        
    } catch (Exception $e) {
        echo "Unable to open file" . $e->getMessage() . PHP_EOL;
    }
}

?>
<!doctype html>
<html lang="et">

<head id="page-header">
    <meta charset="UTF-8">
    <title>HW 3 | Project List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
include('header.php')
    ?>

<body id="project-list-page">
    <?php
    include('nav.php');
    ?>
    <div class="error-block" id= "error-block">
        <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endforeach ?>
    </div>
    <table id="projects-table">
        <h3>Projects</h3>
        <?php if ($projects_arr): ?>
        <tr>
            <th name="name">Name</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Priority</th>
        </tr>
        
        <?php else:?>
        <p>No projects yet.</p>
        <?php endif?>
        <?php
        foreach ($projects_arr as $project): ?>
            <form name="deleteId" method="post">
                <tr>
                    <td> <?php echo $project['name'] ?> </td>
                    <td> <?php echo $project['status'] ?> </td>
                    <td> <?php echo $project['deadline'] ?> </td>
                    <td> <?php echo $project['priority'] ?> </td>
                    <td>
                        <button type="submit" name="editButton" value="edit">Edit</button>
                    </td>
                    <td>
                        <button type="submit" class="delete-button" name="deleteButton"
                            value="<?php echo $project['project-id'] ?>">Delete</button>
                    </td>
                </tr>
            </form>
        <?php endforeach ?>
    </table>
    <?php
    include('footer.php')
        ?>
</body>


</html>