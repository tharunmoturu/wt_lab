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

        include 'db.php';
        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;

        // Store or update user in MongoDB
        $usersCollection = $db->users;
        $existingUser = $usersCollection->findOne(['email' => $email]);

        if (!$existingUser) {
            // New user from Google
            $usersCollection->insertOne([
                'fullname' => $name,
                'email' => $email,
                'auth_method' => 'google',
                'created_at' => new MongoDB\BSON\UTCDateTime()
            ]);
        }

        echo "<h2>Login Successful!</h2>";
        echo "Welcome, <strong>" . htmlspecialchars($name) . "</strong> (" . htmlspecialchars($email) . ")";
        echo "<br><br><a href='index.html' style='padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Go back to Home</a>";
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