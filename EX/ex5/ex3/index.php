<?php
declare(strict_types=1);

function getNumberSummary(string $filename): array
{
    try {
        $file = file($filename);
    } catch (Exception $e) {
        echo "Incorrect path. Exiting" . $e->getMessage() . PHP_EOL;
        return [
            "count" => 0, 
            "min" => 0, 
            "max" => 0, 
            "average" => 0
        ];
    }
    
    $count = 0;
    $sum = 0;
    $numbers = [];
    
    $average = 0;
    foreach($file as $line) {
        if (!$line) {
            continue;
        }

        if (is_numeric($line)) {
            $number = floatval($line);
            $count ++;
            $sum = $sum + $number;
            array_push($numbers, $number);
            
            //var_dump($min, $max . PHP_EOL);

        }
    }
    $min = number_format(min($numbers),2);
    $max = number_format(max($numbers),2);

    if ($count > 0) {
        $average = number_format(round(floatval($sum / $count),2),2);
    }
    //var_dump("$count, $min, $max, $average \n" );

    return [
        "count" => $count, 
        "min" => $min, 
        "max" => $max, 
        "average" => $average
    ];
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $summary = getNumberSummary(__DIR__ . '/data/numbers.txt');
    echo "Count: " . ($summary['count'] ?? 0) . PHP_EOL;
    echo "Min: " . ($summary['min'] ?? 0) . PHP_EOL;
    echo "Max: " . ($summary['max'] ?? 0) . PHP_EOL;
    echo "Average: " . ($summary['average'] ?? 0) . PHP_EOL;
}
