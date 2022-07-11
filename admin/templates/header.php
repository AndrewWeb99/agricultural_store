
<header class="admin-header">
    <div class="admin-header-logo">
        Панель управления
    </div>
    <div class="admin-nav-info">
        <div class="admin-nav-user">
            <div class="admin-nav-avatar">
                <img src="/img/users/<?= $_SESSION['user']['avatar'] ?>" alt="">
            </div>
            <div class="admin-nav-name">
                <?php
                echo $_SESSION['user']['full_name'];
                ?>
            </div>
        </div>
    </div>
</header>