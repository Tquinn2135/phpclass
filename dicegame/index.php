<?php
session_start();

 $die = array();
     $die[0] = 'images/dice_1.png';
     $die[1] = 'images/dice_2.png';
     $die[2] = 'images/dice_3.png';
     $die[3]= 'images/dice_4.png';
     $die[4] = 'images/dice_5.png';
     $die[5] = 'images/dice_6.png';

 $iDie=mt_rand(0,5);

 $playerRoll = [];
 $cpuRoll = [];



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
            <form method="post">
                <button type="submit" name="throw">Roll Dice</button>
            </form>
            <div id="playerThrow">

            </div>
            <div id="computerThrow">

            </div>
        </div>

    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>




