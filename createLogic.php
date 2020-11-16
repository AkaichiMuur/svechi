<?php

session_start();
require_once "connection.php";

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

$basis = $_POST['basis'];
$colorant = $_POST['colorant'];
$extender = $_POST['extender'];
$aroma = $_POST['aroma'];
$candlestick = $_POST['candlestick'];

// узнаём цену всего и вся
$queryCost = "SELECT 
                    (cost_basis + cost_aroma + cost_colorant + cost_extender + cost_candlestick)
                FROM 
                    basis, 
                    aroma, 
                    colorant, 
                    extender, 
                    candlestick 
                WHERE 
                    basis.id_basis = $basis AND 
                    aroma.id_aroma = $aroma AND 
                    colorant.id_colorant = $colorant AND 
                    extender.id_extender = $extender AND 
                    candlestick.id_candlestick = $candlestick";
$cost = mysqli_fetch_row(mysqli_query($link, $queryCost))[0];

// берём последний айдишник из ордер_юзер и увеличиваем на 1
$orderCount = mysqli_fetch_row(mysqli_query($link, "SELECT id_order FROM order_user ORDER BY id_order DESC"))[0] + 1;

mysqli_query($link, "INSERT INTO `order_user` (`id_order`, `summa`, `id_user`, `status`) VALUES ($orderCount, '$cost', '$id_user', 'Обрабатывается');");

mysqli_query($link, "INSERT INTO `composition_order` (`id_comp_order`, `id_order`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`) VALUES (NULL, '$orderCount', '$basis', '$colorant', '$extender', '$aroma', '$candlestick');");

// echo "цена: " . $cost . "<br>";
// echo "ордер: " . $orderCount . "<br>";
// echo "INSERT INTO `order_user` (`id_order`, `summa`, `id_user`, `status`) VALUES ($orderCount, '$cost', '$id_user', 'Обрабатывается');";
// echo "<br>";
// echo "INSERT INTO `composition_order` (`id_comp_order`, `id_order`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`, `id_candle`) VALUES (NULL, '$orderCount', '$basis', '$colorant', '$extender', '$aroma', '$candlestick', ' ');";
// echo "<br>";

header("Location: orders.php");