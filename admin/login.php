<?php
session_start();
if ($_SESSION['user']) {
    if ($_SESSION['user']['type_of_user'] == "user") {
        header('Location: ../pages/profile.php');
    } else {
        if ($_SESSION['user']['type_of_user'] == "admin") {
            header('Location: admin.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/883f4eba84.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("../templates/connect.php");
    ?>
    <section class="form-container">
        <form action="../vendor/signin.php" method="post">
            <h1>Авторизация</h1>
            <div class="form-item">
                <label for="">Логин</label>
                <input type="text" name="username" id="" placeholder="Введите логин" required>
            </div>
            <div class="form-item">
                <label for="">Пароль</label>
                <input type="password" name="password" id="" placeholder="Введите пароль" required>
            </div>
            <button type="submit">Войти</button>
            <p>
                У вас нет аккаунта? - <a href="registration.php">Зарегистрируйтесь!</a>
            </p>
            <p class="return">
                <a href="../index.php" style="color:#fff;"><i class="fas fa-undo-alt"></i> Вернуться на главную</a>
            </p>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="alert alert-danger">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </section>

</body>

</html>