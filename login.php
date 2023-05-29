<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {
        $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && $user_data = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['id'] = $user_data['id'];
                header("Location: homework.php");
                exit();
            }
        }

        echo "Invalid username or password.";
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
    <form action="login.php" method="post" class="InputMenuPage">
    
        <div class="LoginInput">
            <label for="username"><h1>Username:</h1></label>
            <input class="InputField"type="text" name="user_name" id="username">
        </div>
        <!-- <div class="LoginInput">
            <label for="email"><h1>Email:</h1></label>
            <input class="InputField" type="email" name="email" id="email">
        </div> -->
        <div class="LoginInput">
            <label for="password"><h1>Password:</h1></label>
            <input class="InputField" type="password" name="password" id="password">
        </div>
        <a href="signup.php" style = "margin-top: 20px; text-decoration: underline;">To SignUp Click Here</a>
        <button class ="LoginButton" type="submit"><h1>Login</h1></button>
        </form>
    </div>
</body>
<script src="registrationcheck.js"></script>
</html>