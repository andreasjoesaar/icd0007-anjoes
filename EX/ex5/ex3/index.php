<?php
declare(strict_types=1);

function getNumberSummary(string $filename): array
{
    return [];
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $summary = getNumberSummary(__DIR__ . '/data/numbers.txt');
    echo "Count: " . ($summary['count'] ?? 0) . PHP_EOL;
    echo "Min: " . ($summary['min'] ?? 0) . PHP_EOL;
    echo "Max: " . ($summary['max'] ?? 0) . PHP_EOL;
    echo "Average: " . ($summary['average'] ?? 0) . PHP_EOL;
}
