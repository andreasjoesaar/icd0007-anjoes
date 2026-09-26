<?php


?>

<!doctype html>
<html lang="et">
<header id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2</title>

</header>


<?php 
include('nav.php')
?>

<body id="dashboard-page">
    <p id="welcome-text">
        Welcome to the task manager
    </p>

    <div id="overview-block-1">
        Plokk 1
    </div>

    <div id="overview-block-2">
        Plokk 3
    </div>

    <div id="overview-block-3">
        Plokk 3
    </div>

    <table border="1px" id="tasks-table">
        Last tasks
        <!--
        TODO: txt faili parser
        -->
        <tr>
            <th> Task name</th>
            <th> Date </th>
        </tr>
        <tr>
            <td> Task 1</td>
            <td> 13.09.2026</td>
        </tr>
        <tr>
            <td> Task 2</td>
            <td> 20.09.2026</td>
        </tr>


    </table>

</body>
<?php 
include('footer.php')
?>
</html>