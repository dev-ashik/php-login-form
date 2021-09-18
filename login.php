<?php
require "mysql_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body style="text-align: center;">
    <nav class="Header">
        <section class="HeaderImage">
            <img src="./image/swfuLogo.png" alt="logo" height="40px" width="40px" />
        </section>
        <div class="HeaderAncor">
            <a>Home</a>
            <a href="./login.php">Login</a>
            <a href="./register.php">Registation/SignUp</a>
        </div>
    </nav>

    <?php
    if (isset($_REQUEST["registerSuccess"])) {
        echo "<font color='darkgreen'><h1>Register successful. login now</h1></font>";
    } else if (isset($_REQUEST["usernameOrPasswordWrong"])) {
        echo "<font color='red'><h1>username or password wrong</h1></font>";
    }
    ?>

    <section class="ashiklogin">
        <h1>Login</h1>
        <form class="loginForm" action="./index.php" method="POST">
            <input class="inputBox" type="text" placeholder="username" name="username" required><br>
            <input class="inputBox" type="password" placeholder="password" name="password" required><br>
            <input class="submitButton" type="submit" value="Login" name="login">
        </form>
        <p class="accountUpdate"><a href="./register.php">Create a new account</a></p>
    </section>

</body>
</html>