<?php
try {
    $projects = file(__DIR__ . '/data/projects.txt');
    $projects_arr = [];
    foreach($projects as $json_line) {
        array_push($projects_arr, json_decode($json_line, true));
    }
} catch (Exception $e) {
    echo "Unable to open file" . $e->getMessage() . PHP_EOL;
}
    

?>
<!doctype html>
<html lang="et">
<head id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project List</title>

</head>

<body id="project-list-page">
    <?php 
    include('nav.php');
    ?>
    <table id="projects-table">
        <h3>Projects</h3>
        <tr>
            <th name="name">Name</th>
            <th >Status</th>
            <th>Deadline</th>
            <th>Priority</th>
        </tr>
        
        <?php 
        foreach($projects_arr as $project):?>
        <tr>
            <td> <?php echo $project['name']?> </td>
            <td> <?php echo $project['status']?> </td>
            <td> <?php echo $project['deadline']?> </td>
            <td> <?php echo $project['priority']?> </td>
        </tr>
        <?php endforeach ?>
    </table>
    <?php 
    include('footer.php')
    ?>
</body>


</html>