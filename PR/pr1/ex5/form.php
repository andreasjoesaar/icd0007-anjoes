<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Kommentaar</title>
</head>
<body>

<h2>Lisa kommentaar</h2>

<form method="POST" action="">

    <p>
        <label>Nimi</label><br>
        <input type="text" name="nimi" value="<?= htmlspecialchars($values['nimi'] ?? '') ?>">
        <br><span><?= htmlspecialchars($errors['nimi'] ?? '') ?></span>
    </p>

    <p>
        <label>E-post</label><br>
        <input type="text" name="email" value="<?= htmlspecialchars($values['email'] ?? '') ?>">
        <br><span><?= htmlspecialchars($errors['email'] ?? '') ?></span>
    </p>

    <p>
        <label>Veebileht (valikuline)</label><br>
        <input type="text" name="veebileht" value="<?= htmlspecialchars($values['veebileht'] ?? '') ?>">
        <br><span><?= htmlspecialchars($errors['veebileht'] ?? '') ?></span>
    </p>

    <p>
        <label>Pealkiri</label><br>
        <input type="text" name="pealkiri" value="<?= htmlspecialchars($values['pealkiri'] ?? '') ?>">
        <br><span><?= htmlspecialchars($errors['pealkiri'] ?? '') ?></span>
    </p>

    <p>
        <label>Sisu</label><br>
        <textarea name="sisu"><?= htmlspecialchars($values['sisu'] ?? '') ?></textarea>
        <br><span><?= htmlspecialchars($errors['sisu'] ?? '') ?></span>
    </p>

    <button type="submit" name="saada">Saada</button>

</form>

</body>
</html>
