<?php
declare(strict_types=1);

function getAverageHoursByRole(string $filename): array
{
    $jobs_matrix = [];
    $avgs = [];
    $handle = null;
    try {
        $handle = fopen($filename, 'r');
        $row_count = 0;
        while (!feof($handle)) {
            $csv_line = fgetcsv($handle, escape: "");
            if (!$csv_line) {
                continue;
            }
            //var_dump($csv_line);

            if ($row_count === 0) { // Skip header row
                $row_count++;
                continue;
            }

            $job = $csv_line[0];
            $hours = $csv_line[1];
            $found_job = false;
            if ($jobs_matrix) {
                $jobs_total = count($jobs_matrix[0]);
                for($i = 0; $i < $jobs_total; $i++) {
                    if ($jobs_matrix[0][$i] === $job) {
                        $jobs_matrix[1][$i] += $hours;
                        $jobs_matrix[2][$i] ++;
                        $found_job = true;
                    }
                }
                if (!$found_job) {
                    $jobs_matrix[0][$jobs_total] = $job;
                    $jobs_matrix[1][$jobs_total] = $hours;
                    $jobs_matrix[2][$jobs_total] = 1;
                }
            } else {
                $jobs_matrix[0][0] = $job;
                $jobs_matrix[1][0] = $hours;
                $jobs_matrix[2][0] = 1;
            }
        
        }
        
        //var_dump($avgs);
    } catch (Exception $e) {
        echo "$e is exception!";
    } finally {
        if ($handle)
            fclose($handle);
    }
    //var_dump($jobs_matrix);
    for($i = 0; $i < $jobs_total+1; $i++) {
        if (empty($jobs_matrix[0][$i])) {
            break;
        }
        $role = $jobs_matrix[0][$i];
        $avg = round($jobs_matrix[1][$i] / $jobs_matrix[2][$i],2);
        var_dump($avg);
        $avgs[$role] = $avg;
    }
    
    return $avgs;
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $result = getAverageHoursByRole(__DIR__ . '/data/workload.csv');
    foreach ($result as $role => $average) {
        echo $role . ': ' . $average . PHP_EOL;
    }
}
