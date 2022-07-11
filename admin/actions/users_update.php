<?php
session_start();
include("../../templates/connect.php");

$id = $_POST['id'];
$res = $conn->query("SELECT * FROM users WHERE user_id = " . $id);
$res = mysqli_fetch_assoc($res);

$fio = $_POST['fio'];
$email = $_POST['email'];
$login = $_POST['login'];
$pas = $_POST['pas'];
$type = $_POST['type']; 

if ($pas == '') {
    $pas = $res['password'];
} else {
    $pas = md5($_POST['pas']);
}

if ($_FILES['avatar']['name'] == '') {
    $conn->query("UPDATE `users` SET `username` = '$login', `full_name` = '$fio', `email` = '$email', `password` = '$pas', `type_of_user` = '$type' WHERE `users`.`user_id` = $id");
} else {
    $del = "../../img/users/" . $res['avatar'];
    $delete = unlink($del);

    $name = $_FILES['avatar']['name'];
    $ext = end(explode('.', $name));
    $name = uniqid('user_') . rand(000, 999) . '.' . $ext;
    $two_path = $_FILES['avatar']['tmp_name'];
    $one_path = "../../img/users/" . $name;
    $upload = move_uploaded_file($two_path, $one_path);

    $conn->query("UPDATE `users` SET `username` = '$login', `full_name` = '$fio', `avatar` = '$name', `email` = '$email', `password` = '$pas', `type_of_user` = '$type' WHERE `users`.`user_id` = $id");
}






header('Location: /admin/users.php');
