<?php

session_start();
require_once "connection.php"; //подключение


$SESSIONname = $_SESSION['username'];


$query = "SELECT `login`, `name`, `surname`, `fathername`, `img_user` FROM `user` WHERE `login` = '$SESSIONname'";
$row = mysqli_query($link, $query);
$row_data = mysqli_fetch_row($row);
$result0 = $row_data[0];
$result1 = $row_data[1]; 
$result2 = $row_data[2]; 
$result3 = $row_data[3]; 
$result4 = $row_data[4];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/account.css">
	<title> Личный кабинет</title>
</head>
<body>
	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
		<form method="GET" action="logout.php" class="li">
			<a href="catalogue.php" class="catalog"> Каталог </a>
			<a href="create.php" class="create"> Создать свою свечу </a> 
			<input type="submit" name="exit" class="exit" value="Выход">
		</form>
	</div>

    <p class="name_page"> Личный кабинет </p>
	<div class="information">
		<div class="orders">
			<p class="order"> <a href="orders.php" class="order_a"> Мои заказы </a> </p>
		</div>
		<p class="pic"> <img src="<?php echo "$result4"; ?>" class="picture">  </p>
		<div class="fio">
			<p> <?php echo "$result2"; ?> <?php echo "$result1"; ?> <?php echo "$result3"; ?> </p>
			<p class="login"> Мой логин: <?php echo "$result0"; ?> </p>
		</div>
		
	</div>
</body>
</html>

   