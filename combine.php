<?php
// Combines two mp3 files
echo "Combining .mp3 files";
$first_file = file_get_contents('file1.mp3');
$second_file = file_get_contents('file2.mp3');
file_put_contents('climar/new_file.mp3', $first_file . $second_file);
?>
