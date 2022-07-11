<?php
$pageTitle = "Контакты";
include("./templates/head.php");
?>
<?php
include("./templates/header.php");
include("./templates/connect.php");
?>
<main>
    <section class="contacts-intro" style="background-image: url(../img/contacts.jpeg);">
        <div class="contacts-intro-fon">
            <h1>Свяжитесь с нами!</h1>
            <p>На этой странице представлены способы связаться с нами!</p>
        </div>
    </section>

    <section class="contacts-info">
        <div class="wrapper">
            <div class="contacts-container">
                <div class="contacts-line">
                    <div class="contacts-item">
                        <h1>Адрес компании:</h1>
                        <p>150000, РК, Северо-Казахстанская область, г. Петропавловск, ул. Абая, д.50, офис 5</p>
                    </div>
                    <div class="contacts-item">
                        <h1>График работы:</h1>
                        <p>Пн-Пт: с 08:30 до 17:30 <br>
                            Сб-Вс: выходные
                        </p>
                    </div>
                    <div class="contacts-item">
                        <h1>Телефоны:</h1>
                        <p>Тел: 8 (777) 545-55-51</p>
                    </div>
                </div>

                <div class="contacts-line">
                    <div class="contacts-item">
                        <h1>Почта:</h1>
                        <p>Email <span>test@mail.ru</span> - отдел технической консультации по
                            производственному оборудованию и технологиям</p>
                    </div>
                    <div class="contacts-item">
                        <h1>Мы в социальных сетях:</h1>
                        <p class="social-container">
                            <i class="fab fa-vk"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-telegram-plane"></i>
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