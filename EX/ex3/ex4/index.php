<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$_POST['name']) {
        header('Location: index.php?error=missing_name');
    }
    if (!$_POST['email']) {
        header('Location: index.php?error=missing_email');
    }
    if (!$_POST['message']) {
        header('Location: index.php?error=missing_message');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
</head>

<body>
    <form method="post">
        <label for="name">Name</label>
        <input name="name"><br><br>

        <div>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_name'): ?>
                <p id="error">
                    No name provided
                </p>
            <?php endif; ?>
        </div>

        <label for="email">Email</label>
        <input name="email" type="email"><br><br>

        <div>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_email'): ?>
                <p id="error">
                    No email provided
                </p>
            <?php endif; ?>
        </div>

        <label for="message">Message</label>
        <input name="message" type="textarea"><br><br>
        <div>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_message'): ?>
                <p id="error">
                    No message provided
                </p>
            <?php endif; ?>
        </div>
        <input type="submit" name="submit"><br><br>

    </form>

</body>

</html>