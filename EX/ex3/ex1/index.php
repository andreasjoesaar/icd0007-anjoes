<?php
declare(strict_types=1);

require_once __DIR__ . '/lib.php';

$rows = getServerInfoRows($_SERVER);

?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Server Info</title>
</head>
<body>
<h1>Serveri info</h1>
<table border="1" cellpadding="8">
    <tr>
        <th>Väli</th>
        <th>Väärtus</th>
    </tr>
    <?php foreach($rows as $field => $data): ?> 
        <tr>
            <td><?php echo $field; ?></td>
            <td><?php echo $data; ?></td>
        </tr>
     <?php endforeach; ?>
    
</table>
</body>
</html>