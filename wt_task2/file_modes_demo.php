<?php
echo "<h2>file modes demonstration<h2>";

$file="mode_sample.txt";
$handle=fopen($file,"w");
fwrite($handle,"this is written by using w mode.\n");
fclose($handle);
echo "w mode executed (old content erased).<br>";

$handle = fopen($file, "a");
fwrite($handle, "This line is added using a mode.\n");
fclose($handle);
echo "a mode executed (content appended).<br>";

$handle = fopen($file, "r");
$content = fread($handle, filesize($file));
fclose($handle);
echo "<br><b>Content using r mode:</b><br>";
echo nl2br($content);

$handle = fopen($file, "r+");
fwrite($handle, "r+ mode start.\n");
fclose($handle);
echo "<br>r+ mode executed (read & write).<br>";

$handle = fopen($file, "w+");
fwrite($handle, "w+ mode overwrites everything.\n");
fclose($handle);
echo "w+ mode executed (erased and wrote).<br>";

$handle = fopen($file, "a+");
fwrite($handle, "a+ mode appends again.\n");
fclose($handle);
echo "a+ mode executed (read & append).<br>";

$newFile = "new_mode_file.txt";
$handle = fopen($newFile, "x");
fwrite($handle, "Created using x mode.\n");
fclose($handle);
echo "x mode executed (new file created).<br>";

$newFile2 = "new_mode_file2.txt";
$handle = fopen($newFile2, "x+");
fwrite($handle, "Created using x+ mode.\n");
fclose($handle);
echo "x+ mode executed (new file for read & write).<br>";

echo "<hr>All file modes demonstrated successfully!";
?>