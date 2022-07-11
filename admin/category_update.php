<?php
session_start();
include("../templates/connect.php");
include("./templates/head.php");
if (isset($_GET['id'])) {
    $res = $conn->query("SELECT * FROM category where category_id = " . $_GET['id']);
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
            <form action="/admin/actions/category_update.php" method="post" enctype="multipart/form-data">
                <label for="">Название категории</label>
                <input value="<?= $res['category_id'] ?>" type="hidden" name="id" required>
                <input value="<?= $res['category_name'] ?>" type="text" name="name" required><br><br>
                <button type="submit" class="create-Sth">Обновить</button>
            </form>
        </section>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>