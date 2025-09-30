<?php
session_start();

if(isset($_POST["btnRoll"])){
    $pScore = $_POST["btnRoll"];
}

 $pDice1= mt_rand(1,6);
 $pDice2= mt_rand(1,6);

 $pScore = $pDice1 + $pDice2;

 $cpuDice1= mt_rand(1,6);
 $cpuDice2= mt_rand(1,6);
 $cpuDice3= mt_rand(1,6);

 $cpuScore = $cpuDice1 + $cpuDice2 + $cpuDice3;
if($cpuScore == $pScore){
    $winner = "No one";
}
 if ($pScore >= $cpuScore){
     $winner= "Player";
 }
 else{
     $winner = "Computer Player";
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
        <div id="diceGame">
            <h1>The Dice Game</h1>
            <br>
            <p> Throw your dice</p>
            <br />
            <form method="post">
                <button type="submit" name="btnRoll">Roll Dice</button>
            </form>
            <div id="playerThrow">
                <img src="/images/dice_<?=$pDice1?>.png" alt="">
                <img src="/images/dice_<?=$pDice2?>.png" alt="">
            </div>
            <div id="computerThrow">
                <img src="/images/dice_<?=$cpuDice1?>.png" alt="">
                <img src="/images/dice_<?=$cpuDice2?>.png" alt="">
                <img src="/images/dice_<?=$cpuDice3?>.png" alt="">
            </div>
            <div id="playerScore">
                Player Score: <?=$pScore?>
            </div>
            <br>
            <div id="computerScore">
                <p>
                    Computer Score: <?=$cpuScore?>
                </p>
                <br>
            </div>
            <p>
                <?=$winner?> Wins!!!
            </p>
        </div>

    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>




