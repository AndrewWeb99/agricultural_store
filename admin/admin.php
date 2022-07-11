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
            <h1>Статистика</h1>
            <div class="stat-container">
                <div class="stat-card">
                    <h2>Ассортимент предлагает</h2>
                    <p><span><?= numberGoods(); ?></span> вида товаров</p>
                </div>

                <div class="stat-card">
                    <h2>На сайте опубликовано</h2>
                    <p><span><?= numberNews(); ?></span> новости</p>
                </div>

                <div class="stat-card">
                    <h2>Оформлено</h2>
                    <p><span><?= numberOrders(); ?></span> заказов</p>
                </div>

                <div class="stat-card">
                    <h2>На сайте оставлено</h2>
                    <p><span><?= numberComments(); ?></span> комментариев</p>
                </div>
            </div>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>