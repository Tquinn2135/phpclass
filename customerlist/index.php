<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tom's Website</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        h2 {
            text-align: center;
        }
        table{
            border: 1px solid black;
            width: 80%;
            margin:  10px auto;
            table-layout: fixed;
        }
        tr{
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: .2rem;
            text-align: center;
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
        <h2>Customer List</h2>
        <table>
            <tr>
                <th>CustomerID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>phone</th>
                <th>email</th>
                <th>password</th>
            </tr>
        
<?php
include "../includes/db.php";
$con = getDBConnection();
$result = mysqli_query($con,"SELECT * FROM customers");

while ($row = mysqli_fetch_array($result)){

    $CustomerID = $row["CustomerID"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $address = $row["address"];
    $city = $row["city"];
    $state = $row["state"];
    $zip = $row["zip"];
    $phone = $row["phone"];
    $email = $row["email"];
    $password = "Hidden";

    echo "<tr>";
    echo "    <td>$CustomerID</td>";
    echo "    <td>";
    echo "    <a href='customer.php?id=$CustomerID'>$firstName</a>";
    echo "    </td>";
    echo "    <td>$lastName</td>";
    echo "    <td>$address</td>";
    echo "    <td>$city</td>";
    echo "    <td>$state</td>";
    echo "    <td>$zip</td>";
    echo "    <td>$phone</td>";
    echo "    <td>$email</td>";
    echo "    <td>$password</td>";
    echo "</tr>";
}
?>
        </table>
        <a href="addcustomer.php">Add New Customer</a>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>