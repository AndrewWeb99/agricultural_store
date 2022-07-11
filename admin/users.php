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
            <div class="stat-admin-name">
                <h1>Пользователи</h1>
                <div class="stat-admin-name-button">
                    <a href="/admin/user_add.php">
                        <button class="create-Sth"><i class="fas fa-plus-square"></i> Добавить пользователя</button>
                    </a>
                </div>
            </div>
            <div class="table-container">
                <div class="table-line">
                    <div class="table-line-item">Логин</div>
                    <div class="table-line-item">ФИО</div>
                    <div class="table-line-item">Фото профиля</div>
                    <div class="table-line-item">Email</div>
                    <div class="table-line-item">Тип пользователя</div>
                    <div class="table-line-item">Действие</div>
                </div>
                <?php
                $result = outputUsers();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="table-line">
                            <div class="table-line-item"><?= $row['username']; ?></div>
                            <div class="table-line-item"><?= $row['full_name']; ?></div>
                            <div class="table-line-item"><img src="/img/users/<?= $row['avatar']; ?>" alt=""></div>
                            <div class="table-line-item"><?= $row['email']; ?></div>
                            <div class="table-line-item"><?= $row['type_of_user']; ?></div>
                            <div class="table-line-item">
                                <a href="./actions/users_delete.php?id=<?= $row['user_id']; ?>">
                                    <button class="delete-Sth"><i class="fas fa-trash"></i></button>
                                </a>
                                <a href="/admin/user_update.php?id=<?= $row['user_id']; ?>">
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