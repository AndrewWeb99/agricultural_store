<?php
session_start();
include("../../templates/connect.php");

$cat = $_POST['name'];

$conn->query("INSERT INTO `category` (`category_id`, `parent_id`, `category_name`) VALUES (NULL, '1', '$cat')");

header('Location: /admin/category.php');
