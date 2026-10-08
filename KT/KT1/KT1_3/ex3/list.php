<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Külalisraamat</title>
</head>
<body>

<h2>Külalisraamat</h2>

<ul>
    <?php foreach ($items as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<form method="POST" action="">
    <input type="text" name="item" placeholder="Kirjuta sõnum">
    <button type="submit" name="lisa">Lisa</button>
</form>

</body>
</html>
