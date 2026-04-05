<?php
echo "<h1>PART B – PHP String Functions (FreeLanceHub)</h1>";
echo "<hr>";

/* =================================
   STRING SOURCE
   ================================= */

// Hardcoded string (company related)
$platformDescription = "FreeLanceHub connects clients and freelancers for projects";

// Simulated user input (from signup/login)
$userName = "john doe";
$userEmail = "  USER@FREELANCEHUB.COM  ";
$userPassword = "free@123";

/* =================================
   BASIC STRING FUNCTIONS
   ================================= */

echo "<h2>Basic String Functions</h2>";

echo "String Length: " . strlen($platformDescription) . "<br>";
echo "Word Count: " . str_word_count($platformDescription) . "<br>";
echo "Reversed String: " . strrev($platformDescription) . "<br>";

/* =================================
   CASE CONVERSION
   ================================= */

echo "<h2>Case Conversion</h2>";

echo "Uppercase Platform Name: " . strtoupper("freelancehub") . "<br>";
echo "Lowercase Email: " . strtolower($userEmail) . "<br>";
echo "User Name (First Letter Capital): " . ucfirst($userName) . "<br>";
echo "User Name (Each Word Capital): " . ucwords($userName) . "<br>";

/* =================================
   SEARCH & REPLACE
   ================================= */

echo "<h2>Search & Replace</h2>";

echo "Position of 'clients': " . strpos($platformDescription, "clients") . "<br>";
echo "Replaced Text: " . str_replace("freelancers", "experts", $platformDescription) . "<br>";

/* =================================
   SUBSTRING & TRIMMING
   ================================= */

echo "<h2>Substring & Trimming</h2>";

echo "Substring (first 12 chars): " . substr($platformDescription, 0, 12) . "<br>";
echo "Trimmed Email: " . trim($userEmail) . "<br>";
echo "Left Trimmed Email: " . ltrim($userEmail) . "<br>";
echo "Right Trimmed Email: " . rtrim($userEmail) . "<br>";

/* =================================
   STRING COMPARISON
   ================================= */

echo "<h2>String Comparison</h2>";

$email1 = "support@freelancehub.com";
$email2 = "SUPPORT@FREELANCEHUB.COM";

echo "strcmp(): " . strcmp($email1, $email2) . "<br>";
echo "strcasecmp(): " . strcasecmp($email1, $email2) . "<br>";

/* =================================
   SPECIAL CHARACTERS & SECURITY
   ================================= */

echo "<h2>Special Characters & Security</h2>";

$unsafeInput = "<script>alert('Hacked')</script>";

echo "htmlspecialchars(): " . htmlspecialchars($unsafeInput) . "<br>";
echo "addslashes(): " . addslashes($userPassword) . "<br>";

?>