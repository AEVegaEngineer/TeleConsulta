<?php
require_once "../config/connection.php";
require_once "../config/config.php";
$db = conectar("teleconsulta");
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
	try
	{
		// revisar si usuario ya ha sido registrado
		$select_stmt = $db->prepare("SELECT * FROM personas WHERE perUsuario = :uname OR perEmail = :uemail OR perDNI = :udni");
		$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email, ':udni'=>$dni));
		$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($row["perUsuario"]))
		{
			if($row["perUsuario"] == $username)
			{
				array_push($errorMsg,"Error, usuario ya existe.");
			}
			if($row["perEmail"] == $email)
			{
				array_push($errorMsg,"Error, correo electrónico ya existe.");
			}
			if($row["perDNI"] == $dni)
			{
				array_push($errorMsg,"Error, DNI ya existe.");
			}	
		}		
		if(empty($errorMsg))
		{
			//registrar
			$newpassword = password_hash($password, PASSWORD_DEFAULT);
			$insert_stmt = $db->prepare("INSERT INTO personas (perUsuario, perEmail, perContrasena, perDNI, perObraSocial) VALUES (:uname,:uemail,:upass,:udni,:uobrasocial)");

			if($insert_stmt->execute(array(':uname'=>$username, ':uemail'=>$email, ':upass'=>$newpassword, ':udni'=>$dni, ':uobrasocial'=>$obrasocial )))
			{
				array_push($successMsg,"Registro completado exitosamente. Por favor, inicie sesión con sus datos.");
				
				$_SESSION["successMsg"] = $successMsg;
				$_SESSION["errorMsg"] = array();
				//print_r($_SESSION["successMsg"]);
				header("location: ".$url."views/usuario/index.php");
			}
		}
		else
		{		
			//redireccionar el error
			$_SESSION["errorMsg"] = $errorMsg;
			//print_r($_SESSION["errorMsg"]);
			header("location: ".$url."views/usuario/index.php?error_registro=1");
		}
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	
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