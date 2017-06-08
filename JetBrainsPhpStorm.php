<?php
define("FN",'gb.txt');
if ($_POST['submit']){
    $name = trim(htmlspecialchars($_POST['name']));
    $tct = trim(htmlspecialchars($_POST['text']));
    $str = $name.'||'. $tct ."\r\n";
    if (file_put_contents(FN,$str,FILE_APPEND)){
        $_SESSION['res'] = " Длбавлено";
        header("location:JetBrainsPhpStorm.php");
        exit;
    }
}
echo $_SESSION['res'];
unset($_SESSION['res']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

?>
<form action="" method="post">

    Имя: <br>
    <input type="text" name="name"><br>
    Сообщение: <br>
    <textarea name="text" id="" cols="30" rows="5"></textarea>
    <br>
    <input type="submit" name="submit" value="Добавить">
</form>
<hr>
<?php
function fun($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
if(!file_exists(FN))exit;

   $read =  file(FN);
foreach ($read as $key){
    $msg[] = explode('||',$key);
}
$count= count($msg);
for($i=0;$i<$count;$i++){
    echo "<div style='border: 1px solid #cccccc'>";
    echo"<p>". $msg[$i][0]."</p>";
    echo"<p>". $msg[$i][1]."</p>";
    echo "</div>";
}
?>
</body>
</html>