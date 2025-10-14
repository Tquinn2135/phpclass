<?php
session_start();

    if(isset($_POST["txtQuestion"])){
        $question = $_POST["txtQuestion"];
    }
    else{
        $question = "";
    }

    if(isset($_SESSION["PrevQuest"])){
        $PrevQuest = $_SESSION["PrevQuest"];
    }
    else{
        $PrevQuest = "";
    }

    if($question == ""){
        $anwser = "Ask me a question";
    }
    elseif (substr($question,-1)!="?"){
        $anwser = "Ask in the form of a question! (?)";
    }
    elseif ($question == $PrevQuest){
        $anwser = "Ask a new question!";
    }
    else {
        $responses = array( "Ask again later",
            "Yes",
            "No",
            "It appears to be so",
            "Definitely",
            "Without a doubt",
            "Very doubtful",
            "Most likely",
            "Better not tell you now",
            "Concentrate and ask again",
            "Don't count on it",
            "Outlook not so good",
            "Signs point to yes",
            "Yes, definitely",
            "You may rely on it",
            "Reply hazy, try again",
            "Cannot predict now",
            "Outlook good",
            "As I see it, yes",
            "Don't bet on it");

        $iResponse = mt_rand(0, 19);

        $anwser = $responses[$iResponse];
        $_SESSION["PrevQuest"]= $question;

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
        <h2>The Magic 8 Ball</h2>
        <br />
        <div class = "promptAnwser">
            <p><?=$anwser?></p>
        </div>

        <br />
        <form method="post">
            <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>">
            <input type="submit" value="Ask the 8 ball">
        </form>

    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>




