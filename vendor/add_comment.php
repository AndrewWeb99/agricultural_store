<?php
session_start();
include("../templates/connect.php");
$user_id = $_SESSION['user']['user_id'];
$tovar_id = $_GET['id'];
$comment = $_POST['comment'];



if (isset($_SESSION['user'])) {
    $sql = "INSERT INTO `comments` (`comment_id`, `user_id`, `tovar_id`, `text`, `date`) VALUES (NULL, '$user_id', '$tovar_id', '$comment', now())";
    $result = $conn->query($sql);
    if (!$result) {
        $_SESSION['warning'] = "Произошла ошибка";
    }
    header("Location: ../pages/tovar.php?id=" . $tovar_id);
} else {
    $_SESSION['warning'] = "Необходимо авторизироваться!";
    header("Location: ../pages/tovar.php?id=" . $tovar_id);
}
