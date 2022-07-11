<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");

?>
<link rel="stylesheet" href="/css/admin.css">

<body class="admin-body">
    <?php
    include("./templates/header.php");
    include("./templates/adminBar.php");
    include("./templates/function.php");
    ?>
    <main class="admin-main">
        <section class="stat-admin">
            <form action="/admin/actions/users_add.php" method="post" enctype="multipart/form-data">
                <label for="">ФИО</label>
                <input type="text" name="fio" required><br><br>
                <label for="">Email</label>
                <input type="text" name="email" required><br><br>
                <label for="">Логин</label>
                <input type="text" name="login" required><br><br>
                <label for="">Пароль</label>
                <input type="text" name="pas" required><br><br>
                <label for="">Аватар</label>
                
                <input name="avatar" type="file" required><br><br>
                <select name="type" id="">
                    <option value="user">Пользователь</option>
                    <option value="admin">Администратор</option>
                </select><br><br>
                <button type="submit" class="create-Sth">Создать</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>