<?
session_start();
//Уничтожаем переменные в сессиях
unset($c_login);
unset($c_password);

unset($_SESSION['username']);
session_destroy();

header('Location: auth.php');
exit();