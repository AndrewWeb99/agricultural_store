<?php
session_start();
include("../templates/connect.php");
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "select * from users where username = '$username' and password = '$password'";
$result = $conn->query($sql);
$count = $result->num_rows;

if ($count > 0) {
    $user = $result->fetch_assoc();

    $_SESSION['user'] = [
        "user_id" => $user["user_id"],
        "username" => $user["username"],
        "full_name" => $user["full_name"],
        "avatar" => $user["avatar"],
        "email" => $user["email"],
        "type_of_user" => $user["type_of_user"]
    ];
    if ($_SESSION['user']['type_of_user'] == "admin") {
        header('Location:/admin/admin.php');
    } elseif ($_SESSION['user']['type_of_user'] == "user") {
        header('Location:/pages/profile.php');
    }
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: /admin/login.php');
}
