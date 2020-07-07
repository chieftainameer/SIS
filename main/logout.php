<?php  
session_start();
unset($_SESSION['login_user_id']);
unset($_SESSION['login_status']);
unset($_SESSION['login_email']);
unset($_SESSION['name']);	
header('Location:login.php');

?>