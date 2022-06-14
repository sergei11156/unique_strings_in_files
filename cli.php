<?php
$first_file_path = $argv[1];
$second_file_path = $argv[2];

create_files_with_unique_str($first_file_path, $second_file_path);

function create_files_with_unique_str($file1_path, $file2_path, $output1_path = 'output1.txt', $output2_path = 'output2.txt')
{
    $file1_handle = fopen($file1_path, 'r');
    $file2_handle = fopen($file2_path, 'r');
    $output1_handle = fopen($output1_path, 'x');
    $output2_handle = fopen($output2_path, 'x');

    $file1_line = get_line($file1_handle);
    $file2_line = get_line($file2_handle);

    while ($file1_line !== null || $file2_line !== null) {
        if ($file2_line === null || $file1_line < $file2_line) {
            fwrite($output1_handle, $file1_line . PHP_EOL);
            $file1_line = get_line($file1_handle);

        } elseif ($file1_line === null || $file1_line > $file2_line){
            fwrite($output2_handle, $file2_line . PHP_EOL);
            $file2_line = get_line($file2_handle);
        } else {
            $file1_line = get_line($file1_handle);
            $file2_line = get_line($file2_handle);
        }

    }

    fclose($file1_handle);
    fclose($file2_handle);
    fclose($output1_handle);
    fclose($output2_handle);
}

function get_line($stream) {
    if (!feof($stream)) {
        return trim(fgets($stream));
    } else {
        return null;
    }
}