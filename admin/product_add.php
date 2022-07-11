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
            <form action="/admin/actions/product_add.php" method="post" enctype="multipart/form-data">
                <label for="">Название</label>
                <input type="text" name="name" required><br><br>
                <label for="">Категория</label>
                <select name="category" id="">
                    <?
                    $result = $conn->query("SELECT * FROM category");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                    <?
                    }
                    ?>
                </select><br><br>
                <label for="">Изображение</label>
                <input name="image" type="file" required><br><br>
                <label for="">Модель</label>
                <input type="text" name="model" required><br><br>
                <label for="">Артикул</label>
                <input type="num" name="art" required><br><br>
                <label for="">Цена</label>
                <input type="num" name="price" required><br><br>
                <label for="">Описание</label>
                <textarea name="desc" id="" cols="30" rows="10" required></textarea><br><br>

                <button type="submit" class="create-Sth">Создать</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>