<?php
session_start();
if (isset($_SESSION['user'])) {
  } else {
    header("location: /admin/login.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/883f4eba84.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("./templates/header.php");
    include("./templates/connect.php");
    ?>

    <main style="min-height: 70vh;">
        <section class="page-cart">
            <div class="wrapper">

            </div>
        </section>
    </main>


    <footer>
        <div class="wrapper">
            <div class="footer-container">
                <div class="footer-info">
                    <h1>Северная жемчужина</h1>
                    <p>Petscage основан в 2015 году и сегодня является лидером в сфере поставок и монтажа технологического оборудования для молочно-товарных ферм и сельскохозяйственных комплексов.</p>
                </div>
                <div class="footer-social">
                    <p>Свяжитесь с нами в социальных сетях:</p>
                    <div class="social-container">
                        <i class="fab fa-vk"></i>
                        <i class="fab fa-instagram"></i> 
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-telegram-plane"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/cart.js"></script>

</body>

</html>