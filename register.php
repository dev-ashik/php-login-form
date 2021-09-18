<?php
require "mysql_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
            <a href="./register.php">Registation/SingUp</a>
        </div>
    </nav>
    <?php
    if (isset($_REQUEST['registerIsNotSuccess'])) {
        echo "<font color='darkred'><h1>Register is not successful. Rgister again</h1></font>";
    } else if (isset($_REQUEST['firstRegister'])) {
        echo "<font color='darkred'><h1>Register first. To log in...</h1></font>";
    }
    ?>
    <section class="ashiklogin">
        <h1>Register form</h1>
        <form class="loginForm" action="register.php" method="POST">
            <input class="inputBox" type="text" placeholder="username" name="username" required><br>
            <input class="inputBox" type="text" placeholder="email" name="email" required><br>
            <input class="inputBox" type="password" placeholder="password" name="password" required><br>
            <input class="submitButton" type="submit" value="Register" name="Register">
        </form>
        <p class="accountUpdate"><a href="./login.php">I have an account</a></p>
    </section>
</body>
</html>

<?php

if (isset($_REQUEST["Register"])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlQuery = "INSERT INTO `user_info`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
    $result = $dbh->query($sqlQuery);


    if ($result) {
        if ($result->rowCount() > 0) {
            header("location: login.php?registerSuccess");
        }
    } elseif (!$result) {
        header("location: register.php?registerIsNotSuccess");
    }
}

?>