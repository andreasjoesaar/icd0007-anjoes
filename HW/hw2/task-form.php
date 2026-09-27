<!doctype html>
<html lang="et">
<header id = "page-header">
    <meta charset="UTF-8">
    <title>HW 2 | Task Form</title>

</header>



<body>
    <?php 
    include('nav.php');
    ?>
    <h1> Task form</h1>
    <form id="task-form">
        <div>
            Task
            <input type="text" id="task-title">
        </div>

        <div>
            Project
            <select id="task-project">
                <option value="Project 1">Project 1</option>
                <option value="Project 2">Project 2</option>
            </select>
        </div>

        <div>
            Status
            <select id="task-status">
                <option value="not-late">Not Late</option>
                <option value="late">Late</option>
            </select>
        </div>
        
        <div>
            Priority
            <select id="task-priority">
                <option value="1">low</option>
                <option value="2">medium</option>
                <option value="3">high</option>
            </select>
        </div>

        <div>
            Due
            <input type="date" id="task-due">
        </div>

        <div>
            Description
            <textarea id="task-description"></textarea>
        </div>

        <div>
            <button type="submit" id="submit-button">Submit</button>
        </div>
    </form>
    <?php 
    include('footer.php')
    ?>
</body>


</html>