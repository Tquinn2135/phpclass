<?php

$isHome =$_SERVER['REQUEST_URI'] =='/';
$isLoops = $_SERVER['REQUEST_URI'] =='/loops/';
$isCountdown = $_SERVER['REQUEST_URI'] =='/countdown/';
$is8ball = $_SERVER['REQUEST_URI']== '/8ball';

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
        <li class ="<?$is8ball?>">
            <a href="/8ball">Magic 8 Ball</a>
        </li>
    </ul>
</nav>
