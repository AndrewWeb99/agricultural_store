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
            <div class="stat-admin-name">
                <h1>Товары</h1>
                <div class="stat-admin-name-button">
                    <a href="/admin/product_add.php">
                        <button class="create-Sth"><i class="fas fa-plus-square"></i> Добавить товар</button>
                    </a>
                </div>
            </div>
            <div class="table-container">
                <div class="table-line">
                    <div class="table-line-item">Название</div>
                    <div class="table-line-item">Категория</div>
                    <div class="table-line-item">Модель</div>
                    <div class="table-line-item">Изображение</div>
                    <div class="table-line-item">Артикул</div>
                    <div class="table-line-item">Цена</div>
                    <div class="table-line-item">Действие</div>
                </div>
                <?php
                $result = outputGoods();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="table-line">
                            <div class="table-line-item"><?= $row['name']; ?></div>
                            <div class="table-line-item"><?
                            $sqls = $conn->query("SELECT * FROM category WHERE category_id = ".$row['category_id']);
                            $sqls = mysqli_fetch_assoc($sqls);
                            echo $sqls['category_name'];
                            ?></div>
                            <div class="table-line-item"><?= $row['model']; ?></div>
                            <div class="table-line-item"><img src="/img/tovar/<?=$row['img']; ?>" alt=""></div>
                            <div class="table-line-item"><?= $row['artikul']; ?></div>
                            <div class="table-line-item"><?= $row['price']; ?></div>
                            <div class="table-line-item">
                                <a href="/admin/actions/product_delete.php?id=<?=$row['tovar_id'];?>">
                                    <button class="delete-Sth"><i class="fas fa-trash"></i></button>
                                </a>
                                <a href="/admin/product_update.php?id=<?=$row['tovar_id'];?>">
                                    <button class="update-Sth"><i class="fas fa-pen"></i></button>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>