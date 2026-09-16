<?php
declare(strict_types=1);

session_start();

// TODO: kontrolli kas kasutaja on sisse logitud, vastasel juhul suuna login.php-le

$activePage = 'dashboard';
$username = ''; // TODO: võta kasutajanimi sessioonist
?>
<!doctype html>
<html lang="et">
<head><meta charset="utf-8"><title>Töölaud</title></head>
<body>
<main>
    <h1>Tere, <?= htmlspecialchars($username) ?>!</h1>
    <!-- Siia tuleb sisu -->
</main>
</body>
</html>
