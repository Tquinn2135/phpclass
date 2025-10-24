<!doctype html>
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
        <h3>Admin Page</h3>
        <h3 id="err"><?=$msg?></h3>
        <form method="get">
            <div class = "grid-container">
                <div class = "item1"><h3>Add New Member</h3></div>
                <div class = item2>Username:</div>
                <div class="item3"><input type="text" name="txtUserName" id="txtUserName" size="40"></div>
                <div class = item4>Password:</div>
                <div class="item5"><input type="password" name="txtUserPassword" id="txtUserPassword" size="40"></div>
                <div class = item6>Retype Password:</div>
                <div class="item7"><input type="password" name="txtUserPassword2" id="txtUserPassword2" size="40"></div>
                <div class = item8>Role:</div>
                <div class="item9">
                    <select name="txtRole" id="txtRole">
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Member</option>
                    </select>
                </div>
                <div class = item10>Email:</div>
                <div class="item11"><input type="text" name="txtEmail" id="txtEmail" size="40"></div>
                <div class="item12"><input type="submit" value="Create User" name="btnSubmit"></div>
            </div>
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>




