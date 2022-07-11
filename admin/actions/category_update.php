<?php
session_start();
include("../../templates/connect.php");

$id = $_POST['id'];
$name = $_POST['name'];

$conn->query("UPDATE `category` SET `category_name` = '$name' WHERE `category`.`category_id` = $id");
header('Location: /admin/category.php');
