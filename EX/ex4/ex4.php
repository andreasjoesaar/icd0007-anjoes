<?php

$redirect = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    if ($name  === "") {
        $errors[] = "Nimi ei tohi olla tühi.";
    }
    if ($errors === []) {
        $redirect = true;
    }
}
if ($redirect) {
    header('Location: /' . $name);
    exit();
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

<?php if ($redirect) :?>
<p id="success">Tere, <?php echo $name ?>! Vorm esitati edukalt.</p>

<?php else :?>
<p id="error"><?php foreach($errors as $error):?></p>
<p><?php echo $error?></p>
<?php endforeach;?>

<form method="post" action="">
    <label for="name">Nimi</label>
    <input type="text" id="name" name="name" value="">
    <button type="submit" name="submit">Saada</button>
</form>
<?php endif;?>

</body>
</html>