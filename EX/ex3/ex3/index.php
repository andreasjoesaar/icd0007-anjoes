<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    if (!$name) {
        header('Location: index.php?error=missing_name');
        exit();
    } else {
        header('Location: /success.php?name=' . urlencode($name));
        exit();
    }   
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
</head>

<body>
    <form method="post" action="">
        <input name="name">
        <input type="submit" name="submit" />
    </form>
    <div>
        <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_name'): ?>
        <p id="error">
            No name provided
        </p>
        <?php endif; ?>
    </div>
</body>
</html>