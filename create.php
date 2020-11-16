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
	<link rel="stylesheet" type="text/css" href="style/create.css">
	<title> Создать свою свечу </title>
</head>
<body>

	<div class="header">
        <p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
	    <form method="GET" action="logout.php" class="li">

            <a href="catalogue.php" class="catalog"> Каталог </a> 

            <?php
                if (isset($_SESSION['username'])) {
                    $SESSIONname = $_SESSION['username'];
                    $query_role = "SELECT `login`, `role` FROM `user` WHERE `login` = '$SESSIONname'";
                    $result_role = mysqli_query($link, $query_role);
                    $role_data = mysqli_fetch_row($result_role);
                    $role = $role_data[1];

	                if ($role == 2) {
                        echo "<a href='account.php' class='create'> Личный кабинет </a> ";
                        echo "<input type='submit' name='exit' class='exit' value='Выход'>";
                    } 
                }
            ?> 
            
        </form>
    </div>

<div class="ch">
    
    <p class="name_page"> Конструктор аромасвечей </p>
    
    <form class="choice-form" method="POST" action="createLogic.php">
        <div class="line"> 
            <p class="choice"> Выберите основу </p>
        </div>
    <div class="box basis">

            <div class="container">
                <label for="base1" class="pic_a" >
                    <img src="style/parafin.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Парафин  </p> <br>
                        <p> Парафин для свечей П 2 – материал высокой степени очистки, а потому абсолютно не токсичен при горении, безвреден для здоровья.  </p> <br>
                        <p class="desc_cost"> Цена: 200 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="base1" class="radio_input" name="basis" value="1" data-cost="200" required>
            </div>

            <div class="container">
                <label for="base2" class="pic_a">
                    <img src="style/pchel.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Пчелиный воск </p> <br>
                        <p> Свечи из пчелиного воска источают запах мёда, делая воздух приятно-сладким и лёгким, а также оказывают на атмосферу антисептическое воздействие. </p> <br>
                        <p class="desc_cost"> Цена: 700 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="base2" class="radio_input" name="basis" value="2" data-cost="700" required>
            </div>

            <div class="container">
                <label for="base3" class="pic_a">
                    <img src="style/gel.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Гель </p> <br>
                        <p> Гелевая свеча горит в несколько раз дольше, а дымное копчение отсутствует. При изготовлении такой основы применяются экологически чистые составляющие. </p> <br>
                        <p class="desc_cost"> Цена: 150 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="base3" class="radio_input" name="basis" value="3" data-cost="150" required>
            </div>

    </div>

        <div class="line"> 
            <p class="choice"> Выберите краситель </p>
        </div>
    <div class="box colorant">
            
            <div class="container">
                <label for="color1" class="pic_a">
                    <img src="style/yellow.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Жёлтый </p> <br>
                        <p class="desc_cost"> Цена: 50 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="color1" class="radio_input" name="colorant" value="1" data-cost="50" required>
            </div>
            <div class="container">
                <label for="color2" class="pic_a">
                    <img src="style/aqua.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Аквамарин </p> <br>
                        <p class="desc_cost"> Цена: 50 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="color2" class="radio_input" name="colorant" value="2" data-cost="50" required>
            </div>
            <div class="container">
                <label for="color3" class="pic_a">
                    <img src="style/indigo.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Индиго </p> <br>
                        <p class="desc_cost"> Цена: 50 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="color3" class="radio_input" name="colorant" value="3" data-cost="50" required>
            </div>
            <div class="container">
                <label for="color4" class="pic_a">
                    <img src="style/peach.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Персиковый </p> <br>
                        <p class="desc_cost"> Цена: 50 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="color4" class="radio_input" name="colorant" value="4" data-cost="50" required>
            </div>
            <div class="container">
                <label for="color5" class="pic_a">
                    <img src="style/no.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Без цвета </p> <br>
                        <p class="desc_cost"> Цена: 0 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="color5" class="radio_input" name="colorant" value="6" data-cost="0" required>
            </div>

    </div>
        
        <div class="line"> 
            <p class="choice"> Выберите наполнитель </p>
        </div>
    <div class="box extender">

            <div class="container">
                <label for="extend1" class="pic_a">
                    <img src="style/pesok.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Песок </p> <br>
                        <p class="desc_cost"> Цена: 70 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="extend1" class="radio_input" name="extender" value="1" data-cost="70" required>
            </div>
            <div class="container">
                <label for="extend2" class="pic_a">
                    <img src="style/suhotsvet.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Сухоцветы </p> <br>
                        <p class="desc_cost"> Цена: 60 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="extend2" class="radio_input" name="extender" value="2" data-cost="60" required>
            </div>
            <div class="container">
                <label for="extend3" class="pic_a">
                    <img src="style/rakushki.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Ракушки </p> <br>
                        <p class="desc_cost"> Цена: 100 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="extend3" class="radio_input" name="extender" value="3" data-cost="100" required>
            </div>
            <div class="container">
                <label for="extend4" class="pic_a">
                    <img src="style/no.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Без наполнителя </p> <br>
                        <p class="desc_cost"> Цена: 0 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="extend4" class="radio_input" name="extender" value="4" data-cost="0" required>
            </div>

    </div>
        
        <div class="line"> 
            <p class="choice"> Выберите аромат </p>
        </div>
    <div class="box aroma">
            
            <div class="container">
                <label for="aroma1" class="pic_a">
                    <img src="style/pachuli.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Пачули </p> <br>
                        <p class="desc_cost"> Цена: 400 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma1" class="radio_input" name="aroma" value="1" data-cost="400" required>
            </div>
            <div class="container">
                <label for="aroma2" class="pic_a">
                    <img src="style/muskat.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Шалфей мускатный </p> <br>
                        <p class="desc_cost"> Цена: 400 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma2" class="radio_input" name="aroma" value="2" data-cost="400" required>
            </div>
            <div class="container">
                <label for="aroma3" class="pic_a">
                    <img src="style/oreh.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Орех мускатный </p> <br>
                        <p class="desc_cost"> Цена: 400 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma3" class="radio_input" name="aroma" value="3" data-cost="400" required>
            </div>
            <div class="container">
                <label for="aroma4" class="pic_a">
                    <img src="style/sandal.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Сандаловое дерево </p> <br>
                        <p class="desc_cost"> Цена: 400 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma4" class="radio_input" name="aroma" value="4" data-cost="400" required>
            </div>
            <div class="container">
                <label for="aroma5" class="pic_a">
                    <img src="style/korica.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Корица </p> <br>
                        <p class="desc_cost"> Цена: 400 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma5" class="radio_input" name="aroma" value="5" data-cost="400" required>
            </div>
            <div class="container">
                <label for="aroma6" class="pic_a">
                    <img src="style/no.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Без запаха </p> <br>
                        <p class="desc_cost"> Цена: 0 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="aroma6" class="radio_input" name="aroma" value="6" data-cost="0" required>
            </div>

    </div>
        
        <div class="line">
            <p class="choice"> Выберите подсвечник </p>
        </div>
    <div class="box candlestick">

            <div class="container">
                <label for="candlestick1" class="pic_a">
                    <img src="style/steklo.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Стеклянный Rasteli 30см </p> <br>
                        <p class="desc_cost"> Цена: 200 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="candlestick1" class="radio_input" name="candlestick" value="1" data-cost="200" required>
            </div>
            <div class="container">
                <label for="candlestick2" class="pic_a">
                    <img src="style/redsteklo.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Стильный подсвечник </p> <br>
                        <p class="desc_cost"> Цена: 450 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="candlestick2" class="radio_input" name="candlestick" value="2" data-cost="450" required>
            </div>
            <div class="container">
                <label for="candlestick3" class="pic_a">
                    <img src="style/volna.jpg" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Волна </p> <br>
                        <p class="desc_cost"> Цена: 700 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="candlestick3" class="radio_input" name="candlestick" value="5" data-cost="700" required>
            </div>
            <div class="container">
                <label for="candlestick4" class="pic_a">
                    <img src="style/no.png" class="pic">
                    <div class="desc">
                        <p class="desc_title"> Без подсвечника </p> <br>
                        <p class="desc_cost"> Цена: 0 ₽ </p> 
                    </div>
                </label>
                <input type="radio" id="candlestick4" class="radio_input" name="candlestick" value="4" data-cost="0" required>
            </div>

    </div>

        <div class="all">
            <p class="itog"> ИТОГО: <span>0</span>  ₽</p>
            <input type="submit" value="ЗАКАЗАТЬ" class="button"> 
        </div>
    </form>
