<?php
/* DATABASE CONFIGURATION */
function conectar($target)
{
	$db_host = 'localhost:3307';
	$db_user = 'root';
	$db_password = '';
	if($target == 'teleconsulta')
		$db_name = 'teleconsulta';
	else
		$db_name = 'teleconsultasanatorio';

	try 
	{
		$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch (PDOException $e) 
	{
		echo 'Conexión fallida: ' . $e->getMessage();
	}
}

?>