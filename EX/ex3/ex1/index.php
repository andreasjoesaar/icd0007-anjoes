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
    <tr>
            <td>Päringumeetod</td>
            <td><?php echo $rows['Päringumeetod']; ?></td>
    </tr>
    <tr>
            <td>Host</td>
            <td><?php echo $rows['Host']; ?></td>
    </tr>
    <tr>
            <td>Serveri port</td>
            <td><?php echo $rows['Serveri port']; ?></td>
    </tr>
    <tr>
            <td>Päringu URL</td>
            <td><?php echo $rows['Päringu URL']; ?></td>
    </tr>
    <tr>
            <td>Serveri port</td>
            <td><?php echo $rows['Skripti asukoht']; ?></td>
    </tr>
    <tr>
            <td>Serveri tarkvara</td>
            <td><?php echo $rows['Serveri tarkvara']; ?></td>
    </tr>
    <tr>
            <td>Dokumendijuure asukoht</td>
            <td><?php echo $rows['Dokumendijuure asukoht']; ?></td>
    </tr>


    <!--
    
    <?php //foreach($rows as $field => $data): ?> 
        <tr>
            <td><?php //echo $field; ?></td>
            <td><?php //echo $data; ?></td>
        </tr>
     <?php //endforeach; ?>
    -->
    
</table>
</body>
</html>