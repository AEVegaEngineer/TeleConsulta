<?php
include_once "config.php";

if(!isset($_SESSION["usuario"]))  
{  
	$_SESSION["errorMsg"] = array("Debe iniciar sesión para acceder al sistema");
	$_SESSION["successMsg"] = array();
    header("location: ".$url."views/usuario/index.php");  
} 
?>