<?php
	session_start();
	include "Utiles.php";
	class Nido {
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

		public function Crear(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP04CrearNido`(?,?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{}';
			}
			$nom = $_POST["NombreNido"];
			$num = $_POST["NumeroHuevos"];
			if( !$this->Solicitud->bind_param("si", $nom, $num)){
				echo '{}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{}';
			}else{
				header('location:../Nidos.php');
			}
		}

		public function Adoptar(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP08AdoptarNido`(?,?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{}';
			}
			$Nido = $_POST["IdNido"];
			$Usuario = $_SESSION["Usuario"];
			if( !$this->Solicitud->bind_param("is", $Nido, $Usuario)){
				echo '{}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{}';
			}else{
				header('location:../MisNidos.php');
			}
		}
	}

	$Obj = new Nido();
	if(isset($_POST['Id'])){
		switch ($_POST['Id']) {
			case '1':
				$Obj->Crear();
				break;

			case '2':
				$Obj->Adoptar();
				break;

			case '3':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}
?>
