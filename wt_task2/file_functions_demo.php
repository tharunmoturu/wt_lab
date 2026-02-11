<?php
echo "file functions demonstration";
echo "<h3> file read/write <h3>";

$file="sample.txt";

file_put_contents($file,"Welcome to FreelanceHub\n");

$handle=fopen($file,"a");
fwrite($handle,"this appended text\n");
fclose($handle);

$handle = fopen($file, "r");
$content = fread($handle, filesize($file));
fclose($handle);

echo "<b>File Content using fread():</b><br>";
echo nl2br($content);

echo "<br><b>File Content using file_get_contents():</b><br>";
echo nl2br(file_get_contents($file));


echo "<hr><h3>2. File Information</h3>";

echo "File Exists: " . (file_exists($file) ? "Yes" : "No") . "<br>";
echo "File Size: " . filesize($file) . " bytes<br>";
echo "File Type: " . filetype($file) . "<br>";
echo "Last Access Time: " . date("Y-m-d H:i:s", fileatime($file)) . "<br>";
echo "Last Modified Time: " . date("Y-m-d H:i:s", filemtime($file)) . "<br>";
echo "File Created Time: " . date("Y-m-d H:i:s", filectime($file)) . "<br>";
echo "File Permissions: " . fileperms($file) . "<br>";
echo "File Owner: " . fileowner($file) . "<br>";
echo "File Group: " . filegroup($file) . "<br>";
echo "File Inode: " . fileinode($file) . "<br>";

echo "<hr><h3>3. File & Folder Management</h3>";

copy($file, "copy_sample.txt");
echo "File copied.<br>";

rename("copy_sample.txt", "renamed_sample.txt");
echo "File renamed.<br>";

echo "Is sample.txt a file? " . (is_file($file) ? "Yes" : "No") . "<br>";

if (!is_dir("test_folder")) {
    mkdir("test_folder");
    echo "Folder created.<br>";
}

echo "Is test_folder a directory? " . (is_dir("test_folder") ? "Yes" : "No") . "<br>";

unlink("renamed_sample.txt");
echo "File deleted.<br>";

rmdir("test_folder");
echo "Folder removed.<br>";

echo "<hr><h3>4. Directory Handling</h3>";

echo "Current Directory: " . getcwd() . "<br>";

$files = scandir(".");
echo "<b>Files using scandir():</b><br>";
print_r($files);

echo "<br><b>Files using opendir() and readdir():</b><br>";

$dir = opendir(".");
while (($file = readdir($dir)) !== false) {
    echo $file . "<br>";
}
closedir($dir);


echo "<hr><h3>5. File Locking</h3>";

$handle = fopen($file, "r");
if (flock($handle, LOCK_SH)) {
    echo "File locked successfully for reading.<br>";
    flock($handle, LOCK_UN);
}
fclose($handle);

echo "<hr>All file functions executed successfully!";
?>

?>