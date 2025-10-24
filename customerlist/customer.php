<?php
    if (empty($_GET["id"]))
    {
        header("Location: /customerlist");
    }

    include "../includes/db.php";
    $con = getDBConnection();

    $customerID = $_GET["id"];

    try {
        $query = "Select * FROM customers WHERE CustomerID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s",  $customerID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $zip = $row["zip"];
        $phone = $row["phone"];
        $email = $row["email"];
    }
    catch (mysqli_sql_exception $ex){
        echo $ex;
    }

    //update
    if(!empty($_POST["txtFirstName"]) && !empty($_POST["txtLastName"])){

        $txtFirstName = $_POST["txtFirstName"];
        $txtLastName = $_POST["txtLastName"];
        $txtAddress = $_POST["txtAddress"];
        $txtCity= $_POST["txtCity"];
        $txtState = $_POST["txtState"];
        $txtZip = $_POST["txtZip"];
        $txtPhone = $_POST["txtPhone"];
        $txtEmail = $_POST["txtEmail"];

        try {
            $query = "UPDATE customers SET firstName = ?, lastName= ?, address = ?, city = ?,
                                        state = ?, zip = ?, phone = ?, email = ? WHERE CustomerID = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssssssss", $txtFirstName, $txtLastName, $txtAddress,
                $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail ,$customerID);
            mysqli_stmt_execute($stmt);
            header("Location: /customerlist");
        }
        catch(mysqli_sql_exception $ex){
            echo $ex;
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
    <link rel="stylesheet" href="./css/customerGrid.css">
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
        <form method="post">
            <div class="grid-container">
                <div class="grid-header">
                    <h3>Update customer</h3>
                </div>

                <div class="customer-firstName">
                    <label for="txtFirstName">First Name</label>
                </div>
                <div class="firstName-input">
                    <input type="text" name="txtFirstName" id="txtFirstName" value = "<?=$firstName?>">
                </div>

                <div class="customer-lastName">
                    <label for="txtLastName">Last Name</label>
                </div>
                <div class="lastName-input">
                    <input type="text" name="txtLastName" id="txtLastName" value = "<?=$lastName?>">
                </div>

                <div class="customer-address">
                    <label for="txtAddress">Address</label>
                </div>
                <div class="address-input">
                    <input type="text" name="txtAddress" id="txtAddress" value = "<?=$address?>">
                </div>

                <div class="customer-city">
                    <label for="txtCity">City</label>
                </div>
                <div class="city-input">
                    <input type="text" name="txtCity" id="txtCity" value = "<?=$city?>">
                </div>

                <div class="customer-state">
                    <label for="txtState">State</label>
                </div>
                <div class="state-input">
                    <input type="text" name="txtState" id="txtState" value = "<?=$state?>">
                </div>

                <div class="customer-zip">
                    <label for="txtZip">Zip</label>
                </div>
                <div class="zip-input">
                    <input type="text" name="txtZip" id="txtZip" value = "<?=$zip?>">
                </div>

                <div class="customer-phone">
                    <label for="txtPhone">Phone</label>
                </div>
                <div class="phone-input">
                    <input type="text" name="txtPhone" id="txtPhone" value = "<?=$phone?>">
                </div>

                <div class="customer-email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail" value = "<?=$email?>">
                </div>
                <div class="grid-footer">
                    <input type="submit" value="Update Customer">
                    <input type="button" value = "Delete Customer" id = "delete">
                </div>
            </div>
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
<script>

    const deleteButton = document.querySelector('#delete')
    deleteButton.addEventListener('click', () => {
        window.location = './delete.php?id=<?=$customerID?>'
    })
</script>
</body>
</html>
