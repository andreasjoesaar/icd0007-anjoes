<?php
function getAverage(string $filename) : float
{
    $sum = 0;
    $count = 0;
    $avg = 0.0;

    try {
        $rows = file("data/$filename");
    } catch (Exception $e) {
        echo "Unable to open file" . $e->getMessage() . PHP_EOL;
        return 0.0;
    }

    foreach ($rows as $row) {
        if (is_int($row)) {
            $sum += $row;
            $count += 1;
        } else if (is_string($row)) {
            try {
                $sum += intval(trim($row));
                $count += 1;
            } catch (Exception $e) {
                echo "Unable to get value from string: " . $e->getMessage() . PHP_EOL;
                continue;
            }
        } else if ($row == null) {
            continue;
        }
    }

    if ($count > 0) $avg = ($sum / $count);
    var_dump($avg);
    return $avg;
}