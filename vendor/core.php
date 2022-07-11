<?php
function connect()
{
    include("../templates/connect.php");
    return $conn;
}

function loadGoods()
{
    $conn = connect();
    $sql = "select * from catalog";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $out = array();
        while ($row = $result->fetch_assoc()) {
            $out[$row["tovar_id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo 0;
    }
}

function placeOrder()
{
    session_start();
    $conn = connect();
    $orderCost = $_POST['orderCost'];
    //добавление в таблицу заказов
    $sql = "INSERT INTO `orders` (`order_id`, `full_cost`, `date`, `status`) VALUES (NULL, '$orderCost', now(), 'Создан')";
    $result = $conn->query($sql);

    //выявление последней строки в таблице заказов
    $sql = "SELECT * FROM `orders` ORDER BY order_id DESC ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $orderId = $row['order_id'];

    //добавление записей в таблицу строкаЗаказа
    $cart = json_decode($_POST['cart'], true);
    $userId = $_SESSION['user']['user_id'];
    foreach ($cart as $key => $value) {
        $number = $value;
        $tovar = $key;

        //выявление цены заказа
        $sql = "SELECT * FROM `catalog` WHERE tovar_id = '$tovar'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $summaryCost = $row['price'] * $number;

        //добавление записи в таблицу СтрокаЗаказа
        $sql = "INSERT INTO `order_line` (`order_line_id`, `user_id`, `tovar_id`, `tovar_number`, `summary_cost`, `date_of_addition`, `order_id`) VALUES (NULL, '$userId', '$tovar', '$number', '$summaryCost', now(), '$orderId')";
        //$sql = "INSERT INTO `order_line` (`order_line_id`, `user_id`, `tovar_id`, `tovar_number`, `summary_cost`, `date_of_addition`, `order_id`) VALUES (NULL, '$userId', '$tovar', '$number', '$summaryCost', '2022-06-06', '$orderId')";
        $result = $conn->query($sql);
    }
}



$action = $_POST['action'];

if ($action == "loadGoods") {
    loadGoods();
}
if ($action == "placeOrder") {
    placeOrder();
}
