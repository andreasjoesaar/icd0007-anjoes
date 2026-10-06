<?php

$errors = [];
$values = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nimi = trim($_POST['nimi']) ?? "";
    if ($nimi === "") {
        $errors['nimi'] = "Nimi ei tohi tühjaks jääda";
    } else if (strlen($nimi) < 2 || strlen($nimi) > 30){
        $errors['nimi'] = "Nime pikkus peab olema 2 kuni 30 tähemärki";
    }


    $email = trim($_POST['email']) ?? "";
    if ($email === "") {
        $errors['email'] = "Email ei tohi tühjaks jääda";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Vale emaili formaat";
    }

    $veebileht = trim($_POST['veebileht']) ?? "";
    $veebileht = filter_var($veebileht, FILTER_SANITIZE_URL);
    if ($veebileht && filter_var($veebileht, FILTER_VALIDATE_URL) === false){
        $errors['veebileht'] = "Vale veebilehe formaat";
    }

    $pealkiri = trim($_POST['pealkiri']) ?? "";
    if ($pealkiri === "") {
        $errors['pealkiri'] = "Pealkiri ei tohi olla tühi";
    } else if (strlen($pealkiri) < 3 || strlen($pealkiri) > 60){
        $errors['pealkiri'] = "Pealkirja pikkus peab olema 3 kuni 60 tähemärki";
    }

    $sisu = trim($_POST['sisu']) ?? "";
    if ($sisu === "") {
        $errors['sisu'] = "Sisu ei tohi olla tühi";
    } else if (strlen($sisu) < 10 || strlen($sisu) > 500){
        $errors['sisu'] = "Sisu pikkus peab olema 10 kuni 500 tähemärki";
    }

    $values = [
        'nimi' => $nimi,
        'email' => $email,
        'veebileht' => $veebileht,
        'pealkiri' => $pealkiri,
        'sisu' => $sisu
    ];

    if (empty($errors)) {
        header('Location: success.php');
        exit;
    }
}

require_once __DIR__ . '/form.php';
