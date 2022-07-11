<?php
$pageTitle = "Каталог товаров";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $where = 'WHERE category_id = ' . $ids;
} else {
    $where = '';
}
?>

<main style="min-height: 70vh;">
    <section class="catalog">
        <div class="wrapper">
            <h1>Каталог товаров</h1><br>
            <select onchange="window.location.href=this.options[this.selectedIndex].value" name="" id="">
                <option value="/pages/catalog.php">Все категории</option>
                <?
                $sql2 = $conn->query("SELECT * FROM category");
                if ($sql2->num_rows > 0) {
                    while ($rows = $sql2->fetch_assoc()) {
                ?>
                        <option <? if ($ids == $rows['category_id']) echo 'selected'; ?> value="/pages/catalog.php?id=<?= $rows['category_id'] ?>"><?= $rows['category_name'] ?></option>
                <?
                    }
                }
                ?>
            </select>
            <div class="catalog-container">
                <?php
                $table_name = "catalog";
                $sql = "select* from $table_name " . $where;
                $result = $conn->query($sql);
                $i = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                ?>
                        <div class="tovar-card">
                            <div class="tovar-img">
                                <img src="/img/tovar/<? echo $row['img']; ?>" alt="">
                            </div>
                            <div class="tovar-info">
                                <h1><?php echo $row["name"]; ?></h1>
                                <p><span>Модель:</span> <?php echo $row["model"]; ?></p>
                                <p><span>Артикул:</span> <?php echo $row["artikul"]; ?></p>
                                <p><span>Цена:</span> <?php echo $row["price"]; ?> тенге</p>
                            </div>
                            <div class="show-more">
                                <a href="./tovar.php?id=<?php echo $row['tovar_id'] ?>" class="show-more-button">Подробнее</a>
                            </div>
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