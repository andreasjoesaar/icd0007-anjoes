<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = trim($_POST['name']) ?? "";
    $email = trim($_POST['email']) ?? "";
    $rating = $_POST['rating'] ?? "";
    $kommentaar = trim($_POST['kommentaar']) ?? "";
    if ($name === '') {
        $errors[] = "Nimeväli ei saa tühjaks jääda";
    }

    if ($email !== '') {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Vale meiliaadressi formaat";
        }
    } else {
        $errors[] = "Meiliaadressi väli ei saa tühjaks jääda";
    }

    if ($rating !== '') {
        if (!is_numeric($rating) || intval($rating) < 0 || intval($rating) > 5) {
            $errors[] = "Hinnang peab olema number vahemikus 1-5";
        }
    } else {
        $errors[] = "Hinnangu väli ei saa tühjaks jääda";
    }

    if ($kommentaar === '') {
        $errors[] = "Kommentaari väli ei saa tühjaks jääda";
    }
}






?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tagasisidevorm</title>
</head>
<body>
<h1>Tagasiside</h1>
<?php if($_SERVER['REQUEST_METHOD'] === "POST" && !$errors):?>
<p id="success" >Tagasiside saadetud edukalt.</p>
<?php endif;?>
<ul id="error-list">
    <?php foreach($errors as $error):?>
    <li> <?php echo $error?></li>
    <?php endforeach; ?>
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
        <select name="rating" value = "">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div>
        <label for="comment">Kommentaar</label>
        <textarea rows="4" cols="50" name="kommentaar"> </textarea>
    </div>
    <button type="submit" name="submit">Saada</button>
</form>
</body>
</html>
