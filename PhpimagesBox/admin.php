<?php
require_once 'config.php';
$title = $_GET['title'];
$url = $_GET['url'];
$parrentid = $_GET['parrentid'];
$mysqlconect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
if (!$mysqlconect) die('Невозможно подключиться к базе данних' . mysqli_error($mysqlconect));
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $qvery_del = "DELETE FROM `menu` WHERE `id` = $del";
    $delet = mysqli_query($mysqlconect, $qvery_del);
}
if (isset($_GET['edit'])) {
    $getedit = $_GET['edit'];
    $qvery_edit = "SELECT * FROM `menu` WHERE `id` = $getedit";
    $edit = mysqli_query($mysqlconect, $qvery_edit);
    $msqlfetchEdit = mysqli_fetch_assoc($edit);

}


if (isset($_GET['submit'])) {
    $add = $_GET['submit'];
    $id = $msqlfetchEdit['id'];
    $qvery_add = " UPDATE `menu` SET `title` = '$title' ,`url` ='$url' ,`parentID`= '$parrentid' WHERE `id`= %_GET[]";
    var_dump($msqlfetchEdit['id']) ;
    $msqlAdd = mysqli_query($mysqlconect, $qvery_add);

}
if (isset($_GET['sub'])) {
    $addtable = $_GET['sub'];
    $insertadd = "INSERT INTO `menu`(`title`, `url`, `parentID`) VALUES ('$title','$url','$parrentid')";
    $insert = mysqli_query($mysqlconect, $insertadd);
}
$gvery = 'SELECT * FROM `menu`';
$result = mysqli_query($mysqlconect, $gvery);
if (!$result) die("виполнение запроза не возможно" . mysqli_error($mysqlconect));
$msqlfetch = mysqli_fetch_all($result, 1);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="jquery-3.2.1.min%20(1).js"></script>
    <!-- Latest compiled and minified JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                  data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a>
        </li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <form action="" method="get">

                <input type="submit" name="addtab" value="Добавить"
                       style="display: inline-block;padding: 5px; margin: 10px;">
            </form>

            <?php
            foreach ($msqlfetch as $key) {
                ?>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <?= $key['title']; ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php?del=<?= $key['id'] ?>">Удалить</a></li>
                        <li><a href="admin.php?edit=<?= $key['id'] ?>">Редактировать</a></li>
                    </ul>
                </div>

                <?php
            }
            ?>
            <br><br><br><br>
            <?php
            if ((isset($_GET['edit']))) {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">


                            <form method="get" style="display: inline-block">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           value="<?= $msqlfetchEdit['title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">URL</label>
                                    <input type="text" name="url" class="form-control" id="exampleInputPassword1"
                                           value="<?= $msqlfetchEdit['url'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">ParrentID</label>
                                    <input type="text" name="parrentid" id="exampleInputFile"
                                           value="<?= $msqlfetchEdit['parrentID'] ?>">
                                </div>
                                <input type="hidden" name="<?= $msqlfetchEdit['id'] ?>">
                                <?= var_dump($msqlfetchEdit['id']) ?>
                                <input type="submit" name="submit" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>


                <?php
            }
            ?>

        </div>
        <?php
        if ($_GET['addtab']) {
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">


                        <form method="get" style="display: inline-block">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                       value="<?= $msqlfetchEdit['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">URL</label>
                                <input type="text" name="url" class="form-control" id="exampleInputPassword1"
                                       value="<?= $msqlfetchEdit['url'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">ParrentID</label>
                                <input type="text" name="parrentid" id="exampleInputFile"
                                       value="<?= $msqlfetchEdit['parrentID'] ?>">
                            </div>
                            <input type="hidden" name="id" name="<?= $msqlfetchEdit['id'] ?>">
                            <input type="submit" name="sub" class="btn btn-default">Submit</input>
                        </form>
                    </div>
                </div>
            </div>

            <?php

        }
        ?>
        <div role="tabpanel" class="tab-pane" id="profile"></div>
        <div role="tabpanel" class="tab-pane" id="messages"></div>
        <div role="tabpanel" class="tab-pane" id="settings"></div>
    </div>
</div>

</body>
</html>
