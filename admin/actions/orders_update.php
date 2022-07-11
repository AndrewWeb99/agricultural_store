<?php
session_start();
include("../../templates/connect.php");

$id = $_POST['id'];
$status = $_POST['status'];

$conn->query("UPDATE `orders` SET `status` = '$status' WHERE `orders`.`order_id` = $id");
header('Location: /admin/orders_manage.php');