</div>

<!-- СКЛАДЫВАЕМ ЦЕНЫ ИНГРЕДИЕНТОВ -->
<script>

    let itog = document.querySelector(".itog span");
    let basisCost = 0;
    let colorantCost = 0;
    let extenderCost = 0;
    let aromaCost = 0;
    let candlestickCost = 0;
                
    document.querySelectorAll('.basis input').forEach((input) => 
    {
        input.addEventListener('input', (e) => 
        {
            basisCost =  parseInt(e.target.dataset['cost']);
            itog.textContent = basisCost + colorantCost + extenderCost + aromaCost + candlestickCost;
        });
    });
    
    document.querySelectorAll('.colorant input').forEach((input) => 
    {
        input.addEventListener('input', (e) => 
        {
            colorantCost =  parseInt(e.target.dataset['cost']);
            itog.textContent = basisCost + colorantCost + extenderCost + aromaCost + candlestickCost;
        });
    });

    document.querySelectorAll('.extender input').forEach((input) => 
    {
        input.addEventListener('input', (e) => 
        {
            extenderCost =  parseInt(e.target.dataset['cost']);
            itog.textContent = basisCost + colorantCost + extenderCost + aromaCost + candlestickCost;
        });
    });

    document.querySelectorAll('.aroma input').forEach((input) => 
    {
        input.addEventListener('input', (e) => 
        {
            aromaCost =  parseInt(e.target.dataset['cost']);
            itog.textContent = basisCost + colorantCost + extenderCost + aromaCost + candlestickCost;
        });
    });

    document.querySelectorAll('.candlestick input').forEach((input) => 
    {
        input.addEventListener('input', (e) => 
        {
            candlestickCost =  parseInt(e.target.dataset['cost']);
            itog.textContent = basisCost + colorantCost + extenderCost + aromaCost + candlestickCost;
        });
    });

</script>

</body>
</html>