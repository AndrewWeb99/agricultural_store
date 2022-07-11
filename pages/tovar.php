<?php
$pageTitle = "Каталог товаров";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
$tovar_id = $_GET['id'];
$user = $_SESSION['user']['user_id'];
?>
<main>
    <?php
    $table_name = "catalog";
    $sql = "select* from $table_name where tovar_id = '$tovar_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <section class="single-tovar">
        <div class="wrapper">
            <div class="single-tovar-card">
                <div class="single-tovar-img">
                    <img src="/img/tovar/<?php echo $row['img'] ?>" alt="">
                </div>
                <div class="single-tovar-info">
                    <h1><?php echo $row["name"]; ?></h1>
                    <p><span>Модель:</span> <?php echo $row["model"]; ?></p>
                    <p><span>Артикул:</span> <?php echo $row["artikul"]; ?></p>
                    <p><span>Цена:</span> <?php echo $row["price"]; ?> тенге</p>
                    <div class="single-tovar-number">
                        <div class="single-tovar-form">
                            <button class="show-more-button add-to-cart" id="<?php echo $row['tovar_id']; ?>">Добавить в корзину</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['message'])) {
                        if ($_SESSION['message'] == "Товар добавлен в корзину!") {
                            echo '<p class="alert alert-success">' . $_SESSION['message'] . '</p>';
                        } else {
                            echo '<p class="alert alert-danger">' . $_SESSION['message'] . '</p>';
                        }
                    }
                    unset($_SESSION['message']);
                    ?>
                    <p><span>Описание</span></p>
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>

            <div class="single-tovar-comment-form">
                <h1>Добавить комментарий</h1>
                <form action="../vendor/add_comment.php?id=<?= $row['tovar_id']; ?>" method="post">
                    <textarea name="comment" id="" placeholder="Ваш комментарий"></textarea>
                    <button type="submit">Оставить комментарий</button>
                </form>
                <?php
                if (isset($_SESSION['warning'])) {
                    if ($_SESSION['warning'] == "Товар добавлен в корзину!") {
                        echo '<p class="alert alert-success">' . $_SESSION['warning'] . '</p>';
                    } else {
                        echo '<p class="alert alert-danger">' . $_SESSION['warning'] . '</p>';
                    }
                }
                unset($_SESSION['warning']);
                ?>
            </div>

            <div class="single-tovar-comment-container">
                <h1>Комментарии</h1>
                <?php
                $sql = "SELECT * FROM comments join users on comments.user_id = users.user_id where comments.tovar_id = $tovar_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="single-tovar-comment-item">
                            <?php
                            if (!$row['avatar']) {
                            ?>
                                <div class="single-tovar-comment-avatar" style="background-image:url(/img/user.png);">
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="single-tovar-comment-avatar" style="background-image:url(/img/users/<?php echo $row['avatar']; ?>);">

                                </div>
                            <?php
                            }
                            ?>
                            <div class="single-tovar-comment-content">
                                <h1><?php echo $row['full_name']; ?></h1>
                                <p><?php echo $row['text']; ?></p>
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
<script>

</script>


</body>

</html>