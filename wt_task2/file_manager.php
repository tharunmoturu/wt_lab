<?php
$folder="uploads/";

if(isset($_POST['upload'])){
    $fileName=$_FILES['myfile']['name'];
    $tempName=$_FILES['myfile']['tmp_name'];

    move_uploaded_file($tempName,$folder.$fileName);
    echo "File Uploaded successfully! <br><br> ";
}




if(isset($_GET['download'])){
    $fileToDownload=$folder.$_GET['download'];
    header("Content-Disposition: attachment; filename=" . $_GET['download']);
    readfile($fileToDownload);

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>
</head>
<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <button type="submit" name="upload">Upload</button>
</form>

<hr>

<h3>Download File</h3>

<form method="GET">
    Enter file name:
    <input type="text" name="download" placeholder="example.pdf" required>
    <button type="submit">Download</button>
</form>

</body>
</html>
