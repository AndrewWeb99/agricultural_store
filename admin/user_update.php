<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");
if (isset($_GET['id'])) {
    $res = $conn->query("SELECT * FROM users where user_id = " . $_GET['id']);
    $res = mysqli_fetch_assoc($res);
}
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
            <form action="/admin/actions/users_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $res['user_id'] ?>" required>
                <label for="">ФИО</label>
                <input type="text" name="fio" value="<?= $res['full_name'] ?>" required><br><br>
                <label for="">Email</label>
                <input type="text" name="email" value="<?= $res['email'] ?>" required><br><br>
                <label for="">Логин</label>
                <input type="text" name="login" value="<?= $res['username'] ?>" required><br><br>
                <label for="">Новый пароль</label>
                <input type="text" name="pas"><br><br>
                <label for="">Аватар</label><br><br>
                <img src="/img/users/<?= $res['avatar'] ?>" alt="" width="170px">
                <input name="avatar" type="file"><br><br>
                <select name="type" id="">
                    <option <? if ($res['type_of_user'] == 'user') echo 'selected'; ?> value="user">Пользователь</option>
                    <option <? if ($res['type_of_user'] == 'admin') echo 'selected'; ?> value="admin">Администратор</option>
                </select><br><br>
                <button type="submit" class="create-Sth">Обновить</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>