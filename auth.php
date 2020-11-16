<?php

session_start();
require_once 'connection.php';
		
if (isset($_SESSION['username'])) {
	$SESSIONname = $_SESSION['username'];
	$query_role = "SELECT `login`, `role` FROM `user` WHERE `login` = '$SESSIONname'";
	$result_role = mysqli_query($link, $query_role);
	$role_data = mysqli_fetch_row($result_role);
	$role = $role_data[1];

	if ($role == 2) {
		header('Location: catalogue.php');
		exit();
	} 
}

/* СКРИПТ АВТОРИЗАЦИИ */
$login = $_POST['login_input'];
$password = $_POST['pass_input'];
$vhod = $_POST['vhod_input'];

$query = "SELECT `login`, `password` FROM `user`";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_row($result)) 
{
    if (($login == $row[0]) and ($password == $row[1])) 
    {
        session_start();
        $_SESSION['username'] = "$row[0]";
        header('Location: catalogue.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/autho.css">
	<title> Авторизация </title>
</head>
<body>
	<div class="header">
		<p class="svecha"> <a href="catalogue.php" class="sv">  Фитиль </a> </p>
		<p class="li"> 
			<a href="catalogue.php" class="catalog"> Каталог </a>
		</p>
	</div>

	<form class="autho" method="POST">

		<p class="vhod"> Вход </p>

		<input type="text" name="login_input" class="input" placeholder="Логин" required>
		<input type="password" name="pass_input" class="input" placeholder="Пароль" required>
		<input type="submit" name="vhod_input" value="Войти" class="button">
		
		<?php
			if (isset($_POST['vhod_input'])) {

			//переменные с формы
			$login = $_POST['login_input'];
			$password = $_POST['pass_input'];
			$resultLogin = mysqli_num_rows(mysqli_query($link, "SELECT `login`, `password` FROM `user` WHERE `login` = '$login'"));
			$resultPassword = mysqli_num_rows(mysqli_query($link, "SELECT `password` FROM `user` WHERE `password` = '$password'"));
					if((!$resultLogin) || (!$resultPassword)) {
						echo "<p style='
						align-items: center; 
						color: #ff5757; 
						font-weight: bolder; 
						padding: 2%; '> Неправильный логин или пароль. </p>";
					}  
			}
		?>

		<p class="reg"> <a href="reg.php" class="reg_a"> Регистрация </a> </p>

	</form>
</body>
</html>