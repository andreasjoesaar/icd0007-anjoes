<?php
declare(strict_types=1);

function getAverageHoursByRole(string $filename): array
{
    return [];
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $result = getAverageHoursByRole(__DIR__ . '/data/workload.csv');
    foreach ($result as $role => $average) {
        echo $role . ': ' . $average . PHP_EOL;
    }
}
