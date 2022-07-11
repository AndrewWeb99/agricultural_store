<?php
session_start();
include("../../templates/connect.php");
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM catalog WHERE tovar_id = " . $id);
$res = mysqli_fetch_assoc($res);

$del = "../../img/tovar/" . $res['img'];
$delete = unlink($del);

$sql = "delete from catalog where tovar_id = $id";
$result = $conn->query($sql);

header("Location: /admin/product_manage.php");
