<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");

?>

<body class="admin-body">
    <?php
    include("./templates/header.php");
    include("./templates/adminBar.php");
    include("./templates/function.php");
    ?>
    <main class="admin-main">
        <section class="stat-admin">
            <div class="stat-admin-name">
                <h1>Новости</h1>
                <div class="stat-admin-name-button">
                    <a href="/admin/news_add.php">
                        <button class="create-Sth"><i class="fas fa-plus-square"></i> Добавить новость</button>
                    </a> 
                </div>
            </div>
            <div class="table-container">
                <div class="table-line">
                    <div class="table-line-item">Название</div>
                    <div class="table-line-item" style="width:30%">Описание</div>
                    <div class="table-line-item">Изображение</div>
                    <div class="table-line-item">Дата</div>
                    <div class="table-line-item" style="width:0%"></div>
                    <div class="table-line-item">Действие</div>
                </div>
                <?php
                $result = outputNews();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="table-line">
                            <div class="table-line-item"><?= $row['name']; ?></div>
                            <div class="table-line-item" style="width:30%"><?= $row['description']; ?></div>
                            <div class="table-line-item"><img src="/img/news/<?= $row['img']; ?>" alt=""></div>
                            <div class="table-line-item"><?= $row['date']; ?></div>
                            <div class="table-line-item" style="width:0%"></div>
                            <div class="table-line-item">
                                <a href="/admin/actions/news_delete.php?id=<?= $row['news_id']; ?>">
                                    <button class="delete-Sth"><i class="fas fa-trash"></i></button>
                                </a>
                                <a href="/admin/news_update.php?id=<?= $row['news_id']; ?>">
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