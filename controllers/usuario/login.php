<?php
	include_once "../config/config.php";
	include_once "../config/connection.php";
	$db = conectar('teleconsulta');
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
			try 
			{
				$select_stmt = $db->prepare("SELECT * FROM usuarios WHERE username = '".$username."' OR email = '".$username."'");
				$select_stmt->execute();
				$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
				echo $row["password"];
				if(password_verify($password, $row["password"]))
				{
					//LOGIN EXITOSO
					array_push($successMsg,"Ha iniciado sesión exitosamente!");
					$_SESSION["successMsg"] = $successMsg;
					$_SESSION["usuario"] = $username;
					$_SESSION["errorMsg"] = array();
					header("location: ".$url."views/reservar_consulta.php");
				}
				else
				{
					// MAL USUARIO O PASS
					array_push($errorMsg,"Usuario o contraseña no coincide!");
					$_SESSION["errorMsg"] = $errorMsg;
					//print_r($_SESSION["errorMsg"]);
					header("location: ".$url."views/usuario/index.php");
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			
		}
		else
		{
			$_SESSION['errorMsg'] = $errorMsg;
			//print_r($_SESSION["errorMsg"]);
			header("location: ".$url."views/usuario/index.php");
		}
	}
 
?>