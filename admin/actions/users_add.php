<?php
session_start();
include("../../templates/connect.php");

$fio = $_POST['fio'];
$email = $_POST['email'];
$login = $_POST['login'];
$pas = md5($_POST['pas']);
$type = $_POST['type'];

$name = $_FILES['avatar']['name'];
$ext = end(explode('.', $name));
$name = uniqid('user_') . rand(000, 999) . '.' . $ext;
$two_path = $_FILES['avatar']['tmp_name'];
$one_path = "../../img/users/" . $name;
$upload = move_uploaded_file($two_path, $one_path);



$conn->query("INSERT INTO `users` (`user_id`, `username`, `full_name`, `avatar`, `email`, `password`, `type_of_user`) VALUES (NULL, '$login', '$fio', '$name', '$email', '$pas', '$type')");

header('Location: /admin/users.php');
