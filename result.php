<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href ="/styles/styles.css" type="text/css" rel="stylesheet">
    <title>Test</title>
</head>
<body>
<?php
    if (isset($_REQUEST["test30"]) && isset($_REQUEST["test31"]) && isset($_REQUEST["test32"]) && isset($_REQUEST["test33"]) && isset($_REQUEST["test34"]) && isset($_REQUEST["test35"]) && isset($_REQUEST["test36"]) && isset($_REQUEST["test37"]) && isset($_REQUEST["test38"]) && isset($_REQUEST["test39"])){
        session_start();
        $res3=0;
        $quest_answer = $_SESSION['test3array'];
        for ($i = 0; $i < count($quest_answer); $i++ ) {
            $separate = explode(";", $quest_answer[$i]);
            $comp = strcasecmp(trim($separate[2], $characters = " "),trim($_REQUEST["test3$i"], $characters = " "));
            if(  $comp == 0){
                $res3+=5;
            }
        }
        $result = $_SESSION['test2'] + $_COOKIE["test1"] + $res3;
        echo '<div class = "divWrapper col">';
        echo '<h1>'.$_COOKIE["userName"].'! '.'</h1>'.'<h1>Your result:</h1>';
        echo ' <div class = "result">';
        echo $result;
        echo '</div>';
        echo '</div>';
    }
    else {
        echo "<span>You must answer all questions from the previous test!<span>";
    }
?>
</body>
</html>
