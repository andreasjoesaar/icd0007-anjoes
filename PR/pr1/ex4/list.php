<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Soovide nimekiri</title>
</head>
<body>

<h2>Soovide nimekiri</h2>

<ul>
    <?php foreach ($items as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<form method="POST" action="">
    <input type="text" name="item" placeholder="Uus soov">
    <button type="submit" name="lisa">Lisa</button>
</form>

</body>
</html>
