<?php
session_start();
include("../../templates/connect.php");

$names = $_POST['name'];
$desc = $_POST['desc'];
$date = date('Y-m-d');

$name = $_FILES['image']['name'];
$ext = end(explode('.', $name));
$name = uniqid('news_') . rand(000, 999) . '.' . $ext;
$two_path = $_FILES['image']['tmp_name'];
$one_path = "../../img/news/" . $name;
$upload = move_uploaded_file($two_path, $one_path);



$conn->query("INSERT INTO `news` (`news_id`, `name`, `description`, `img`, `date`) VALUES (NULL, '$names', '$desc', '$name', now())");

header('Location: /admin/news_manage.php');
