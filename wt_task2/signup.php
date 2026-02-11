<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash password (VERY IMPORTANT)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already registered!";
    } else {
        $sql = "INSERT INTO users (fullname, email, password)
                VALUES ('$fullname', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo "Signup successful!";
            // header("Location: signin.html");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
