<?php
    session_start();

    include "../includes/db.php";
    $con = getDBConnection();

    $minLength = 4;
    $err = "";

    if (!isset($_SESSION["UID"])){
        header("Location: index.php");
    }

    if (isset($_POST["btnSubmit"])){
        if (!empty($_POST["txtUserName"])){
            if (strlen($_POST["txtUserName"]) > $minLength){
                $Username = $_POST["txtUserName"];
            }
            else
            {
                $err = "Username is too short";
            }
        }
        else
        {
            $err = "Username required";
        }
        //$Password = $_POST["txtUserPassword"];
        if (!empty($_POST["txtUserPassword"])){
            if (strlen($_POST["txtUserPassword"]) > $minLength)
            {
                $Password = $_POST["txtUserPassword"];
            }
            else
            {
                $err = "Password is too short";
            }
        }
        else
        {
            $err = "Password required";
        }

        if(!empty($_POST["txtUserPassword2"])){
            $Password2 = $_POST["txtUserPassword2"];
        }else{
            $Password2 = "";
        }

        if($Password != $Password2){
            $err = "passwords don't match";
        }
        if (!empty($_POST["txtRole"])){
            $Role = $_POST["txtRole"];
        }else{
            $err = "Role must be selected";
        }
        //
        if (!empty($_POST["txtEmail"])){
            if (!str_contains($_POST["txtEmail"], '.')!== true && strpos($_POST["txtEmail"], '@')!== true){
                $Email = $_POST["txtEmail"];
            }
            else{
                $err = "Email must contain a '@' and a '.' ";
            }
        }
        else
        {
            $err = "Email required";
        }



        if ($err==""){


            $memberKey = 'xxxxxxxxx';

            $sql = mysqli_prepare($con, "insert into memberLogin (MemberName, MemberEmail, MemberPassword,
                         Role, MemberKey) values (?,?,?,?,?)");
            mysqli_stmt_bind_param($sql,"sssis", $Username, $Password, $Role, $Email, $memberKey);
            mysqli_stmt_execute($sql);

            $Username = "";
            $Password = "";
            $Password2 = "";
            $Email = "";
             $err = "Member Added to Database";
        }

    }




?>

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
        <h3 id="err"><?=$err?></h3>
        <form method="post">
            <div class = "grid-container">
                <div class = "item1"><h3>Add New Member</h3></div>
                <div class = item2>Username:</div>
                <div class="item3"><input type="text" name="txtUserName" id="txtUserName" value="<?=$Username?>" size="40"></div>
                <div class = item4>Password:</div>
                <div class="item5"><input type="password" name="txtUserPassword" id="txtUserPassword" value="<?=$Password?>"  size="40"></div>
                <div class = item6>Retype Password:</div>
                <div class="item7"><input type="password" name="txtUserPassword2" id="txtUserPassword2" value="<?=$Password2?>"  size="40"></div>
                <div class = item8>Role:</div>
                <div class="item9">
                    <select name="txtRole" id="txtRole">
                        <?php
                        $result = mysqli_query($con,"SELECT * FROM role");

                        while ($row = mysqli_fetch_array($result)){

                            $roleID = $row['RoleID'];
                            $roleValue = $row['RoleValue'];
                        echo "<option value='$roleID'>$roleValue</option>";

                        }
                        ?>
                    </select>
                </div>
                <div class = item10>Email:</div>
                <div class="item11"><input type="text" name="txtEmail" id="txtEmail" value="<?=$Email?>"  size="40"></div>
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




