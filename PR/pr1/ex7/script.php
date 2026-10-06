<?php

$opts = getopt('a:b:t:', ['arv1:', 'arv2:', 'tehe:']);

$arv1 = $opts['arv1'] ?? $opts['a'] ?? null;
$arv2 = $opts['arv2'] ?? $opts['b'] ?? null;
$tehe = $opts['tehe'] ?? $opts['t'] ?? null;

$error = "";
$tulemus = "";
$operaator = "";

if ($arv1 === null){
    $error = "viga! Arv 1 puudu!";
}

if ($arv2 === null){
    $error = "viga! Arv 2 puudu!";
}

if (!$error) {
    switch ($tehe) {
    case "liida":  
        $tulemus = $arv1 + $arv2;
        $operaator = "+";
        break;
        
    case "lahuta" :
        $tulemus = $arv1 - $arv2;
        $operaator = "-";
        break;
    case "korruta" : 
        $tulemus = round(($arv1 * $arv2),2);
        $operaator = "*";
        break;
    case "jaga" :
        if (intval($arv2) !== 0) {
            $tulemus = round(($arv1 / $arv2), 2);
            $operaator = "/";
        } else {
            $error = "viga! Nulliga jagada ei saa!";
        }
        break;
    default :
        $error = "viga! Võimalikud tehted: 'liida', 'lahuta', 'korruta', 'jaga'";
        break;
    }
}

if ($error) {
    echo($error . PHP_EOL);
} else if ($tulemus && $operaator) {
    echo($arv1 . ' ' .  $operaator . ' ' . $arv2  . ' = ' . $tulemus . PHP_EOL);
} else {
    echo("Tundmatu viga!" . PHP_EOL);
}