<?php

$incorrect = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    if ($name  === "") {
        $incorrect = true;
    }

    if ($incorrect === false) {
        header("Location: .");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Redirect</title>
</head>
<body>
<h1>Vormi suunamine</h1>

<?php if(!$incorrect && $_SERVER['REQUEST_METHOD'] === "POST"):?>
<p id="success">Tere, <?php echo $name ?>! Vorm esitati edukalt.</p>
<?php endif; ?>

<?php if ($incorrect && $_SERVER['REQUEST_METHOD'] === "POST"): ?>
<p id="error">Nimi ei tohi olla tühi.</p>
<?php endif; ?>



<?php if($incorrect || $_SERVER['REQUEST_METHOD'] !== "POST"): ?>
<form method="post" action="">
    <label for="name">Nimi</label>
    <input type="text" id="name" name="name" value="">
    <button type="submit" name="submit">Saada</button>
</form>

<?php endif;?>


</body>
</html>