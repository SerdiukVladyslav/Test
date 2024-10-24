<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href ="/styles/styles.css" type="text/css" rel="stylesheet">
    <title>Test</title>
</head>
<body>
<?php
    session_start();
    if (isset($_REQUEST["test0"]) && isset($_REQUEST["test1"]) && isset($_REQUEST["test2"]) && isset($_REQUEST["test3"]) && isset($_REQUEST["test4"]) && isset($_REQUEST["test5"]) && isset($_REQUEST["test6"]) && isset($_REQUEST["test7"]) && isset($_REQUEST["test8"]) && isset($_REQUEST["test9"])) {
        $res=0;
        $quest_answer = $_SESSION['test1array'];

        for ($i = 0; $i < count($quest_answer); $i++ ) {
            $separate = explode(";", $quest_answer[$i]);
            if ($separate[5] == $_REQUEST["test$i"])
                $res++;
        }

        setcookie("test1", $res);
        echo '<div class = "divWrapper col">';
        echo '<h1>Test2</h1>';
        echo '<div>';
        echo '<form action ="test2.php" method="POST">';
        $content = file_get_contents("test2.txt");
        $quest_answer = explode("|", $content);
        array_pop($quest_answer);
        shuffle($quest_answer);
        $_SESSION['test2array'] = $quest_answer;

        for ($i = 0; $i < count($quest_answer); $i++ ) {
            $separate = explode(";", $quest_answer[$i]);
            $j= $i + 1;
            echo "<h3>$j.$separate[1]</h3>";
            echo"<label><input name ='test1[$i][0]' type='checkbox' value = '1'>$separate[2]</label><br />";
            echo"<label><input name ='test1[$i][1]' type='checkbox' value = '2'>$separate[3]</label><br />";
            echo"<label><input name ='test1[$i][2]' type='checkbox' value = '3'>$separate[4]</label><br />";
        }

        echo '<input class="submit" type="submit" value="Next">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    else {
        echo "<span>You must answer all questions from the previous test!<span>";
    }
?>
</body>
</html>
