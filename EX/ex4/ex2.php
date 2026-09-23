<?php

$items = [
    'PHP veebiserver',
    'HTTP päring',
    'GET parameeter',
    'POST vorm',
    'Veebivormide valideerimine',
    'HTTP staatusekood',
];

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Filtreerimine GET abil</title>
</head>
<body>
<form method="get" action="">
    <label for="query">Otsi</label>
    <input type="text" id="query" name="query" value="TODO">
    <button type="submit" name="submit">Otsi</button>
</form>

<ul>
    <!-- filtreeritud andmete kuvamine -->
    <?php foreach ($items as $item): ?>
        <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
    <?php endforeach; ?>

</ul>
</body>
</html>