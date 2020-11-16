<?php

session_start();
require_once "connection.php"; //подключение

$SESSIONname = $_SESSION['username'];  
$query_role = "SELECT `login`, `role` FROM `user` WHERE `login` = '$SESSIONname'";
$result_role = mysqli_query($link, $query_role);
$role_data = mysqli_fetch_row($result_role);
$role = $role_data[1];


if (isset($_POST['reg_input'])) {

	$surname = $_POST['surname_input'];
	$name = $_POST['name_input'];
	$fathername = $_POST['fathername_input'];
	$login = $_POST['login_input'];
	$password = $_POST['pass_input'];
	$img = $_POST['img_input'];

	//ПРОВЕРКА НА СУЩЕСТВОВАНИЕ ЛОГИНА
	$resultLogin = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` WHERE `login` = '$login'"));

	if($resultLogin <= 0) {

		$insert = "INSERT INTO 
							`user` (`id_user`, `login`, `password`, `name`, `surname`, `fathername`, `role`, `img_user`) 
					VALUES 
							(NULL, '$login', '$password', '$name', '$surname', '$fathername', 2, '$img');";
		$resultUser = mysqli_query($link, $insert) or die("Ошибка " . mysqli_error($link));

	}
}

if($resultUser){
	header("Location: auth.php"); //чтобы после обновления страницы введенные данные не вводились снова и снова
	exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/reg.css">
	<title> Регистрация </title>
</head>
<body>
	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
		<p class="li"> 
			<a href="catalogue.php" class="catalog"> Каталог </a>
            <a href="auth.php" class="auth"> Войти </a> 
		</p>
	</div>

	<form class="reg" method="POST">

		<p class="reg_p"> Регистрация </p>

		<input type="text" name="login_input" class="input" placeholder="Логин" required>
			<?php
				if($resultLogin > 0) {
					echo "<p style='
					align-items: center; 
					color: #ff5757; 
					font-weight: bolder; 
					padding: 2%; '> Такой логин уже существует! </p>";
				}
			?>
			
		<div class="inputpass">
			<input type="password" name="pass_input" class="password" placeholder="Пароль" required> 
			<a href="#" class="passwordOnOff" onclick="return show_hide_password(this);"></a>  
		</div>  

		<input type="text" name="surname_input" class="input" placeholder="Фамилия" pattern="[А-Яа-яЁё \-]{2,30}" required>
		<input type="text" name="name_input" class="input" placeholder="Имя" pattern="[А-Яа-яЁё \-]{2,30}" required>
		<input type="text" name="fathername_input" class="input" placeholder="Отчество" pattern="[А-Яа-яЁё \-]{2,30}">
		<input type="text" name="img_input" class="input" placeholder="Ссылка на картинку для аватарки" required>
		<input type="submit" name="reg_input" value="Регистрация" class="button">

		
		<?php 
            //закрываем подключение
            mysqli_close($link);
        ?> 
	
	</form>

	<script type='text/javascript'> 
    
	// Показать - скрыть пароль
        function show_hide_password(target){
            var input = document.querySelector('.password');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }

</script>
	
</body>

</html>