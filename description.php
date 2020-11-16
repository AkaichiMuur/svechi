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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title> Описание </title>
</head>
<body>

	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
		<form method="GET" action="logout.php" class="li">
			
			<a href="catalogue.php" class="catalog"> Каталог </a>

            <?php
				$query_role = "SELECT `login`, `role` FROM `user` WHERE `login` = '$SESSIONname'";
				$result_role = mysqli_query($link, $query_role);
				$role_data = mysqli_fetch_row($result_role);
				$role = $role_data[1];
				
				if ($role == 2) {
					echo "<a href='create.php' class='create'> Создать свою свечу </a>";
					echo "<a href='account.php' class='create'> Личный кабинет </a>"; 
					echo "<input type='submit' name='exit' class='exit' value='Выход'>";
				} else {
					echo "<a href='auth.php' class='auth'> Войти </a>";
				}
            ?> 
            
        </form>
	</div>
	
    <div class="big_pic_desc"></div>

    <form class="information" method="GET" action="buy.php">

		<?php
			$get_id = $_GET['id'];
			
			$query_candle = "SELECT 
									`id_candle`, `title_candle`, `description_candle`, `cost_candle`, `img_candle` 
								FROM 
									`candle`  
								WHERE 
									`id_candle` = '$get_id'; ";
			$result_candle = mysqli_query($link, $query_candle) or die('Ошибка' . mysqli_error($link));
			$row_candle = mysqli_fetch_assoc($result_candle);
			
			// переменные из базы
			$id_candle = $row_candle['id_candle'];
			$title_candle = $row_candle['title_candle'];
			$description_candle = $row_candle['description_candle'];
			$cost_candle = $row_candle['cost_candle'];
			$img_candle = $row_candle['img_candle'];

			
			$query_composition = "SELECT 
										`composition`.`id_candle`, `composition`.`id_basis`, `composition`.`id_colorant`, `composition`.`id_extender`, `composition`.`id_aroma`, `composition`.`id_candlestick`, 
										`basis`.`id_basis`, `basis`.`title_basis`, 
										`colorant`.`id_colorant`, `colorant`.`title_colorant`, 
										`extender`.`id_extender`, `extender`.`title_extender`, 
										`aroma`.`id_aroma`, `aroma`.`title_aroma`, 
										`candlestick`.`id_candlestick`, `candlestick`.`title_candlestick` 
									FROM 
										`composition`, `basis`, `colorant`, `extender`, `aroma`, `candlestick` 
									WHERE 
										`composition`.`id_candle` = '$get_id'
									AND 
										`composition`.`id_basis` = `basis`.`id_basis`
									AND 
										`composition`.`id_colorant` = `colorant`.`id_colorant`
									AND 
										`composition`.`id_extender` = `extender`.`id_extender`
									AND 
										`composition`.`id_aroma` = `aroma`.`id_aroma`
									AND 
										`composition`.`id_candlestick` = `candlestick`.`id_candlestick` ; ";
			$result_composition = mysqli_query($link, $query_composition) or die('Ошибка' . mysqli_error($link));
			$row_composition = mysqli_fetch_row($result_composition);
			$basis = $row_composition[7];
			$colorant = $row_composition[9];
			$extender = $row_composition[11];
			$aroma = $row_composition[13];
			$candlestick = $row_composition[15];

		?>

    	<img src="<?php echo $img_candle; ?>" class="pic_inf">
    	<div class="inf">
    		<p class="name"> <?php echo $title_candle; ?> </p>
			<p class="description"> <?php echo $description_candle; ?> <br>
				<?php 
				
					if (!empty($basis)){
						echo "<br> Основа: $basis ";
						echo "<br> Краситель: $colorant ";
						echo "<br> Наполнитель: $extender ";
						echo "<br> Аромат: $aroma ";
						echo "<br> Подсвечник: $candlestick "; 
					}
				
				?>
			</p>
			<p class="price" name="price" > Цена: <?php echo $cost_candle; ?> ₽ </p>
			<input type="hidden" name="id_candle" value="<?=$id_candle?>">
			<input type="hidden" name="cost" value="<?=$cost_candle?>">
			<!-- КНОПКА ЗАКАЗАТЬ -->
			<?php
				if ($role == 2) {
					echo "<input type='submit' value='Заказать' class='button' name='submit'>";
				}
			?>
    		
    	</div>
	</form>

</body>
</html>