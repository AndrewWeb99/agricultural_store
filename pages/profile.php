<?php
$pageTitle = "Профиль пользователя";
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
                Заказы
            </h1>
            <div class="table-container">
                <div class="table-line">
                    <div class="table-line-item">Номер</div>
                    <div class="table-line-item">Стоимость</div>
                    <div class="table-line-item">Дата</div>
                    <div class="table-line-item">Статус</div>
                    <div class="table-line-item">Действие</div>
                </div>
                <?php
                $us_id = $_SESSION['user']['user_id'];
                $sql = $conn->query("SELECT * FROM orders WHERE order_id IN (SELECT order_id FROM order_line WHERE user_id = $us_id)");
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
                                <a href="/pages/order_lines.php?id=<?= $row['order_id']; ?>">
                                    <button class="update-Sth"><i class="fas fa-eye"></i></button>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div><br><br>
            <h1 style="text-align:left;">
                Данные клиента
            </h1><br>
            <div class="" style="box-shadow: 1px 0px 8px 5px rgba(34, 60, 80, 0.2); padding: 5px;">
                <form action="/vendor/upd_user.php" method="post" enctype="multipart/form-data">
                    <?
                    $ws = $conn->query("SELECT * FROM users WHERE user_id = $us_id");
                    $ws = mysqli_fetch_assoc($ws);
                    ?>
                    <label for="">ФИО</label>
                    <input value="<?= $ws['full_name'] ?>" type="text" name="fio" required><br><br>
                    <label for="">Email</label>
                    <input value="<?= $ws['email'] ?>" type="text" name="email" required><br><br>
                    <label for="">Логин</label>
                    <input value="<?= $ws['username'] ?>" type="text" name="login" required><br><br>
                    <label for="">Новый пароль</label>
                    <input type="text" name="pas"><br><br>
                    <label for="">Аватар</label><br><br>
                    <img src="/img/users/<?= $ws['avatar'] ?>" alt="" width="170px">
                    <input name="avatar" type="file"><br><br>
                    <button type="submit" class="create-Sth">Обновить</button>
                </form>
            </div><br><br><br>
            <a href="/vendor/logout.php" class="create-Sth" style="background-color: red;">Выход</a>
        </div>
        
    </section>
</main>
<?php
include("./templates/footer.php");
?>


</body>

</html>