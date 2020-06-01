<?php
include_once "../config/config.php";
include_once "../config/connection.php";

/**
 * modelo de Eventos
 */
class evento
{
	private $tablaEventos;
	private $db;
	private $eveTitulo;
	private $eveStart;
	private $eveEnd;
	private $eveUrl;
	private $eveUsuarioDni;
	private $eveCreatedAt;
	private $eveUpdatedAt;
	function __construct($eveTitulo, $eveStart, $eveEnd, $eveUrl, $eveUsuarioDni, $eveCreatedAt, $eveUpdatedAt)
	{
		$this->db = conectar('teleconsulta');
		$this->eveTitulo = $eveTitulo;
		$this->eveStart = $eveStart;
		$this->eveEnd = $eveEnd;
		$this->eveUrl = $eveUrl;
		$this->eveUsuarioDni = $eveUsuarioDni;
		$this->eveCreatedAt = $eveCreatedAt;
		$this->eveUpdatedAt = $eveUpdatedAt;
		$this->tablaEventos = "Eventos";
	}

	public function __get($var) {
        throw new Exception("Invalid property $var");
    }

    public function __set($var, $value) {
        $this->__get($var);
    }
    public function existeEvento($dni, $start, $end)
    {
    	try
		{
			// revisar si evento ya ha sido registrado
			
			$select_stmt = $this->db->prepare("SELECT * FROM ".$this->tablaEventos." WHERE eveUsuarioDni = :edni AND eveStart = :estart AND eveEnd = :eend");
			$select_stmt->execute(array(':edni'=>$dni, ':estart'=>$start, ':eend'=>$end));
			$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
			$errorMsg = [];
			if(isset($row["eveUsuarioDni"]))
			{				
				if($row["eveUsuarioDni"] == $dni)
				{
					array_push($errorMsg,"Error, evento ya existe.");
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
			/*
			$check = $this->existeEvento($this->eveTitulo, $this->eveStart, $this->eveUrl);
	    	if($check["resultado"] == 'OK')
	    	{
	    		*/

	    		//se registra el evento	    		
				$insert_stmt = $this->db->prepare("INSERT INTO ".$this->tablaEventos." (eveTitulo, eveStart, eveEnd, eveUrl, eveUsuarioDni) VALUES (:etitulo,:estart,:eend,:eurl,:eusuariodni)");
				$successMsg = [];

				if($insert_stmt->execute(array(':etitulo'=>$this->eveTitulo, ':estart'=>$this->eveStart, ':eend'=>$eveEnd, ':eurl'=>$this->eveUrl, ':eusuariodni'=>$this->eveUsuarioDni )))
				{

					array_push($successMsg,"Registro completado exitosamente. Por favor, inicie sesión con sus datos.");
					$resultado = ["resultado"=>"OK", "mensaje"=>$successMsg];
					return $resultado;
					
				}
				/*
	    	}
	    	else
	    	{
	    		//evento ya existe, se retorna el error
	    		$resultado = ["resultado"=>"FAIL", "mensaje"=>$check];
				return $resultado;	    		
	    	}
	    	*/
    	}
		catch (PDOException $e)
		{
			echo $e->getmensaje();
		}
    }
    public function getEventosByEvento($eveTitulo)
    {
    	$select_stmt = $this->db->prepare("SELECT * FROM ".$this->tablaEventos." WHERE eveTitulo = :uname");
		$select_stmt->execute(array(':uname'=>$eveTitulo));
		$row =  $select_stmt->fetch(PDO::FETCH_ASSOC);
		if(count($row) <= 0)
		{
			$error = ["resultado"=>"FAIL", "mensaje"=>"Evento no existe"];
			return $error;
		}
		
		$eventoObj = new User();
		$eventoObj->eveTitulo=$row["eveTitulo"];
		$eventoObj->eveTitulo = $eveTitulo;
		$eventoObj->eveStart = $eveStart;
		$eventoObj->eveEnd = $eveEnd;
		$eventoObj->eveUrl = $eveUrl;
		$eventoObj->eveCreatedAt = $eveCreatedAt;
		$consulta = ["resultado"=>"OK", "carga"=>$eventoObj];
		return $consulta;
    }

}

?>