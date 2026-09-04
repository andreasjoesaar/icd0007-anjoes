<?php
function getAverage(string $filename) : float
{
    $sum = 0.0;
    $count = 0.0;
    $avg = 0.0;

    
    
    try {
        $rows = file("data/$filename");
    } catch (Exception $e) {
        echo "Unable to open file" . $e->getMessage() . PHP_EOL;
        return 0.0;
    }

    foreach ($rows as $row) {
        if (gettype($row) == "integer") {
            $sum += $row;
            $count += 1;
            var_dump($row);
        } else if (gettype($row) == "string") {
            try {
                $sum += intval(trim($row));
                $count += 1;
                var_dump($row);
            } catch (Exception $e) {
                echo "Unable to get value from string: " . $e->getMessage() . PHP_EOL;
                continue;
            }
        } else if ($row === null) {
            continue;
        }
        var_dump($sum, $count);
    }



    if ($count > 0) {
        $avg = floatval($sum / $count);
    };

    return $avg;
}
