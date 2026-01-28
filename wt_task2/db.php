<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";        // keep empty for now
$dbname = "freelancehub";
$port = 3307;      // IMPORTANT

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
