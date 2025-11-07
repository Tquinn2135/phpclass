<?php
    session_start();
    if(!empty($_POST["txtEmail"]) && !empty($_POST["txtUserPassword"])){
        include "../includes/db.php";
        $con = getDBConnection();

        //$userName = $_POST["txtUserName"];
        $email = $_POST["txtEmail"];
        $password = $_POST["txtUserPassword"];

        $sql = mysqli_prepare($con ,"select MemberPassword, MemberKey, RoleID, MemberID from memberLogin where MemberEmail = ?");
        mysqli_stmt_bind_param($sql, "s" , $email);
        mysqli_stmt_execute($sql);
        $result = mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_array($result);

//        if ($row != null){
//            echo "got it";
//        }
//        else{
//            echo "nope";
//        }


        if ($row != null){
            $DBPass = $row["MemberPassword"];
            $MemberKey= $row["MemberKey"];
            $password = md5($password . $MemberKey);

            if ($password == $DBPass){
                $_SESSION["RoleID"] = $row["RoleID"];
                $_SESSION["UID"] = $row["MemberID"];
                if($row["RoleID"]==1){
                    header("Location: admin.php");
                }else{
                    header("Location: member.php");
                }
            }else{
                $msg = "Sorry Wrong Username or Password";
            }

        }else{
            $msg = "Sorry Wrong Username or Password";
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
                <div class = item2>Email Login</div>
                <div class="item3"><input type="text" name="txtEmail" id="txtEmail" size="40"></div>
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