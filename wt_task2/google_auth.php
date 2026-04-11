<?php
require_once 'vendor/autoload.php';

$env = parse_ini_file('.env');

$clientID = $env['GOOGLE_CLIENT_ID'];
$clientSecret = $env['GOOGLE_CLIENT_SECRET'];
$redirectUri = $env['GOOGLE_REDIRECT_URI'];

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit;
?>