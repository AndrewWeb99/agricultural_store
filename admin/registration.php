<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/883f4eba84.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("../templates/connect.php");
    ?>
    <section class="form-container">
        <form action="../vendor/signup.php" method="post" enctype="multipart/form-data">
            <h1>Регистрация</h1>
            <div class="form-item">
                <label for="">Логин</label>
                <input type="text" name="username" id="" placeholder="Введите логин" required>
            </div>
            <div class="form-item">
                <label for="">Имя пользователя</label>
                <input type="text" name="fullname" id="" placeholder="Введите имя пользователя" required>
            </div>
            <div class="form-item">
                <label for="">Изображение профиля</label>
                <input type="file" name="avatar" id="">
            </div>
            <div class="form-item">
                <label for="">Email</label>
                <input type="email" name="email" id="" placeholder="Введите email" required>
            </div>
            <div class="form-item">
                <label for="">Пароль</label>
                <input type="password" name="password" id="" placeholder="Введите пароль" required>
            </div>
            <div class="form-item">
                <label for="">Подтверждение пароля</label>
                <input type="password" name="password_confirm" id="" placeholder="Подтвердите пароль" required>
            </div>

            <button type="submit">Зарегистрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="login.php">Авторизируйтесь!</a>
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