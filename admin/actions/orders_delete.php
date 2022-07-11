<?php
session_start();
include("../../templates/connect.php");
$id = $_GET['id'];

$sql = "delete from orders where order_id = $id";
$result = $conn->query($sql);
header("Location: /admin/orders_manage.php");
