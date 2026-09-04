<?php
function countExcellentStudents(string $filename): int
{
    $excellent_count = 0;
    $handle = null;
    try {
        $handle = fopen($filename, 'r');
        $row_count = 0;
        while (!feof($handle)) {
            $row = fgetcsv($handle);
            
            if ($row !== false) {
                if ($row_count == 0) {
                    $row_count ++;
                    continue;
                }
                if ($row[1] == 5) {
                    $excellent_count ++;
                };
                $row_count++;
            }

        }
    } catch (Exception $e) {
        print 'Viga: ' . $e->getMessage();
        return 0;
    } finally {
        if ($handle) fclose($handle);
    }
    var_dump($excellent_count);
    return $excellent_count;
}

countExcellentStudents("data/students.csv");