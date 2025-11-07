<?php
    session_start();

    $memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
//echo sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

//echo md5("fishing" . $memberKey);

    include "../includes/db.php";
    $con = getDBConnection();

    $minLength = 4;
    $err = "";

    if ($_SESSION["RoleID"] != 1){
        header("Location: index.php");
    }

    $Username = $_POST["txtUserName"];
    $Password = $_POST["txtUserPassword"];
    $Password2 = $_POST["txtUserPassword2"];
    $Email = $_POST["txtEmail"];
    $Role = $_POST["txtRole"];

    if (isset($_POST["btnSubmit"])){

        if (empty($Username)) {
            $err = "Username required";
        }
        else if (strlen($Username) < $minLength) {
            $err = "Username is too short";
        }

        if (empty($Password)) {
            $err = "Password required";
        }
        else if (strlen($Password) < $minLength)
        {
            $err = "Password is too short";
        }

        if(empty($_POST["txtUserPassword2"])) {
            $err = "Password verification required";
        }
        else if($Password != $Password2) {
            $err = "passwords don't match";
        }

        if (empty($Role)) {
            $err = "Role must be selected";
        }

        if (empty($Email)) {
            $err = "Email required";
        }

        if ($err == ""){
            //echo "$Username-$Password-$Password2-$memberKey-$Email-$Role";

            $hashedPassword = md5($Password . $memberKey);

            //$memberKey = 'xxxxxxxxx';

            $sql = mysqli_prepare($con, "insert into memberLogin (MemberName, MemberEmail, MemberPassword, RoleID, MemberKey) values (?,?,?,?,?)");
            mysqli_stmt_bind_param($sql,"sssss", $Username, $Email, $hashedPassword, $Role, $memberKey);
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