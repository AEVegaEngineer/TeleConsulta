<?php
include_once "../config/config.php";
include_once "../config/connection.php";


/**
 * modelo de autenticación
 */
class Auth
{
	private $usuUsuarioEmail;
	private $usuContrasena;
	private $db;
	function __construct($usuUsuarioEmail, $usuContrasena)
	{
		$this->usuUsuarioEmail = $usuUsuarioEmail;
		$this->usuContrasena = $usuContrasena;
	}

	public function __get($var) {
        throw new Exception("Invalid property $var");
    }

    public function __set($var, $value) {
        $this->__get($var);
    }
    public function login()
    {
    	try 
		{
			$successMsg = array();
			$errorMsg = array();
			$db = conectar('teleconsulta');
			$select_stmt = $db->prepare("SELECT * FROM usuarios WHERE usuUsuario = '".$this->usuUsuarioEmail."' OR usuEmail = '".$this->usuUsuarioEmail."'");
			$select_stmt->execute();
			$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
			$fail = 0;
			if (isset($row["usuContrasena"]))
			{
				//echo $this->usuContrasena. " != " . $row["usuContrasena"];
				if(password_verify($this->usuContrasena, $row["usuContrasena"]))
				{
					//LOGIN EXITOSO
					array_push($successMsg,"Ha iniciado sesión exitosamente!");
					$_SESSION["successMsg"] = $successMsg;
					$_SESSION["usuario"] = $row["usuUsuario"];
					$_SESSION["errorMsg"] = array();
					
					if($row["usuTipoUsuario"] == "medico")
					{
						header("location: /teleconsulta/views/medico/panel_de_control.php");
					}
					elseif ($row["usuTipoUsuario"] == "administrador") {
						header("location: /teleconsulta/views/admin/panel_de_control.php");
					}
					elseif ($row["usuTipoUsuario"] == "superusuario") {
						header("location: /teleconsulta/views/sudo/panel_de_control.php");
					}
					else
					{
						header("location: /teleconsulta/views/reservar_consulta.php");
					}
					
					
				}
				else
				{
					// MAL PASS
					array_push($errorMsg, "Error: Contraseña no coincide!");						
				}
			} else {
				// MAL USUARIO
				array_push($errorMsg, "Error: Usuario o email no coincide!");				
			}	
			
			$_SESSION["errorMsg"] = $errorMsg;
			$_SESSION["successMsg"] = array();
			//var_dump($errorMsg);
			//header("location: /teleconsulta/views/usuario/index.php");
			
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

}

?>