<?php

$success = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    if ($name  !== "") {
        $success = true;
    }

    if ($success === true) {
        $success = false;
        header("Location: /$name");
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
<?php if($success): ?>
<p id="success">Tere, <?php echo $nimi ?>! Vorm esitati edukalt.</p>
<?php endif; ?>
<?php if (!$success && $_SERVER['REQUEST_METHOD'] === "POST"): ?>
<p id="error">Nimi ei tohi olla tühi.</p>
<?php endif; ?>
<form method="post" action="">
    <label for="name">Nimi</label>
    <input type="text" id="name" name="name" value="">
    <button type="submit" name="submit">Saada</button>
</form>
</body>
</html>