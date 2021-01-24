<?php
	session_start();
	include "Utiles.php";
	class Sesion {
		private $Consulta;
		private $Resultado;
		private $Connection;
		private $JsonData;
		private $MyConnection;
		private $Solicitud;
		private $Respuesta;
		private $Numero;
		private $Util;

		public function __construct(){
			$this->Consulta = "";
			$this->Connection = new ConexionClass();
			$this->Solicitud = "";
			$this->Respuesta = "";
			$this->Numero = "3";
			$this->Numero1 = "4";
			$this->Util = new Utiles();

			$this->Consulta = "";
			$this->Solicitud = "";
			$this->Respuesta = "";
		}

		public function Iniciar(){
			if($this->Util->ComprobarExisteUsuario($_POST["Usuario"], hash('sha512', $_POST["Contrasena"])) == "1"){
				$this->MyConnection = $this->Connection->Conectar();
				$this->Consulta = "CALL `SP03ObtenerDatosUsuario`(?,?);";
				if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
					echo '{}';
				}
				$u = $_POST["Usuario"];
				$c = hash('sha512', $_POST["Contrasena"]);
				if( !$this->Solicitud->bind_param("ss", $u, $c)){
					echo '{}';
				}

				if( !$this->Solicitud->execute() ){
					echo '{}';
				}else{
					$this->Resultado = $this->Solicitud->get_result();
					$this->Respuesta = $this->Resultado->fetch_assoc();
					
					$_SESSION["Usuario"] = $this->Respuesta["Usuario"];
					$_SESSION["Nombre"] = $this->Respuesta["Nombre"];
					$_SESSION["Tipo"] = $this->Respuesta["TipoUsuario"];
					$_SESSION["Logueado"] = true;
					#print_r($this->Respuesta);
					#print_r($_SESSION);
					header('location:../index.php');
				}
			}else{
				header('location:Inicio.php');
			}
		}
	}

	$Obj = new Sesion();
	$Obj->Iniciar();
?>