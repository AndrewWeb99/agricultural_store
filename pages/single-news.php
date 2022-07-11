<?php
$pageTitle = "Новости сайта";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
$news_id = $_GET['id'];

$table_name = "news";
$sql = "select* from $table_name where news_id = $news_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<main style="min-height: 70vh;">
    <section class="news">
        <div class="wrapper">
            <h1 style="text-align:left;">
                Новости
            </h1>
            <div class="single-news-container">
                <div class="single-news-card">
                    <div class="single-news-img">
                        <img src="/img/news/<?php echo $row['img']; ?>" alt="">
                    </div>
                    <div class="single-news-text">
                        <div class="single-news-date">
                            <? echo $row['date']; ?>
                        </div>
                        <h1>
                            <? echo $row['name']; ?>
                        </h1>
                        <p>
                            <? echo $row['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include("./templates/footer.php");
?>


</body>

</html>