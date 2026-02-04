<?php
$platformDescription="FreelanceHub is your ultimate platform for connecting businesses with top-tier freelancers across various domains. Whether you're looking for web developers, graphic designers, content writers, or digital marketers, FreelanceHub has got you covered. Our mission is to streamline the hiring process, ensuring that businesses can find the right talent quickly and efficiently while providing freelancers with ample opportunities to showcase their skills and grow their careers.";
echo $platformDescription;

$userName = "john doe";
$userEmail = "  USER@FREELANCEHUB.COM  ";
$userPassword = "free@123";

echo "<h2>Basic String Functions</h2>";

echo "String Length: " . strlen($platformDescription) . "<br>";
echo "Word Count: " . str_word_count($platformDescription) . "<br>";
echo "Reversed String: " . strrev($platformDescription) . "<br>";

echo "<h2>Case Conversion</h2>";

echo "Uppercase Platform Name: " . strtoupper("freelancehub") . "<br>";
echo "Lowercase Email: " . strtolower($userEmail) . "<br>";
echo "User Name (First Letter Capital): " . ucfirst($userName) . "<br>";
echo "User Name (Each Word Capital): " . ucwords($userName) . "<br>";

echo "<h2>Search & Replace</h2>";

echo "Position of 'clients': " . strpos($platformDescription, "clients") . "<br>";
echo "Replaced Text: " . str_replace("freelancers", "experts", $platformDescription) . "<br>";

echo "<h2>Substring & Trimming</h2>";

echo "Substring (first 12 chars): " . substr($platformDescription, 0, 12) . "<br>";
echo "Trimmed Email: " . trim($userEmail) . "<br>";
echo "Left Trimmed Email: " . ltrim($userEmail) . "<br>";
echo "Right Trimmed Email: " . rtrim($userEmail) . "<br>";

echo "<h2>String Comparison</h2>";

$email1 = "support@freelancehub.com";
$email2 = "SUPPORT@FREELANCEHUB.COM";

echo "strcmp(): " . strcmp($email1, $email2) . "<br>";
echo "strcasecmp(): " . strcasecmp($email1, $email2) . "<br>";


echo "<h2>Special Characters & Security</h2>";

$unsafeInput = "<script>alert('Hacked')</script>";

echo "htmlspecialchars(): " . htmlspecialchars($unsafeInput) . "<br>";
echo "addslashes(): " . addslashes($userPassword) . "<br>";

?>