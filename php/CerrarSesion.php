<?php
	session_start();
	//include "Utiles.php";
	//$Util = new Utiles();
	//$Util->ActualizarDatosCierre($_SESSION["Usuario"]);
	$_SESSION["Logueado"] = false;
	session_unset("Logueado");
	session_unset("Usuario");
	session_unset("Nombre");
	session_destroy();
	header("Location:../Inicio.php");
?>