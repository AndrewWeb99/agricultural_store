<?php
session_start();
include("../../templates/connect.php");
$id = $_POST['id'];

$res = $conn->query("SELECT * FROM catalog WHERE tovar_id = " . $id);
$res = mysqli_fetch_assoc($res);


$names = $_POST['name'];
$category = $_POST['category'];
$model = $_POST['model'];
$art = $_POST['art'];
$price = $_POST['price'];
$desc = $_POST['desc'];


if ($_FILES['image']['name'] == '') {
    $conn->query("UPDATE `catalog` SET `name` = '$names', `model` = '$model', `artikul` = $art, `price` = $price, `description` = '$desc', `category_id` = $category WHERE `catalog`.`tovar_id` = $id");
} else {
    $del = "../../img/tovar/" . $res['img'];
    $delete = unlink($del);

    $name = $_FILES['image']['name'];
    $ext = end(explode('.', $name));
    $name = uniqid('tovar_') . rand(000, 999) . '.' . $ext;
    $two_path = $_FILES['image']['tmp_name'];
    $one_path = "../../img/tovar/" . $name;
    $upload = move_uploaded_file($two_path, $one_path);

    $conn->query("UPDATE `catalog` SET `name` = '$names', `img` = '$name', `model` = '$model', `artikul` = $art, `price` = $price, `description` = '$desc', `category_id` = $category WHERE `catalog`.`tovar_id` = $id");
}




header('Location: /admin/product_manage.php');
