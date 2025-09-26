<?php
 $die =[
     'dice_1.png',
     'dice_2.png',
     'dice_3.png',
     'dice_4.png',
     'dice_5.png',
     'dice_6.png'
 ];

 $playerRoll = [$die, $die];
 $cpuRoll = [$die, $die, $die];



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
        <div id="diceGame">
            <h1>The Dice Game</h1>
            <p> Throw your dice</p>
            <br />
            <button name="Throw">

            </button>
        </div>

    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>




