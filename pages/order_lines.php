<?php
$pageTitle = "Профиль пользователя";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<main style="min-height: 70vh;">
    <section class="news">
        <div class="wrapper">
            
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
                    $sql = $conn->query("SELECT * FROM order_line WHERE order_id = " . $id);
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
        </div>
    </section>
</main>
<?php
include("./templates/footer.php");
?>


</body>

</html>