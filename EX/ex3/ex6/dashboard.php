<?php
declare(strict_types=1);

session_start();

if (empty($_SESSION['username'])) {
    header('Location:login.php');
    exit();
}

$activePage = 'dashboard';
$username = $_SESSION['username'];
?>
<!doctype html>
<html lang="et">

<head>
    <meta charset="utf-8">
    <title>Töölaud</title>
</head>
<?php include('partials/header.php') ?>
<?php include('partials/nav.php') ?>

<body>
    <main>
        <h1>Tere, <?= htmlspecialchars($username) ?>!</h1>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </main>
</body>
<?php include('partials/footer.php') ?>
</html>