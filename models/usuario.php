<?php
include_once "../config/config.php";
include_once "../config/connection.php";

/**
 * modelo de usuarios
 */
class usuario
{
	private $tablaUsuarios;
	private $db;
	private $usuUsuario;
	private $usuEmail;
	private $usuContrasena;
	private $usuDni;
	private $usuObrasocial;
	function __construct($usuUsuario, $usuEmail, $usuContrasena, $usuDni, $usuObrasocial)
	{
		$this->db = conectar('teleconsulta');
		$this->usuUsuario = $usuUsuario;
		$this->usuEmail = $usuEmail;
		$this->usuContrasena = $usuContrasena;
		$this->usuDni = $usuDni;
		$this->usuObrasocial = $usuObrasocial;
		$this->tablaUsuarios = "usuarios";
	}

	public function __get($var) {
        throw new Exception("Invalid property $var");
    }

    public function __set($var, $value) {
        $this->__get($var);
    }
    public function existeUsuario($username, $email, $dni)
    {
    	try
		{
			// revisar si usuario ya ha sido registrado
			
			$select_stmt = $this->db->prepare("SELECT * FROM ".$this->tablaUsuarios." WHERE usuUsuario = :uname OR usuEmail = :uemail OR usuDni = :udni");
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email, ':udni'=>$dni));
			$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
			$errorMsg = [];
			if(isset($row["usuUsuario"]))
			{				
				if($row["usuUsuario"] == $username)
				{
					array_push($errorMsg,"Error, usuario ya existe.");
				}
				if($row["usuEmail"] == $email)
				{
					array_push($errorMsg,"Error, correo electrónico ya existe.");
				}
				if($row["usuDni"] == $dni)
				{
					array_push($errorMsg,"Error, DNI ya existe.");
				}
						
			}	
			if(empty($errorMsg))
			{
				$resultado = ["resultado"=>"OK"];
			}
			else
			{
				$resultado = ["resultado"=>$errorMsg];
			}
			return $resultado;
		}
		catch (PDOException $e)
		{
			echo $e->getmensaje();
		}
    }
    public function registrar()
    {
    	try
		{
			$check = $this->existeUsuario($this->usuUsuario, $this->usuEmail, $this->usuDni);
	    	if($check["resultado"] == 'OK')
	    	{

	    		//se registra el usuario
	    		$newpassword = password_hash($this->usuContrasena, PASSWORD_DEFAULT);
				$insert_stmt = $this->db->prepare("INSERT INTO ".$this->tablaUsuarios." (usuUsuario, usuEmail, usuContrasena, usuDni, usuObrasocial) VALUES (:uname,:uemail,:upass,:udni,:uobrasocial)");
				$successMsg = [];

				if($insert_stmt->execute(array(':uname'=>$this->usuUsuario, ':uemail'=>$this->usuEmail, ':upass'=>$newpassword, ':udni'=>$this->usuDni, ':uobrasocial'=>$this->usuObrasocial )))
				{

					array_push($successMsg,"Registro completado exitosamente. Por favor, inicie sesión con sus datos.");
					$resultado = ["resultado"=>"OK", "mensaje"=>$successMsg];
					return $resultado;
					
				}
	    	}
	    	else
	    	{
	    		//usuario ya existe, se retorna el error
	    		$resultado = ["resultado"=>"FAIL", "mensaje"=>$check];
				return $resultado;	    		
	    	}
    	}
		catch (PDOException $e)
		{
			echo $e->getmensaje();
		}
    }
    public function getUsuariosByUsuario($usuUsuario)
    {
    	$select_stmt = $this->db->prepare("SELECT * FROM ".$this->tablaUsuarios." WHERE usuUsuario = :uname");
		$select_stmt->execute(array(':uname'=>$usuUsuario));
		$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
		if(count($row) <= 0)
		{
			$error = ["resultado"=>"FAIL", "mensaje"=>"Usuario no existe"];
			return $error;
		}
		
		$usuarioObj = new User();
		$usuarioObj->usuUsuario=$row["usuUsuario"];
		$usuarioObj->usuUsuario = $usuUsuario;
		$usuarioObj->usuEmail = $usuEmail;
		$usuarioObj->usuContrasena = $usuContrasena;
		$usuarioObj->usuDni = $usuDni;
		$usuarioObj->usuObrasocial = $usuObrasocial;
		$consulta = ["resultado"=>"OK", "carga"=>$usuarioObj];
		return $consulta;
    }

}

?>