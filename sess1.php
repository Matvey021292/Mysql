<?php
session_start();
$_SESSION['name'] = 'Matvey';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document1</title>
</head>
<body>

<a href="sess1.php">sess1</a> | <a href="sess2.php">sess2</a>| <a href="sess3.php">sess3</a> |<a href="sess4.php">sess4</a>
<hr>
<p>Страница 1: Привет , <?php
    echo $_SESSION['name'];
    ?></p>
<!--<form action="" method="get">-->
<!--    <input type="text" name="name">-->
<!--    <input type="submit" name="submit">-->
<!--</form>-->
</body>
</html>