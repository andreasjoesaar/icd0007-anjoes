<?php

declare(strict_types=1);

$directory = $argv[1] ?? null;

while (true) {
    
    try {
        $dir_array = scandir($directory);
    } catch (Exception $e) {
        echo "Incorrect path. Try again: " . $e->getMessage() . PHP_EOL;
        continue;
    };

    $files = [];
    $folders = [];
    var_dump($dir_array);
    foreach($dir_array as $file) {
        $file_rel_path = $directory . "/" . $file;
        var_dump($file_rel_path);
        if ($file && $file !== "." && $file !== ".." && $file !== ".DS_Store") {
            if (is_dir($file_rel_path)) {
                array_push($folders, $file_rel_path);
            } else if (is_file($file_rel_path)){
                array_push($files, $file_rel_path);
            } else {
                echo 'Unknown file type detected, skipping ' . PHP_EOL;
                continue;
            }
        };
    }
    
    echo "Files: " . count($files) . PHP_EOL;
    echo "Folders: " . count($folders) . PHP_EOL;
    writeSummary(count($files), count($folders));
    break;
    
};

function writeSummary(int $num_files, int $num_folders) {
    if (!file_exists(__DIR__ . '/' . 'summary.txt')) {
        file_put_contents(__DIR__ . '/' . 'summary.txt', "Files: " . $num_files . PHP_EOL . "Folders: " . $num_folders . PHP_EOL);
    } else {
        echo 'Overwriting existing file... ';
        file_put_contents(__DIR__ . '/' . 'summary.txt', "Files: " . $num_files . PHP_EOL . "Folders: " . $num_folders . PHP_EOL);
    }
}


