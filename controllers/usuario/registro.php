<?php
/*
require_once "../config/connection.php";
require_once "../config/config.php";
$db = conectar("teleconsulta");
*/
require_once "../../models/usuario.php";
session_start();
if(isset($_POST['btn-registro']))
{
	$username = strip_tags($_POST["username"]);
	$email = strip_tags($_POST["email"]);
	$password = strip_tags($_POST["password"]);	
	$dni = strip_tags($_POST["dni"]);
	$obrasocial = strip_tags($_POST["obrasocial"]);
	$errorMsg = array();
	$successMsg = array();
	if(empty($username))
	{
		array_push($errorMsg,"Por favor, ingrese un usuario");
	}
	if(empty($email))
	{
		array_push($errorMsg,"Por favor, ingrese un correo electrónico");
	}
	if(empty($password))
	{
		pass_verificada($password, $errorMsg);		
	}
	if(empty($dni))
	{
		array_push($errorMsg,"Por favor, ingrese un DNI");
	}
	if(empty($obrasocial))
	{
		array_push($errorMsg,"Por favor, ingrese una obra social");
	}
	$user = new usuario($username, $email, $password, $dni, $obrasocial);
	$registro = $user->registrar();
	if($registro["resultado"] == "OK")
	{
		$_SESSION["successMsg"] = $registro["mensaje"]["resultado"];
		$_SESSION["errorMsg"] = array();
	}
	else
	{
		$_SESSION["successMsg"] = array();
		$_SESSION["errorMsg"] = $registro["mensaje"]["resultado"];
	}
	header("location: ".$url."views/usuario/index.php");
}
function pass_verificada($password, $errorMsg)
{
	if(empty($password))
	{
		array_push($errorMsg,"Por favor, ingrese una contraseña");
	}
	if(strlen($password)<6)
	{
		array_push($errorMsg,"La contraseña debe tener al menos 6 caracteres");
	}
	return "OK";
}
?>