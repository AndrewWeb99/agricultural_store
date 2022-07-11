<?php
$pageTitle = "Petscage";
$cssPath = "css/style.css";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
?>
<main>

    <section class="welcome" style="background-image: url(/img/font.jpg);">
        <div class="welcome-black">
            <h1>Petscage</h1>
            <p>Оборудование для животноводческих комплексов</p>
        </div>
    </section>


    <section class="company-today">
        <div class="wrapper">
            <h1>Petscage сегодня</h1>
            <div class="advantages">
                <?php
                $table_name = "advantages";
                include("./templates/select.php");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                ?>
                        <div class="advantage-card">
                            <i class="fas fa-check-square"></i>
                            <p>
                                <?php
                                echo $row["advantage"];
                                ?>
                            </p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="company-today-description">
                <p>На сегодняшний день Petscage - это торговая компания, имеющая серьезные активы: собственную базу, конструкторское бюро, производственные площади, сервисный центр, оснащенный современным диагностическим оборудованием, выездные монтажные и гарантийные бригады, службу доставки.</p>
                <p>Финансовая стабильность, большой ассортимент товара на складе от мировых производителей, высокий уровень обслуживания, квалифицированная техническая поддержка, наличие выездных бригад и гарантийного обслуживания – этим мы завоевали доверие наших клиентов.</p>
                <p>Каждый клиент важен для нас, квалифицированные специалисты нашего предприятия всегда с готовностью помогут разрешить любую проблему клиента и вывести уровень производства на ферме на максимальный уровень.</p>
            </div>
        </div>
    </section>


    <section class="history">
        <div class="wrapper">
            <div class="history-container">
                <div class="history-description">
                    <h1>История компании</h1>
                    <p>Petscage основан в 2015 году и сегодня является лидером в сфере поставок и монтажа технологического оборудования для молочно-товарных ферм и сельскохозяйственных комплексов. Основным направлением деятельности нашего предприятия является внедрение на казахстанском рынке инновационных технологий для ведения сельского хозяйства от ведущих мировых производителей.</p>
                    <p>В спектр производимых и реализуемых нами товаров входит высокоэффективное оборудование для ферм, начиная от систем выпаивания телят до систем доения, кормления, навозоудаления, водопоения и микроклимата. Весь поставляемый нами товар соответствует мировым стандартам качества.</p>
                </div>
                <div class="history-img">
                    <img src="./img/fon.webp" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Блок про популярные товары -->
    <section class="catalog">
        <div class="wrapper">
            <h1>Популярные товары</h1>
            <div class="catalog-container">
                <?php
                $table_name = "catalog";
                include("./templates/select.php");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                ?>
                        <div class="tovar-card">
                            <div class="tovar-img">
                                <img src="/img/tovar/<?= $row['img']; ?>" alt="">
                            </div>
                            <div class="tovar-info">
                                <h1><?= $row["name"]; ?></h1>
                                <p><span>Модель:</span> <?= $row["model"]; ?></p>
                                <p><span>Артикул:</span> <?= $row["artikul"]; ?></p>
                                <p><span>Цена:</span> <?= $row["price"]; ?> тенге</p>
                            </div>
                            <div class="show-more">
                                <a href="./pages/tovar.php?id=<?= $row['tovar_id']; ?>" class="show-more-button">Подробнее</a>
                            </div>
                        </div>
                <?php
                        if ($i == 3) break;
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Блок про новости -->
    <section class="news">
        <div class="wrapper">
            <h1>Новости</h1>
            <div class="news-container">
                <?php
                $table_name = "news";
                $sql = "select* from $table_name ORDER BY date DESC";
                $result = $conn->query($sql);
                $i = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                ?>
                        <div class="news-card">
                            <div class="news-img" style="background-image: url(/img/news/<?= $row['img']; ?>)"></div>
                            <div class="news-text">
                                <div class="news-date">
                                    <?= $row['date']; ?>
                                </div>
                                <h1>
                                    <?= $row['name']; ?>
                                </h1>
                                <p>
                                    <?= $row['description']; ?>
                                </p>
                            </div>
                        </div>
                <?php
                        if ($i == 2) break;
                    }
                }
                ?>
            </div>
            <div class="news-button">
                <a href="./pages/news.php" class="show-more-button">Перейти ко всем новостям</a>
            </div>
        </div>
    </section>
</main>

<?php
include("./templates/footer.php");
?>


</body>

</html>