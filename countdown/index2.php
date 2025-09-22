<?php
$secPerMin = 60;
$secPerhour = 60 * $secPerMin;
$secPerDay = 24 * $secPerhour;
$secPerYear = 365 * $secPerDay;

$now = time();
$semesterEnd = mktime(12, 0, 0, 12 ,20,2025);

//Number in seconds
$seconds = $semesterEnd -$now;

//years
$years = floor($seconds/$secPerYear);
$seconds = $seconds - ($years * $secPerYear);

$days = floor($seconds/$secPerDay);
$seconds = $seconds - ($days * $secPerDay);

$hours = floor($seconds/$secPerhour);
$seconds = $seconds - ($hours*$secPerhour);

$minutes = floor($seconds / $secPerMin);
$seconds = $seconds - ($minutes *$secPerMin)

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
        <h3>Time left in the Fall Semester</h3>
        <span>Years:<?=$years?></span>
        <span>Days:<?=$days?></span>
        <span>Hours:<?=$hours?></span>
        <span>Minutes:<?=$minutes?></span>
        <span>Seconds:<?=$seconds?></span>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>





