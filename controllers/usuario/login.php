<?php
require_once "../../models/auth.php";
session_start();
$errorMsg = array();
$successMsg = array();
if(isset($_SESSION["user_login"]))
{
	header("location: ".$url."views/usuario/index.php");  
}
if(isset($_POST["username"]))
{
	$username = strip_tags($_POST["username"]);
	$password = strip_tags($_POST["log_password"]);
	
	if(empty($username))
	{
		array_push($errorMsg,"Por favor, ingrese un usuario o correo");
	}
	if(empty($password))
	{
		array_push($errorMsg,"Por favor, ingrese una contraseña");
	}
	if(empty($errorMsg))
	{
		$login = new Auth($username,$password);
		$login->login();
		
	}
	else
	{
		$_SESSION['errorMsg'] = $errorMsg;
		//print_r($_SESSION["errorMsg"]);
		header("location: ".$url."views/usuario/index.php");
	}
}
 
?>