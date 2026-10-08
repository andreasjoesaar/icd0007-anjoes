<?php

$opts = getopt('k:p:', ['kaal:', 'pikkus:']);

$kaal   = $opts['kaal']   ?? $opts['k']   ?? null;
$pikkus = $opts['pikkus'] ?? $opts['p']   ?? null;

// Kirjutage siia ülejäänud kood
