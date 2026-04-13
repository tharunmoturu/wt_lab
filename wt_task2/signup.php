<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usersCollection = $db->users;

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password (VERY IMPORTANT)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $existingUser = $usersCollection->findOne(['email' => $email]);

    if ($existingUser) {
        echo "Email already registered!";
    } else {
        $insertResult = $usersCollection->insertOne([
            'fullname' => $fullname,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        if ($insertResult->getInsertedCount() > 0) {
            echo "Signup successful!";
            // header("Location: signin.html");
        } else {
            echo "Error: Could not register user.";
        }
    }
}
?>
