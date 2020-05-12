<?php
	include_once "../config/config.php";
	include_once "../config/connection.php";
	$db = conectar('teleconsulta');
	session_start();
	if(isset($_SESSION["user_login"]))
	{
		header("location: /a_monitormedico/views/usuario/index.php");  
	}
	if(isset($_POST["username"]))
	{
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		$password = password_verify($password, PASSWORD_DEFAULT);
		if(empty($username))
		{
			$errorMsg[] = "Por favor, ingrese un usuario o correo";
		}
		if(empty($password))
		{
			$errorMsg[] = "Por favor, ingrese una contraseña";
		}
		if(empty($errorMsg))
		{
			try 
			{
				$select_stmt = $db->prepare("SELECT * FROM usuarios WHERE username = '".$username."' OR email = '".$username."' and password = '".$password."'");
				$select_stmt->execute();
				$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
				print_r($row);
				if($select_stmt->rowCount() > 0 && !empty($select_stmt))
				{
					echo "Login OK";
				}
				else
				{
					echo "Login FAIL";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			
		}
		else
		{
			$_SESSION['errorMsg'] = $errorMsg;
			header("location: "+$url+"views/usuario/index.php");
		}
	}
 
?>