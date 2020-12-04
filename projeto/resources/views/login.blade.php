<?php
session_start();

if (isset($_SESSION["user"])) {
    header("location: index.php");
}

if (isset($_SESSION["error"])) {
    $msg = $_SESSION["error"];
    $errorMsg = '<script language="javascript">alert('.$msg.')</script>';
    echo $errorMsg;
    unset($_SESSION["error"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .divForm {
            margin: auto;
            text-align: center;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 30%;
            height: 40%;
            border-style: solid;
            border-color: grey;
            border-radius: 18px;
            background-color: lightgray;
        }
        
        .loginHeading {
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body>
    <div class="divForm">
    <h2 class="loginHeading">Realizar Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" style="padding: 3%;">
            <br><br>
            <input type="password" name="password" placeholder="Password" style="padding: 3%;">
            <br><br>
            <input type="submit" value="Login" style="padding: 3%;">
        </form>
    </div>
</body>

</html>