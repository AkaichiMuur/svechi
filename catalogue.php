<?php

session_start();
require_once 'connection.php';


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title> Главная:Каталог </title>
</head>
<body>

	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
        <form method="GET" action="logout.php" class="li">

            <?php
                $SESSIONname = $_SESSION['username'];
                $query_role = "SELECT `login`, `role` FROM `user` WHERE `login` = '$SESSIONname'";
                $result_role = mysqli_query($link, $query_role);
                $role_data = mysqli_fetch_row($result_role);
                $role = $role_data[1];
                
                if ($role == 2) {
                    echo "<a href='create.php' class='create'> Создать свою свечу </a> ";
                    echo "<a href='account.php' class='create'> Личный кабинет </a> ";
                    echo "<input type='submit' name='exit' class='exit' value='Выход'>";
                } else {
                    echo "<a href='auth.php' class='auth'> Войти </a>";
                }
            ?> 

        </form>
    </div>

    <div class="big_pic"></div>

    <div class="line"> 
        <p class="cat"> Каталог </p>
    </div>

    <div class="catalogue">

        <?php
            $query = "SELECT 
                            `id_candle`, `title_candle`, `description_candle`, `cost_candle`, `img_candle` 
                        FROM 
                            `candle` ";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));	

            if($result) {
                $rows = mysqli_num_rows($result); // количество полученных строк

                for ($i = 0 ; $i < $rows ; ++$i) {
					$row_data = mysqli_fetch_row($result);

					for ($j = 0 ; $j <= $row_data ; ++$j) {
						echo " <a href='description.php?id=".$row_data[0]."' class='pic_a'>";
                        echo "<img src='$row_data[4]' class='pic'>";
                        echo "<div class='desc'>
                                <p class='desc_title'> $row_data[1] </p> <br>
                                <p> $row_data[2] </p> <br>
                                <p class='desc_cost'> Цена: $row_data[3] ₽ </p> 
                            </div>";
                        echo "</a>"; 
						break;
					}
                }	
            }

        ?>
    	
    </div>

</body>
</html>
