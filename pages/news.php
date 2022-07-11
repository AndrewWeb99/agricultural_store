<?php
$pageTitle = "Новости сайта";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
?>
<main style="min-height: 70vh;">
    <section class="news">
        <div class="wrapper">
            <h1 style="text-align:left;">
                Новости
            </h1>
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
                            <div class="news-img" style="background-image: url(/img/news/<?php echo $row['img']; ?>)"></div>
                            <div class="news-text">
                                <div class="news-date">
                                    <? echo $row['date']; ?>
                                </div>
                                <h1>
                                    <a href="single-news.php?id=<?= $row['news_id'] ?>">
                                        <? echo $row['name']; ?>
                                    </a>
                                </h1>
                                <p>
                                    <? echo $row['description']; ?>
                                </p>
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