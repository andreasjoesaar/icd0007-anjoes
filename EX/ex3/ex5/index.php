<?php

session_start();


if (isset($_SESSION['nickname'])) {
    echo "nickname: " . $_SESSION['nickname'];
}

if (isset($_POST['nickname'])) {
    $_SESSION['nickname'] = $_POST['nickname'];
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
        <label for="nickname">nickname</label>
        <input type="text" name="nickname" >
        <input type="submit" name="submit"><br><br>
    </form>
</body>
</html>