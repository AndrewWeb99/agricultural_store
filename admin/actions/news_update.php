<?php
session_start();
include("../../templates/connect.php");
$id = $_POST['id'];

$res = $conn->query("SELECT * FROM news WHERE news_id = " . $id);
$res = mysqli_fetch_assoc($res);


$names = $_POST['name'];
$desc = $_POST['desc'];
$date = date('Y-m-d');

if ($_FILES['image']['name'] == '') {
    $conn->query("UPDATE `news` SET `name` = '$names', `description` = '$desc', `date` = '$date' WHERE `news`.`news_id` = $id");
} else {
    $del = "../../img/news/" . $res['img'];
    $delete = unlink($del);

    $name = $_FILES['image']['name'];
    $ext = end(explode('.', $name));
    $name = uniqid('news_') . rand(000, 999) . '.' . $ext;
    $two_path = $_FILES['image']['tmp_name'];
    $one_path = "../../img/news/" . $name;
    $upload = move_uploaded_file($two_path, $one_path);

    $conn->query("UPDATE `news` SET `name` = '$names', `description` = '$desc', `img` = '$name', `date` = '$date' WHERE `news`.`news_id` = $id");
}




header('Location: /admin/news_manage.php');
