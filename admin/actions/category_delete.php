<?php
session_start();
include("../../templates/connect.php");
$category_id = $_GET['id'];

$sql = "delete from category where category_id = $category_id";
$result = $conn->query($sql);
header("Location: /admin/category.php");
