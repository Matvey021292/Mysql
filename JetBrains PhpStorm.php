<?php
session_start("fole.txt","w");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    echo $_COOKIE['name'];
?>
</body>
</html>