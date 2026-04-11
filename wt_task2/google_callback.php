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

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;

        echo "Welcome, " . htmlspecialchars($name) . " (" . htmlspecialchars($email) . ")";
        echo "<br><a href='index.html'>Go back to Home</a>";
        exit;
    } else {
        echo "Error in authentication: " . htmlspecialchars($token['error']);
        echo "<br><a href='signin_page.html'>Go back to Sign in</a>";
    }
} else {
    header('Location: signin_page.html');
    exit;
}
?>