<?php

if (isset($_GET['status'])) {
    $http_response_code = $_GET['status'];
    switch ($http_response_code) {
        case "404" :
            $explanation = "Not Found";
            break;
        case "500" :
            $explanation = "Internal Server Error";
            break;
        case "200" :
            $explanation = "OK";
            break;
    }

} else {
    $http_response_code = "200";
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
<h1 id="status-code">HTTP staatus: <?php echo $http_response_code ?></h1>
<p id="explanation"> <?php echo $explanation ?> </p>
</body>
</html>
