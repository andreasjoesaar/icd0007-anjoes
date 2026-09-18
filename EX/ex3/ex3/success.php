<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
    </head>

    <body>
        <p>
            Tere, 
            <?php if (isset($_GET['name'])): 
                echo htmlspecialchars($_GET['name']); ?>
            <?php endif; ?>
            
            <a href="index.php"> Go back</a>
        </p>
    </body>
    
</html>