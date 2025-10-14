<?php

if(!empty($_POST["CustomerID"])){
    include "../includes/db.php";
    $con = getDBConnection();

    $txtFirstName =$_POST["txtFirstName"];
    $txtLastName =$_POST["txtLastName"];
    $txtAddress =$_GET["txtAddress"];
    $txtCity =$_POST["txtCity"];
    $txtState =$_POST["txtState"];
    $txtZip =$_POST["txtZip"];
    $txtEmail= $_POST["txtEmail"];
    $txtPassword= $_POST["txtPassword"];


    try {
        $query = "INSERT INTO customers (firstName, lastName, address, city, state, zip, phone, 
                                         email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $txtFirstName, $txtLastName);
        mysqli_stmt_execute($stmt);

        header("Location:index.php");
    }
    catch (mysqli_sql_exception $ex){
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
    <style>
        .grid-header{ grid-area: grid-header; }

        .customer-fname{ grid-area: customer-fname; }
        .fname-input{ grid-area: fname-input; }

        .customer-lname{ grid-area: customer-lname;}
        .lname-input{ grid-area: lname-input; }

        .customer-address{ grid-area: customer-address;}
        .address-input{ grid-area: address-input; }

        .customer-city{ grid-area: customer-city;}
        .city-input{ grid-area: city-input; }

        .customer-state{ grid-area: customer-state;}
        .state-input{ grid-area: state-input; }

        .customer-zip{ grid-area: customer-zip;}
        .zip-input{ grid-area: zip-input; }

        .customer-phone{ grid-area: customer-phone;}
        .phone-input{ grid-area: phone-input; }

        .customer-email{ grid-area: customer-email;}
        .email-input{ grid-area: email-input; }

        .customer-password{ grid-area: customer-password;}
        .password-input{ grid-area: password-input; }

        .grid-footer{ grid-area: grid-footer; }

        .grid-container{
            display: grid;
            grid-template-areas:
                'grid-header grid-header'
                'customer-fname fname-input'
                'customer-lname lname-input'
                'customer-address address-input'
                'customer-city city-input'
                'customer-state state-input'
                'customer-zip zip-input'
                'customer-phone phone-input'
                'customer-email email-input'
                'customer-password password-input'
                'grid-footer grid-footer'
        ;
            border: 1px solid black;
        }

        .grid-container > div {
            border: 1px solid black;
            text-align: center;
        }

        .grid-container input[type= "text"]{
            width: 98%;
            margin: 2px  0;
        }

    </style>
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
        <form method="get">
            <div class = "grid-container">

                <div class="grid-header">
                    <h3>Add new customer</h3>
                </div>

                <div class="customer-fname">
                    <label for="txtFName">First Name</label>
                </div>
                <div class="fname-input">
                    <input type="text" name="txtFName" id="txtFName">
                </div>

                <div class="customer-lname">
                    <label for="txtLName">Last Name</label>
                </div>
                <div class="lname-input">
                    <input type="text" name="txtLName" id="txtLName">
                </div>

                <div class="customer-address">
                    <label for="txtAddress">Address</label>
                </div>
                <div class="address-input">
                    <input type="text" name="txtAddress" id="txtAddress">
                </div>

                <div class="customer-city">
                    <label for="txtCity">City</label>
                </div>
                <div class="city-input">
                    <input type="text" name="txtCity" id="txtCity">
                </div>

                <div class="customer-state">
                    <label for="txtState">State</label>
                </div>
                <div class="state-input">
                    <input type="text" name="txtState" id="txtState">
                </div>

                <div class="customer-zip">
                    <label for="txtZip">Zip</label>
                </div>
                <div class="zip-input">
                    <input type="text" name="txtZip" id="txtZip">
                </div>

                <div class="customer-phone">
                    <label for="txtPhone">Phone</label>
                </div>
                <div class="phone-input">
                    <input type="text" name="txtPhone" id="txtPhone">
                </div>

                <div class="customer-email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail">
                </div>

                <div class="customer-password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="password-input">
                    <input type="text" name="txtPassword" id="txtPassword">
                </div>

                <div class="grid-footer">
                    <input type="submit" value="Add Customer">
                </div>

            </div>
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>