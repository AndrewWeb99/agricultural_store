<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
include("../templates/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/883f4eba84.js" crossorigin="anonymous"></script>
</head>