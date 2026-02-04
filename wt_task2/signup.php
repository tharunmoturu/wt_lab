<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname=trim($_POST['fullname']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    $fullname=htmlspecialchars($fullname);
    $email=htmlspecialchars($email);

    if(strlen($fullname)<3 || strlen($fullname)>50){
        die("Full Name must be between 3 and 50 characters.");
    }
    if(strlen($password)<6){
        die("Password must be at least 6 characters long.");
    }

    $fullname=ucwords($fullname);
    $fullname=mysqli_real_escape_string($conn,$fullname);
    $email=mysqli_real_escape_string($conn,$email);
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   

    $check_Email="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$check_Email);

     if (!$result) {
        die("Database Error: Unable to check email");
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Email already registered!";
    } 
    else {

        $sql = "INSERT INTO users (fullname, email, password)
                VALUES ('$fullname', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo "Signup successful! ";
            print "Welcome to FreeLanceHub";
        } else {
            die("Error: Registration failed");
        }
    }


    
}
?>
