<?php
function connect()
{
    include("../templates/connect.php");
    return $conn;
}
function numberGoods()
{
    $conn = connect();
    $sql = "select * from catalog";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->num_rows;
    } elseif ($result->num_rows == 0) {
        return 0;
    }
}
function numberNews()
{
    $conn = connect();
    $sql = "select * from news";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->num_rows;
    } elseif ($result->num_rows == 0) {
        return 0;
    }
}
function numberOrders()
{
    $conn = connect();
    $sql = "select * from orders";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->num_rows;
    } elseif ($result->num_rows == 0) {
        return 0;
    }
}
function numberComments()
{
    $conn = connect();
    $sql = "select * from comments";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->num_rows;
    } elseif ($result->num_rows == 0) {
        return 0;
    }
}

function outputUsers()
{
    $conn = connect();
    $sql = "select * from users";
    $result = $conn->query($sql);
    return $result;
}

function outputGoods()
{
    $conn = connect();
    $sql = "select * from catalog";
    $result = $conn->query($sql);
    return $result;
}

function outputNews()
{
    $conn = connect();
    $sql = "select * from news";
    $result = $conn->query($sql);
    return $result;
}
