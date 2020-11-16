<?php

session_start();
require_once "connection.php"; //подключение

$SESSIONname = $_SESSION['username'];
$query_user = "SELECT 
					`id_user` 
				FROM 
					`user` 
				WHERE 
					`login` = '$SESSIONname'";
$result_user = mysqli_query($link, $query_user);
$row_data_user = mysqli_fetch_row($result_user);
$id_user = $row_data_user[0];

$cost = $_GET['cost'];
$id_candle = $_GET['id_candle'];

//добавляет заказ в order_user
$query_add_order = "INSERT INTO `order_user`(`id_order`, `summa`, `id_user`, `status`) VALUES (NULL, $cost, $id_user, 'Обрабатывается')";
$result_add_order = mysqli_query($link, $query_add_order);

//тут же берет его айди 
$query_last_order = "SELECT `id_order` FROM `order_user` WHERE `id_user` = $id_user ORDER BY `order_user`.`id_order` DESC LIMIT 1";
$result_last_order = mysqli_query($link, $query_last_order);
$row_data_last_order = mysqli_fetch_row($result_last_order);
$id_order = $row_data_last_order[0];


$query_add_comp = "INSERT INTO `composition_order`(`id_comp_order`, `id_order`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`, `id_candle`) VALUES (NULL, $id_order, NULL, NULL, NULL, NULL, NULL, $id_candle)";
$result_add_comp = mysqli_query($link, $query_add_comp);
mysqli_close($link);

header('Location: orders.php');
?>