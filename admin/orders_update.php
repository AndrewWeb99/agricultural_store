<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");
if (isset($_GET['id'])) {
    $res = $conn->query("SELECT * FROM orders where order_id = " . $_GET['id']);
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
            <form action="/admin/actions/orders_update.php" method="post" enctype="multipart/form-data">
                <label for="">Номер</label>
                <input value="<?= $res['order_id']; ?>" type="text" name="id" required readonly><br><br>
                <label for="">Стоимость</label>
                <input value="<?= $res['full_cost']; ?>" type="text" name="name" required readonly><br><br>
                <label for="">Дата</label>
                <input value="<?= $res['date']; ?>" type="text" name="name" required readonly><br><br>
                <label for="">Статус</label>
                <select name="status" id="">
                    <option <? if ($res['status'] == 'Создан') echo 'selected'; ?> value="Создан">Создан</option>
                    <option <? if ($res['status'] == 'Принят') echo 'selected'; ?> value="Принят">Принят</option>
                    <option <? if ($res['status'] == 'Ожидает оплаты') echo 'selected'; ?> value="Ожидает оплаты">Ожидает оплаты</option>
                    <option <? if ($res['status'] == 'Ожидает отправки') echo 'selected'; ?> value="Ожидает отправки">Ожидает отправки</option>
                    <option <? if ($res['status'] == 'Ожидает поступления') echo 'selected'; ?> value="Ожидает поступления">Ожидает поступления</option>
                    <option <? if ($res['status'] == 'Заказан у поставщика') echo 'selected'; ?> value="Заказан у поставщика">Заказан у поставщика</option>
                    <option <? if ($res['status'] == 'На тестировании') echo 'selected'; ?> value="На тестировании">На тестировании</option>
                    <option <? if ($res['status'] == 'Доступен') echo 'selected'; ?> value="Доступен">Доступен</option>
                    <option <? if ($res['status'] == 'Готов к доставке') echo 'selected'; ?> value="Готов к доставке">Готов к доставке</option>
                    <option <? if ($res['status'] == 'В резерве (Курьер)') echo 'selected'; ?> value="В резерве (Курьер)">В резерве (Курьер)</option>
                    <option <? if ($res['status'] == 'Посылка сформирована') echo 'selected'; ?> value="Посылка сформирована">Посылка сформирована</option>
                    <option <? if ($res['status'] == 'На доставке') echo 'selected'; ?> value="На доставке">На доставке</option>
                    <option <? if ($res['status'] == 'Доставлен') echo 'selected'; ?> value="Доставлен">Доставлен</option>
                </select><br><br><br><br>
                <h2 style="text-align: center;">Список товаров заказа</h2>
                <div class="table-container">
                    <div class="table-line">
                        <div class="table-line-item">Название</div>
                        <div class="table-line-item">Изображение</div>
                        <div class="table-line-item">Цена</div>
                        <div class="table-line-item">Категория</div>
                        <div class="table-line-item">Количество</div>
                        <div class="table-line-item">Общая стоимость</div>
                    </div>
                    <?php
                    $sql = $conn->query("SELECT * FROM order_line WHERE order_id = " . $res['order_id']);
                    $result = $sql;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $res1 = $conn->query("SELECT * FROM catalog WHERE tovar_id = ".$row['tovar_id']);
                            $res1= mysqli_fetch_assoc($res1);
                    ?>
                            <div class="table-line">
                                <div class="table-line-item"><?= $res1['name']; ?></div>
                                <div class="table-line-item"><img src="/img/tovar/<?=$res1['img'];?>" alt=""></div>
                                <div class="table-line-item"><?= $res1['price']; ?></div>
                                <div class="table-line-item">
                                    <?
                                    $res2 = $conn->query("SELECT * FROM category WHERE category_id = ".$res1['category_id']);
                                    $res2= mysqli_fetch_assoc($res2);
                                    echo $res2['category_name'];
                                    ?></div>
                                <div class="table-line-item"><?= $row['tovar_number']; ?></div>
                                <div class="table-line-item"><?= $row['summary_cost']; ?></div>

                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <button type="submit" class="create-Sth">Обновить</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>