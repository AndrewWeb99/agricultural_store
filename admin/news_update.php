<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");
if (isset($_GET['id'])) {
    $res = $conn->query("SELECT * FROM news where news_id = " . $_GET['id']);
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
            <form action="/admin/actions/news_update.php" method="post" enctype="multipart/form-data">
                <input value="<?= $res['news_id']; ?>" type="hidden" name="id" required>
                <label for="">Название</label>
                <input value="<?= $res['name']; ?>" type="text" name="name" required><br><br>
                <label for="">Описание</label>
                <textarea name="desc" id="" cols="30" rows="10" required><?= $res['description']; ?></textarea><br><br>
                <label for="">Изображение</label><br><br>
                <img src="/img/news/<?= $res['img']; ?>" alt="" width="170px"><br><br>
                <input name="image" type="file"><br><br>
                <button type="submit" class="create-Sth">Обновить</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>