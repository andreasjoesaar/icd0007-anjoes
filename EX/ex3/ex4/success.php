<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
    </head>

    <body>
        <p>
            Teade edukalt edastatud.<br>
            Teade:
            <?php echo htmlspecialchars($_GET['message']); ?>
            <a href="../index.php"> Go back</a>
        </p>
    </body>
    
</html>