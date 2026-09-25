<?php

$items = [
    'PHP veebiserver',
    'HTTP päring',
    'GET parameeter',
    'POST vorm',
    'Veebivormide valideerimine',
    'HTTP staatusekood',
];

$items_to_emit = [];
if (isset($_GET['query'])) {
    var_dump($_GET['query']);
    $query_array = explode(" ", strtoupper(trim($_GET['query'])));
    foreach ($query_array as $query_word) {
        foreach ($items as $sentence) {
            $sentence_as_array = explode(" ",strtoupper($sentence));
            if (in_array($query_word, $sentence_as_array)) {
                var_dump($query_word);
                array_push($items_to_emit,$sentence);
            }
        }
    }
}


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
    <input type="text" id="query" name="query" value="">
    <button type="submit" name="submit">Otsi</button>
</form>

<ul>
    <!-- filtreeritud andmete kuvamine -->
    <?php foreach ($items_to_emit as $item): ?>
        <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
    <?php endforeach; ?>

</ul>
</body>
</html>