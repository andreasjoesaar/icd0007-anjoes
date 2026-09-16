<?php
declare(strict_types=1);

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    // TODO: kontrolli kasutajanime ja parooli

    $error = 'Vale kasutajanimi või parool.';
}
?>
<!doctype html>
<html lang="et">
<head><meta charset="utf-8"><title>Sisselogimine</title></head>
<body>
<h1>Sisselogimine</h1>

<?php if ($error !== ''): ?>
    <p id="login-error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <label for="username">Kasutajanimi</label>
    <input id="username" name="username" type="text">

    <label for="password">Parool</label>
    <input id="password" name="password" type="password">

    <button type="submit" name="submit">Sisene</button>
</form>
</body>
</html>
