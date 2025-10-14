<?php

$isHome =$_SERVER['REQUEST_URI'] =='/';
$isLoops = $_SERVER['REQUEST_URI'] =='/loops/';
$isCountdown = $_SERVER['REQUEST_URI'] =='/countdown/';
$is8ball = $_SERVER['REQUEST_URI']== '/8ball';
$isDiceGame = $_SERVER['REQUEST_URI']== '/dicegame';
$isMovieList = $_SERVER['REQUEST_URI']== '/movielist';
$isCustomerList = $_SERVER['REQUEST_URI']== '/customerlist';
?><nav>
    <ul>
        <li class="<?=$isHome?>">
            <a href="/">Home</a>
        </li>
        <li class = "<?=$isLoops?>">
            <a href="/loops">Loops</a>
        </li>
        <li class = "<?=$isCountdown?>">
            <a href="/countdown">Countdown</a>
        </li>
        <li class ="<?=$is8ball?>">
            <a href="/8ball">Magic 8 Ball</a>
        </li>
        <li class ="<?=$isDiceGame?>">
            <a href="/dicegame">Dice Game</a>
        </li>
        <li class ="<?=$isMovieList?>">
            <a href="/movielist">Movie List</a>
        </li>
        <li class="<?=$isCustomerList?>">
            <a href="/customerlist">Customer List</a>
        </li>
    </ul>
</nav>
