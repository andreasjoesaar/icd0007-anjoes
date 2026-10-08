<?php

$opts = getopt('k:p:', ['kaal:', 'pikkus:']);

$kaal   = $opts['kaal']   ?? $opts['k']   ?? null;
$pikkus = $opts['pikkus'] ?? $opts['p']   ?? null;


$error = "";
$kmi = 0;
$kategooria = "";
if ($kaal === null || $kaal == 0) {
    $error = "viga. Kaal on vajalik";
}

if ($pikkus === null || $pikkus == 0) {
    $error = "viga. Pikkus on vajalik";
}

if (strlen($error) === 0) {
    $pikkus = intval($pikkus);
    $kaal = intval($kaal);
    $pikkus_m = $pikkus /100;
    $kmi = $kaal / ($pikkus_m * $pikkus_m);

    
    if ($kmi < 18.5) {
        $kategooria = "Alakaal";
    } else if ($kmi > 18.5 && $kmi <  24.99) {
        $kategooria = "Normaalkaal";
    } else if ($kmi > 25 && $kmi <  29.99) {
        $kategooria = "Ülekaal";
    } else if ($kmi > 30) {
        $kategooria = "Rasvumine";
    }

    print("Kaal: " . number_format($kaal) . " kg" . PHP_EOL);
    print("Pikkus: " . number_format($pikkus) . " cm" . PHP_EOL);
    print("KMI: " . number_format($kmi,2) . PHP_EOL);
    print("Kategooria: " . $kategooria . PHP_EOL);
} else {
    print($error . PHP_EOL);
}
