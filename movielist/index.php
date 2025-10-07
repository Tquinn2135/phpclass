
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
        <h2>My Movie List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rating</th>
            </tr>
            <tr>
                <td>456</td>
                <td>Jaws</td>
                <td>R</td>
            </tr>
            <tr>
                <td>321</td>
                <td>The Little Mermaid</td>
                <td>G</td>
            </tr>
<?php
   include "../includes/db.php";
   $con = getDBConnection();
    $result = mysqli_query($con,"SELECT * FROM movielist");

    while ($row = mysqli_fetch_array($result)){

        $movieID = $row["MovieID"];
        $movieTitle = $row["MovieTitle"];
        $movieRating = $row["MovieRating"];

        echo "<tr>";
        echo "    <td>$movieID</td>";
        echo "    <td>$movieTitle</td>";
        echo "    <td>$movieRating</td>";
        echo "</tr>";
    }
?>
        </table>
        <a href="addmovie.php">Add a new Movie</a>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>