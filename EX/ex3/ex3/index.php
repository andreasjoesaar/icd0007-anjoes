<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    header('Location: success.php?name=' . urlencode($name));
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
</head>

<body>
    <form method="post" action="http://localhost:8000/">
        <input name="name">
        <input type="submit" name="Submit" />
    </form>
</body>