<?php
session_start();
include("../../templates/connect.php");
$user_id = $_GET['id'];
$res = $conn->query("SELECT * FROM users WHERE user_id = " . $user_id);
$res = mysqli_fetch_assoc($res);

$del = "../../img/users/" . $res['avatar'];
$delete = unlink($del);

$sql = "delete from users where user_id = $user_id";
$result = $conn->query($sql);

header("Location: ../users.php");
