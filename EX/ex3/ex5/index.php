<?php

session_start();


if (isset($_SESSION['username'])) {
    echo "Username: " . $_SESSION['username'];
}

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}

if (!isset($_COOKIE['count'])) {
    print("<p>Tegu on esimese külastusega</p>");
    $count = 1;
    setcookie('count', $count, time() + 3600);
} else {
    print("<p>Tegu on mitmenda külastusega</p>");
    $count = ++$_COOKIE['count'];
    setcookie('count', $count, time() + 3600);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
</head>

<body>
    <div>
        <h3>Loendur:</h3>
        <?php echo $count;
        ?>
    </div> <br>
    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" name="username">
        <input type="submit" name="submit"><br><br>
    </form>
</body>