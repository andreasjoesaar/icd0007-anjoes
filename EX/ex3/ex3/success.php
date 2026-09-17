<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
    </head>

    <body>
        <p>
            Tere, 
            <?php echo htmlspecialchars($_GET['name']); ?>
            <a href="index.php"> Go back</a>
        </p>
    </body>
    
    </html>