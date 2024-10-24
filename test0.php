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
    if(isset($_REQUEST["name"]))
        $userName = $_REQUEST["name"];
    if ($userName === "")
        $userName = 'Student';
    setcookie("userName", $userName);
?>

<div class = "divWrapper col">
    <h1>Test</h1>
    <div>
        <form action ="test1.php" method="POST">
                <?php
                $content = file_get_contents("test1.txt");
                $quest_answer = explode("|", $content);
                array_pop($quest_answer);
                shuffle($quest_answer);
                $_SESSION['test1array'] = $quest_answer;
                for ($i = 0; $i < count($quest_answer); $i++ ) {
                    $separate = explode(";", $quest_answer[$i]);
                    $j= $i + 1;
                    echo "<h3>$j.$separate[1]</h3>";
                    echo"<label><input name ='test$i' type='radio' value = '1'>$separate[2]</label><br />";
                    echo"<label><input name ='test$i' type='radio' value = '2'>$separate[3]</label><br />";
                    echo"<label><input name ='test$i' type='radio' value = '3'>$separate[4]</label><br />";
                }
                ?>
            <input class="submit" type="submit" value="Next">
        </form>
    </div>
</div>
</body>
</html>
