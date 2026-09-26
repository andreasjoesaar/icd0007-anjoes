<!doctype html>
<html lang="et">
<header id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project List</title>

</header>
<?php 
include('nav.php');
?>
<body>
    <table id="projects-table">
        <h3>Projects</h3>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Priority</th>
        </tr>
        <tr>
            <td>This homework</td>
            <td>Late</td>
            <td>13.09.2026</td>
            <td>high</td>
        </tr>
        <tr>
            <td>Next homework</td>
            <td>Not late</td>
            <td>20.09.2026</td>
            <td>medium</td>
        </tr>
    </table>
</body>

<?php 
include('footer.php')
?>
</html>