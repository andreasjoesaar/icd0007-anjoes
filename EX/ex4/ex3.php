<?php

// Siia tuleb kood. HTML-i muutke vastuvalt vajadusele

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tagasisidevorm</title>
</head>
<body>
<h1>Tagasiside</h1>
<p id="success" >Tagasiside saadetud edukalt.</p>
<ul id="error-list">
    <li>Viga</li>
</ul>
<form method="post" action="">
    <div>
        <label for="name">Nimi</label>
        <input type="text" id="name" name="name" value="">
    </div>
    <div>
        <label for="email">E-post</label>
        <input type="email" id="email" name="email" value="">
    </div>
    <div>
        <label for="rating">Hinnang</label>
        <!--hinnang 1-5 -->
    </div>
    <div>
        <label for="comment">Kommentaar</label>
        <!-- kommentaar -->
    </div>
    <button type="submit" name="submit">Saada</button>
</form>
</body>
</html>
