<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usersCollection = $db->users;

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query MongoDB to find a user by email
    $user = $usersCollection->findOne(['email' => $email]);

    if ($user) {
        // Since we hashed the password during signup, we must verify it here
        if (password_verify($password, $user['password'])) {
            
            // Password is correct, user is authenticated
            $_SESSION['user_email'] = $user['email'];
            
            // Retrieve details from the MongoDB document that was fetched
            $retrievedFullname = htmlspecialchars($user['fullname']);
            $retrievedEmail = htmlspecialchars($user['email']);
            
            // Display success and the details taken from Database
            echo "<h2>Sign In Successful!</h2>";
            echo "<p>Welcome back, <strong>" . $retrievedFullname . "</strong></p>";
            echo "<p><strong>Email retrieved from MongoDB:</strong> " . $retrievedEmail . "</p>";
            
            // In a real application, you'd usually redirect here, e.g.:
            // header("Location: index.html");
            // exit();
        } else {
            echo "<h2>Error</h2>";
            echo "<p>Incorrect password.</p>";
        }
    } else {
        echo "<h2>Error</h2>";
        echo "<p>No account found with that email address.</p>";
    }
} else {
    echo "This script must be accessed via POST from the signin page.";
}
?>
