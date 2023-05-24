<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="Header">
        <img class="LogoImage" src="Spike1.png"/>
        <div>
            <button id="NavButton"><Img class="LogoImage" src="LoginIcon.png"></Img></button>
            <div class="LoginMenu">
                <div id="RegistrationLoginChange">
                     <button class="ChangeButton LoginChosen LoginSelectButton"><h1>Login</h1>
                    </button> <button class="ChangeButton RegistrationSelectButton"><h1>Sign Up</h1></button> 
                </div>
                <div id="Inputs">
                    <div id="LoginInputMenu">
                        <div class = "LoginInput">
                            <h1>Login</h1>
                            <input type="text" class="InputField" name="logintologin">
                        </div>

                        <div class = "LoginInput">
                            <h1>Password</h1>
                            <input type="password" class="InputField" name="passwordtologin">
                        </div> 
                            <button class = "LoginButton"><h1>Login</h1></button>
                          
                    </div>
                    <div id="RegistrationInputMenu">
                        <!-- <div class = "LoginInput">
                            <h1>Login</h1>
                            <input type="text" class="InputField" name="logintoregister">
                        </div>
                        <div class = "LoginInput">
                            <h1>E-Mail</h1>
                            <input type="email" class="InputField" name="emailtoregister">
                        </div>
                        <div class = "LoginInput">
                            <h1>Date of birth</h1>
                            <input type="date" class="InputField" name="birthdaytoregister">
                        </div>  
                        <div class = "LoginInput">
                            <h1>Password</h1>
                            <input type="password" class="InputField" name="passwordtoregister">
                        </div>   
                        <div class = "LoginInput">
                            <h1>Confirm Password</h1>
                            <input type="password" class="InputField" name="confirmpasswordtoregister">
                        </div>
                            <button class ="LoginButton" name="registrationbutton"><h1>Registrate</h1></button>
                         -->
                         <form action="register.php" method="post">
        
        <div class="LoginInput">
            <label for="username"><h1>Username:</h1></label>
            <input class="InputField"type="text" name="username" id="username">
        </div>
        <div class="LoginInput">
            <label for="email"><h1>Email:</h1></label>
            <input class="InputField" type="email" name="email" id="email">
        </div>
        <div class="LoginInput">
            <label for="password"><h1>Password:</h1></label>
            <input class="InputField" type="password" name="password" id="password">
        </div>
        <div class="LoginInput">
            <label for="password2"><h1>Password Again:</h1></label>
            <input class="InputField" type="password" name="password2" id="password2">
        </div>
        <div class="LoginInput">
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> <h1>I agree
                with the </h1>
                <a href="#" title="term of services"><h1>terms of service</h1></a>
            </label>
        </div>
        <button class ="LoginButton" type="submit"><h1>Register</h1></button>
    </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="center">
        <div class="test"> </div>
    </div>
    <div id="footer">
        <h1 class="text">footer</h1>
    </div>
</body>
<script src="script.js"></script>
<?php
$fields = [
    'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
    'email' => 'email | required | email | unique: users, email',
    'password' => 'string | required | secure',
    'password2' => 'string | required | same: password',
    'agree' => 'string | required'
];
?>
</html>
