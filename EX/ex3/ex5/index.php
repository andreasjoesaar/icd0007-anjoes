<?php
setcookie('kylastaja', 'Ants', [
    'expires' => time() + 3600,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);


if (!isset($_COOKIE['count'])) {
    $count = 1;
    setcookie('count', $count);
} else {
    $count = ++$_COOKIE['count'];
    setcookie('count', $count);
}

if (isset($_COOKIE['kylastaja'])) {
    print 'Tere, ' . $_COOKIE['kylastaja'];
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
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username">
        <input type="submit" name="submit"><br><br>
    </form>
</body>