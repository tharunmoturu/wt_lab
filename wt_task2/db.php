<?php
require_once __DIR__ . '/vendor/autoload.php';

// Parse .env file
$env = parse_ini_file(__DIR__ . '/.env');
$mongoUri = $env['MONGODB_URI'] ?? "mongodb://localhost:27017";

try {
    // Connect to MongoDB using the URI from .env
    $client = new MongoDB\Client($mongoUri);
    
    $db = $client->freelancehub;
    
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
