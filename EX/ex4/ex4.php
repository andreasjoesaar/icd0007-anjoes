<?php

// Siia tuleb kood. Muuda HTML-i vastavalt vajadusele

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Redirect</title>
</head>
<body>
<h1>Vormi suunamine</h1>
<p id="success">Tere, Nimi! Vorm esitati edukalt.</p>
<p id="error">Nimi ei tohi olla tühi.</p>
<form method="post" action="">
    <label for="name">Nimi</label>
    <input type="text" id="name" name="name" value="">
    <button type="submit" name="submit">Saada</button>
</form>
</body>
</html>