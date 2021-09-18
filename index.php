<?php
require "mysql_connect.php";
$logedIn = "";
$username = $_POST['username'];
$password = $_POST['password'];
$dbUsername = "";
$dbPassword = "";
$dbEmail = "";

if (isset($_REQUEST['login'])) {

    $sqlQuery = "SELECT `username`, `password` FROM `user_info` WHERE `username` = '$username' AND `password` = '$password' ";
    $result = $conn->query($sqlQuery);


    if ($result) {
        if ($result->num_rows > 0) {
            $logedIn = "logedIn";
            while ($row = $result->fetch_assoc()) {
                $dbUsername = $row["username"];
                $dbPassword = $row["password"];
            }
        } else {
            $logedIn = "notLogedIn";
        }
    } else if (!$result) {
        header("location: register.php?firstRegister");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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

    if ($logedIn == "") {
        header("location: login.php");
    } else if ($logedIn == "logedIn") {
        echo "<font color='darkgreen'><h2>Login successful.</h2><h2>Welcome</h2></font><font color='blue'><h1>$dbUsername</h1></font>";

    ?>
        <table>
            <thead>
                <tr>
                    <th>Name ==> </th>
                    <th> Email</th>
                </tr>
            </thead>
        </table>


        <?php

        $sqlQuery = "SELECT `username`, `email` FROM `user_info` WHERE `username` != '$username'";
        $result2 = $conn->query($sqlQuery);


        if ($result2) {
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $name = $row["username"];
                    $email = $row["email"];

        ?>
                    <table>
                        <thead>
                            <tr>
                                <td><?php echo $name ?> ==> </td>
                                <td><?php echo $email ?></td>
                            </tr>
                        </thead>
                    </table>


    <?php
                }
            } else {
            }
        } else if (!$result) {
            echo "Database empty";
        }
    } else if ($logedIn == "notLogedIn") {
        header("location: register.php?firstRegister");
    }
    ?>

</body>
</html>