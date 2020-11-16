<?php

session_start();
require_once "connection.php"; //подключение

$SESSIONname = $_SESSION['username'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/orders.css">
	<title> Мои заказы </title>
</head>
<body>
	
	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
		<form method="GET" action="logout.php" class="li">
			<a href="catalogue.php" class="catalog"> Каталог </a>
			<a href="create.php" class="create"> Создать свою свечу </a> 
			<a href="account.php" class="create"> Личный кабинет </a> 
			<input type="submit" name="exit" class="exit" value="Выход">
		</form>
	</div>
	
    <p class="name_page"> Мои заказы </p>

		<div class="order">

		
		<?php
		if (isset($SESSIONname)) 
		{
			/////////////////// ИЩЕМ ЮЗЕРА //////////////////
			$query_user = "SELECT 
								`id_user` 
							FROM 
								`user` 
							WHERE 
								`login` = '$SESSIONname'";
			$result_user = mysqli_query($link, $query_user);
			$row_data_user = mysqli_fetch_row($result_user);
			$id_user = $row_data_user[0];

			$queryIDUser = "SELECT 
						`id_order`, `summa`, `id_user`, `status` 
					FROM 
						`order_user` 
					WHERE 
						`id_user` = '$id_user'";
			$resultIDUser = mysqli_query($link, $queryIDUser);

			$rows = mysqli_num_rows($resultIDUser);

			if (!empty($rows)) 
			{

				while ($row_data = mysqli_fetch_assoc($resultIDUser))
				{
					$order = $row_data['id_order'];
					$query_order = "SELECT 
										`id_order`, `summa`, `id_user`, `status` 
									FROM 
										`order_user` 
									WHERE 
										`id_order` = '$order'";
					$result_order = mysqli_query($link, $query_order);

					///////////// ВЫВОД ЗАКАЗОВ ////////////////
					while ($row_data_order = mysqli_fetch_row($result_order)) 
					{
						$id_order = $row_data_order[0];
						$summa = $row_data_order[1];
						$status = $row_data_order[3];

						echo "<details>";
						echo "<summary> Заказ № $id_order </summary> <br>";

						$query_comp = "SELECT 
											`id_order`, `id_basis`, `id_colorant`, `id_extender`, `id_aroma`, `id_candlestick`, `id_candle` 
										FROM 
											`composition_order` 
										WHERE 
											`id_order` = '$id_order'";
						$result_comp = mysqli_query($link, $query_comp);

						echo "<div class='comp'>";

							while ($row_data_one = mysqli_fetch_assoc($result_comp)) 
							{		
								////////////////////////////////////////////// СВЕЧА ////////////////////////////////////////////////////
								$candle = $row_data_one['id_candle'];
								$query_candle = "SELECT 
													`id_candle`, `title_candle`, `cost_candle`, `img_candle` 
												FROM 
													`candle` 
												WHERE
													`id_candle` = '$candle'";
								$result_candle = mysqli_query($link, $query_candle);

								while ($row_data_candle = mysqli_fetch_row($result_candle)) 
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_candle[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_candle[1] </p>
												<p class='price'> Цена: $row_data_candle[2] ₽ </p>
											</div>";
											echo "</div>"; 
								}
							
								$basis = $row_data_one['id_basis'];
								$colorant = $row_data_one['id_colorant'];
								$extender = $row_data_one['id_extender'];	
								$candlestick = $row_data_one['id_candlestick'];
								$aroma = $row_data_one['id_aroma'];

								//////////////////////// ОСНОВА ////////////////////////////////////////////////////
								$query_basis = "SELECT 
													`id_basis`, `title_basis`, `cost_basis`, `img_basis` 
												FROM 
													`basis` 
												WHERE 
													`id_basis` = '$basis'";
								$result_basis = mysqli_query($link, $query_basis);

								while ($row_data_basis = mysqli_fetch_row($result_basis))
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_basis[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_basis[1] </p>
												<p class='price'> Цена:  $row_data_basis[2] ₽  </p>
											</div>";
										echo "</div>"; 
								}

								///////////////////// КРАСИТЕЛЬ /////////////////////////////////////////////////////
								$query_colorant = "SELECT 
													`id_colorant`, `title_colorant`, `cost_colorant`, `img_colorant` 
												FROM 
													`colorant` 
												WHERE 
													`id_colorant` = '$colorant'";
								$result_colorant = mysqli_query($link, $query_colorant);

								while ($row_data_colorant = mysqli_fetch_row($result_colorant))
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_colorant[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_colorant[1] </p>
												<p class='price'> Цена:  $row_data_colorant[2] ₽  </p>
											</div>";
										echo "</div>"; 
								}

								/////////////////////// НАПОЛНИТЕЛЬ /////////////////////////////////////////////////
								$query_extender = "SELECT 
														`id_extender`, `title_extender`, `cost_extender`, `img_extender` 
													FROM 
														`extender` 
													WHERE 
														`id_extender` = '$extender'";
								$result_extender = mysqli_query($link, $query_extender);
								
								while ($row_data_extender= mysqli_fetch_row($result_extender))
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_extender[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_extender[1] </p>
												<p class='price'> Цена:  $row_data_extender[2] ₽  </p>
											</div>";
										echo "</div>"; 
								}

								///////////////////// АРОМАТ /////////////////////////////////////////////////
								$query_aroma = "SELECT 
														`id_aroma`, `title_aroma`, `cost_aroma`, `img_aroma` 
													FROM 
														`aroma` 
													WHERE 
														`id_aroma` = '$aroma'";
								$result_aroma = mysqli_query($link, $query_aroma);
								
								while ($row_data_aroma = mysqli_fetch_row($result_aroma))
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_aroma[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_aroma[1] </p>
												<p class='price'> Цена:  $row_data_aroma[2] ₽  </p>
											</div>";
										echo "</div>"; 
								}

								/////////////////////ПОДСВЕЧНИК //////////////////////////////////////////////////
								$query_candlestick = "SELECT 
															`id_candlestick`, `title_candlestick`, `cost_candlestick`, `img_candlestick` 
														FROM 
															`candlestick` 
														WHERE 
															`id_candlestick` = '$candlestick'";
								$result_candlestick = mysqli_query($link, $query_candlestick);
								
								while ($row_data_candlestick = mysqli_fetch_row($result_candlestick))
								{
										echo "<div class='information'>";
										echo "<img src='$row_data_candlestick[3]' class='img'>";
										echo "<div class='inf'>
												<p class='name'> $row_data_candlestick[1] </p>
												<p class='price'> Цена:  $row_data_candlestick[2] ₽  </p>
											</div>";
										echo "</div>"; 
								}
							}

							echo "<p class='sum'> Сумма заказа: $summa ₽ </p>";
							echo "<p class='sum'> Статус заказа: $status </p>";

						echo " </div>";
						
						echo "</details>";
					}
				}				
			}
			else 
			{
				echo "<p style='display:flex; 
				align-self: center;
				font-size: 25px;'> Вы еще ничего не заказали </p>";
			}
		} 
	?>
		</div>

</body>
</html>