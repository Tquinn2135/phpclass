<?php

if(!empty($_POST["txtUserName"]) && !empty($_POST["txtUserPassword"])){
    include "../includes/db.php";
    $con = getDBConnection();

    $userName = $_POST["txtUserName"];
    $password = $_POST["txtUserPassword"];

    if ($userName == "admin" && $password == "p@ss")
    {
        header( "Location: admin.php");
    }
    else
    {
        if ($userName == "member" && $password == "p@ss")
        {
            header( "Location: member.php");
        }
        $msg = "Wrong Username or Password";
    }
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tom's Website</title>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
<?php
include "../includes/header.php"
?>
<div id="three-column">
    <?php
    include "../includes/navigation.php"
    ?>
    <main>
        <h3 id="err"><?=$msg?></h3>
        <form method="post">
            <div class = "grid-container">
                <div class = "item1"><h3>Login</h3></div>
                <div class = item2>User Login</div>
                <div class="item3"><input type="text" name="txtUserName" id="txtUserName" size="40"></div>
                <div class = item4>Password</div>
                <div class="item5"><input type="password" name="txtUserPassword" id="txtUserPassword" size="40"></div>
                <div class="item6"><input type="submit" value="Sign In"></div>
            </div>
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>