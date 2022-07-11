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
                <h1>Заказы</h1>
                
            </div>
            <div class="table-container">
                <div class="table-line">
                    <div class="table-line-item">Номер</div>
                    <div class="table-line-item">Стоимость</div>
                    <div class="table-line-item">Дата</div>
                    <div class="table-line-item">Статус</div>
                    <div class="table-line-item">Действие</div>
                </div>
                <?php
                $sql = $conn->query("SELECT * FROM orders");
                $result = $sql;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="table-line">
                            <div class="table-line-item"><?= $row['order_id']; ?></div>
                            <div class="table-line-item"><?= $row['full_cost']; ?></div>
                            <div class="table-line-item"><?= $row['date']; ?></div>
                            <div class="table-line-item"><?= $row['status']; ?></div>
                            <div class="table-line-item">
                                <a href="/admin/actions/orders_delete.php?id=<?=$row['order_id'];?>">
                                    <button class="delete-Sth"><i class="fas fa-trash"></i></button>
                                </a>
                                <a href="/admin/orders_update.php?id=<?=$row['order_id'];?>">
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