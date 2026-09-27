<!doctype html>
<html lang="et">
<head id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Task List</title>

</head>


<body>
    <?php 
    include('nav.php');
    ?>
    <div>
        <table id="tasks-table">
            <h3>Tasks</h3>
            <tr>
                <th>Task</th>
                <th>Project</th>
                <th>Status</th>
                <th>Due</th>
                <th>Owner</th>
            </tr>
            <tr>
                <td>This homework</td>
                <td>IDC0007</td>
                <td>Late</td>
                <td>13.09.2026</td>
                <td>Ants</td>
            </tr>
            <tr>
                <td>Next homework</td>
                <td>IDC0007</td>
                <td>Not Late</td>
                <td>20.09.2026</td>
                <td>Ants</td>
            </tr>
        </table>
    </div>
    <?php 
    include('footer.php')
    ?>
</body>


</html>