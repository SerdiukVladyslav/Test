<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href ="styles/styles.css" rel="stylesheet">
    <title>Test</title>
</head>
<body>
<?php
    session_start();
    if (isset($_POST['test1'])) {
        if (count($_POST['test1']) === 10) {
            $res2 = 0;
            $results = $_POST['test1'];
            $quest_answer = $_SESSION['test2array'];
            for ($i = 0; $i < count($quest_answer); $i++) {
                $separate = explode(";", $quest_answer[$i]);
                $answers = explode(",", $separate[5]);
                $diff = array_diff($answers, $results[$i]);
                if (count($diff) == 0) {
                    $res2 += 3;
                }
            }
            $_SESSION['test2'] = $res2;

            echo '<div class = "divWrapper col">';
            echo ' <h1>Test3</h1>';
            echo '<div>';
            echo '  <form action ="result.php" method="POST">';

            $content = file_get_contents("test3.txt");
            $quest_answer = explode("|", $content);
            array_pop($quest_answer);
            shuffle($quest_answer);
            $_SESSION['test3array'] = $quest_answer;
            for ($i = 0; $i < count($quest_answer); $i++) {
                $separate = explode(";", $quest_answer[$i]);
                $j = $i + 1;
                echo "<h3>$j.$separate[1]</h3>";
                echo "<input name ='test3$i' type='text'><br />";
            }

            echo '<input class="submit" type="submit" value="Next">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
        else {
            echo "<span>You must answer all questions from the previous test!<span>";
        }
    }
?>
</body>
</html>
