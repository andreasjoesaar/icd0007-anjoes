<?php
declare(strict_types=1);

function readNotice(?string $filename = null): string
{
    $notice = "";
    if (!$filename) {
        return "";
    }
    if (file_exists($filename)){
        try {
        $notice = file_get_contents($filename);
        } catch (Exception $e) {
            echo "$e is exception!";
        }
    } 
    
   

    /*
    $handle = null;
    $notice_arr = [];
    try {
        $handle = fopen($filename, 'r');

        while (!feof($handle)) {
            $txt_line = fgets($handle);
            array_push($notice_arr, $txt_line);
        }
    } catch (Exception $e) {
        echo "$e is exception!";
    } finally {
        if ($handle)
            fclose($handle);
    }
    */
    return $notice;
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    echo readNotice(__DIR__ . '/data/notice.txt');
}
