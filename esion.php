<?php
session_start();
$form = $_POST['submit'];
if($_POST['submit']){
    $_SESSION['name']=$_POST['name'];
    $_SESSION['age']=$_POST['age'];
    header("location:esion.php");
    echo '<p>Меня зовут:</p>'.$_POST['name'].'<p> Мне</p>'.$_POST['age'].'<p>года</p>';


}    echo $_SESSION['name'].$_SESSION['age'];
?>