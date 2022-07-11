<?php
session_start();
include("../templates/connect.php");
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password == $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = "Ошибка при загрузке сообщения";
        header('Location: ../admin/registration.php');
    }

    $password = md5($password);

    $sql = "INSERT INTO `users` (`user_id`, `username`, `full_name`, `avatar`, `email`, `password`, `type_of_user`) VALUES (NULL, '$username', '$fullname', '$path', '$email', '$password', 'user')";

    $result = $conn->query($sql);

    $_SESSION['message'] = "Регистрация прошла успешно!";
    header('Location: ../admin/login.php');
} else {
    $_SESSION['message'] = "Пароли не совпадают!";
    header('Location: ../admin/registration.php');
}
