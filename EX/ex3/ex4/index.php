<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    if (empty($_POST['name'])) {
        $errors['name'] = "No name provided";
    }
    if (empty($_POST['email'])) {
        $errors['email'] = "No email provided";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Wrong email format";        
    }
    if (empty($_POST['message'])) {
        $errors['message'] = "No message provided";
    } else if (strlen($_POST['message'])< 10) {
        $errors['message'] = "Message too short";
    }
    if (empty($errors)) {
        $message = $_POST['message'];
        header('Location: success.php/?message='.urldecode($message));
        exit();
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
            <?php if (array_key_exists('name', $errors)): ?>
                <p id="error">
                    <?php echo $errors['name'];?>
                </p>
            <?php endif; ?>
        </div>

        <label for="email">Email</label>
        <input name="email" type="email" ><br><br>

        <div>
            <?php if (array_key_exists('email', $errors)): ?>
                <h3 id="error">
                    <?php echo $errors['email'];?>
                </h3>
            <?php endif; ?>
        </div>

        <label for="message">Message</label>
        <input name="message" type="textarea"><br><br>
        <div>
            <?php if (array_key_exists('message', $errors)): ?>
                <h3 id="error">
                    <?php echo $errors['message']; ?>
                </h3>    
            <?php endif; ?>
        </div>
        <input type="submit" name="submit"><br><br>

    </form>

</body>

</html>