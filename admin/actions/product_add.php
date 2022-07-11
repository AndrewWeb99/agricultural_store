<?php
session_start();
include("../../templates/connect.php");

$names = $_POST['name'];
$category = $_POST['category'];
$model = $_POST['model'];
$art = $_POST['art'];
$price = $_POST['price'];
$desc = $_POST['desc'];

$name = $_FILES['image']['name'];
$ext = end(explode('.', $name));
$name = uniqid('tovar_') . rand(000, 999) . '.' . $ext;
$two_path = $_FILES['image']['tmp_name'];
$one_path = "../../img/tovar/" . $name;
$upload = move_uploaded_file($two_path, $one_path);



$conn->query("INSERT INTO `catalog` (`tovar_id`, `name`, `img`, `model`, `artikul`, `price`, `description`, `category_id`) VALUES (NULL, '$names', '$name', '$model', $art, $price, '$desc', $category)");

header('Location: /admin/product_manage.php');
