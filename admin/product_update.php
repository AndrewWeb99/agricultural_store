<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");
if (isset($_GET['id'])) {
    $res = $conn->query("SELECT * FROM catalog where tovar_id = " . $_GET['id']);
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
            <form action="/admin/actions/product_update.php" method="post" enctype="multipart/form-data">
                <input value="<?= $res['tovar_id']; ?>" type="hidden" name="id" required>
                <label for="">Название</label>
                <input value="<?= $res['name']; ?>" type="text" name="name" required><br><br>
                <label for="">Категория</label>
                <select name="category" id="">
                    <?
                    $result = $conn->query("SELECT * FROM category");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?= $row['category_id'] ?>" <? if ($res['category_id'] == $row['category_id']) echo 'selected'; ?>><?= $row['category_name'] ?></option>
                    <?
                    }
                    ?>
                </select><br><br>
                <label for="">Изображение</label><br><br>
                <img src="/img/tovar/<?= $res['img'] ?>" alt="" width="170px">
                <input name="image" type="file"><br><br>
                <label for="">Модель</label>
                <input value="<?= $res['model']; ?>" type="text" name="model" required><br><br>
                <label for="">Артикул</label>
                <input value="<?= $res['artikul']; ?>" type="num" name="art" required><br><br>
                <label for="">Цена</label>
                <input value="<?= $res['price']; ?>" type="num" name="price" required><br><br>
                <label for="">Описание</label>
                <textarea name="desc" id="" cols="30" rows="10" required><?= $res['description']; ?></textarea><br><br>

                <button type="submit" class="create-Sth">Обновить</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>