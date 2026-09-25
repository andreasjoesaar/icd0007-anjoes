<?php
$errors = [];
if (isset($_GET['name'])) {
    $name = trim($_GET['name']) ?? "Külaline";
} else {
    $errors[] = 'Nime ei leitud';
    $name = "Külaline";
} 

$method = '';
$script = '';
$query = '';



if (isset($_SERVER['REQUEST_METHOD'])) {
    $method = $_SERVER['REQUEST_METHOD'];
}
if (isset($_SERVER['SCRIPT_NAME'])) {
    $script = $_SERVER['SCRIPT_NAME'];
}
if (isset($_SERVER['QUERY_STRING'])) {
    $query = $_SERVER['QUERY_STRING'];
} 
    

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Päringu info</title>
</head>
<body>
<h1>Tere, <?php echo $name?>!</h1>

<ul>
    <li>Request method: <?php echo $method?></li>
    <li>Script name: <?php echo $script?></li>
    <li>Query string: <?php echo $query?></li>
</ul>
</body>
</html>