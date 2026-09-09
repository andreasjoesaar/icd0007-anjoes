<?php

declare(strict_types=1);

$directory = $argv[1] ?? null;
if ($directory === null) {
    fwrite(STDERR, "Usage: php directory-summary.php <path>\n");
    exit(1);
}

while (true) {
    
    if (!is_dir($directory)) {
        fwrite(STDERR, "Directory not found.\n");
        exit(1);
    }

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
    $num_files = count($files);
    $num_folders = count($folders);
    echo "Files: " . $num_files . PHP_EOL;
    echo "Folders: " . $num_folders . PHP_EOL;

    if (!file_exists(__DIR__ . '/' . 'summary.txt')) {
        file_put_contents(__DIR__ . '/' . 'summary.txt', "Files: " . $num_files . PHP_EOL . "Folders: " . $num_folders . PHP_EOL);
    } else {
        echo 'Overwriting existing file... ';
        file_put_contents(__DIR__ . '/' . 'summary.txt', "Files: " . $num_files . PHP_EOL . "Folders: " . $num_folders . PHP_EOL);
    }
    break;
    
};

