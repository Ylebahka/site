<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (user_name, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $user_name, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("Location: login.php");
                exit();
            } else {
                echo "Registration failed.";
            }
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Not Valid Info";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="InputMenuPage">
        <form action="signup.php" method="post" class="InputMenuPage">
    
        <div class="LoginInput">
            <label for="username"><h1>Username:</h1></label>
            <input class="InputField"type="text" name="user_name" id="username">
        </div>
        <div class="LoginInput">
            <label for="password"><h1>Password:</h1></label>
            <input class="InputField" type="password" name="password" id="password">
        </div>
        <a href="login.php" style = "margin-top: 20px; text-decoration: underline;">To Login Click Here</a>
        <button class ="LoginButton" type="submit"><h1>Register</h1></button>
        </form> 
    </div>
</body>
<script src="registrationcheck.js"></script>
</html>