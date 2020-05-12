<?php
include_once "config.php";

if(!isset($_SESSION["usuario"]))  
{  
    header("location: "+$url+"views/usuario/index.php");  
} 
?>