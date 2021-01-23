<?php
	session_start();
	if(!isset($_SESSION["Logueado"])){
		header('location:index.php');
	}
?>