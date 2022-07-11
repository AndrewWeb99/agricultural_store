<?php
session_start();
include("../../templates/connect.php");
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM news WHERE news_id = " . $id);
$res = mysqli_fetch_assoc($res);

$del = "../../img/news/" . $res['img'];
$delete = unlink($del);

$sql = "delete from news where news_id = $id";
$result = $conn->query($sql);

header("Location: /admin/news_manage.php");
