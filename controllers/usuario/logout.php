<?php
session_start();
session_destroy();
$errorMsg = array();
$successMsg = array();
header("location: ".$url."../../views/usuario/index.php");
?>