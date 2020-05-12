<?php
require_once "../config/connection.php";
require_once "../config/config.php";
$db = conectar("teleconsulta");
if(isset($_POST['btn-registro']))
{
	$username = strip_tags($_POST["username"]);
	$email = strip_tags($_POST["email"]);
	$password = strip_tags($_POST["password"]);	
	$dni = strip_tags($_POST["dni"]);
	$obrasocial = strip_tags($_POST["obrasocial"]);
	$errorMsg = array();
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
		$select_stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :uname OR email = :uemail");
		$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));
		$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	if($row["username"] == $username)
	{
		array_push($errorMsg,"Error, usuario ya existe.");
	}
	if($row["email"] == $email)
	{
		array_push($errorMsg,"Error, correo electrónico ya existe.");
	}
	if(!empty($errorMsg))
	{
		try
		{
			//registrar
			$newpassword = password_hash($password, PASSWORD_DEFAULT);
			$insert_stmt = $db->prepare("INSERT INTO usuarios (username, email, password, dni, obrasocial) VALUES (:uname,:uemail,:upass,:udni,:uobrasocial)");

			if($insert_stmt->execute(array(':uname'=>$username, ':uemail'=>$email, ':upass'=>$newpassword, ':udni'=>$dni, ':uobrasocial'=>$obrasocial )))
			{
				$registerMsg = "Registro completado exitosamente. Por favor, inicie sesión con sus datos.";
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
	}
	else
	{		
		//redireccionar el error
		$_SESSION[""];
		header("location: ".$url."views/usuario/index.php");
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