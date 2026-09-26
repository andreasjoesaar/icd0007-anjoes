<!doctype html>
<html lang="et">
<header id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Project Form</title>

</header>

<?php 
include('nav.php');
?>

<body>
    <h1> Project form</h1>
    <form id="project-form">
        <div>
            Title
            <input type="text" id="project-name">
        </div>

        <div>
            Description
            <textarea id="project-description"></textarea>
        </div>

        <div>
            Status
            <select id="project-status">
                <option value="not-late">Not Late</option>
                <option value="late">Late</option>
            </select>
        </div>

        <div>
            Deadline
            <input type="date" id="project-deadline">
        </div>

        <div>
            Featured
            <input type="radio" name="featured" id="project-featured">
        </div>
        <div>
            <button type="submit" id="submit-button">Submit</button>
        </div>
    </form>
</body>

<?php 
include('footer.php')
?>
</html>