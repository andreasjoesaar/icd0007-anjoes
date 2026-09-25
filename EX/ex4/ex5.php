<?php

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    switch ($status) {
        case "404" :
            http_response_code($status);
            $explanation = "Not Found";
            break;
        case "500" :
            http_response_code($status);
            $explanation = "Internal Server Error";
            break;
        case "200" :
            http_response_code($status);
            $explanation = "OK";
            break;
    }

} else {
    $status = "200";
    http_response_code($status);
    $explanation = "OK";
}




?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>HTTP staatus</title>
</head>
<body>
<h1 id="status-code">HTTP staatus: <?php echo $status ?></h1>
<p id="explanation"> <?php echo $explanation ?> </p>
</body>
</html>
