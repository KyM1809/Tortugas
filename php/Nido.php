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
			//$this->Consulta = "INSERT INTO tnidos(Nido, Huevos, Adoptado, Adopta) VALUES(?,?, 2, Null);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				header('location:../Nidos.php');
			}
			$nom = $_POST["NombreNido"];
			$num = $_POST["NumeroHuevos"];
			if( !$this->Solicitud->bind_param("si", $nom, $num)){
				header('location:../Nidos.php');
			}

			if( !$this->Solicitud->execute() ){
				header('location:../Nidos.php');
			}else{
				header('location:../Nidos.php');
				//echo '<br><b>ID:</b>' . $this->Connection->lastInsertId() . '<br><br><br>';
				//echo '<br><b>ID:</b>' . $this->Connection->mysql_insert_id . '<br><br><br>';
				//echo '<br><b>ID:</b>' . $this->Connection->insert_id . '<br><br><br>';
				#########
				#		#
				#	OK	#
				#		#
				#########
				//print_r($this->Solicitud);
				//echo '<br><b>ID:</b>' . $this->Solicitud->insert_id . '<br><br><br>';
			}
		}

		public function Adoptar(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP08AdoptarNido`(?,?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				header('location:../Adoptar.php');
			}
			$Nido = $_POST["IdNido"];
			$Usuario = $_SESSION["Usuario"];
			if( !$this->Solicitud->bind_param("is", $Nido, $Usuario)){
				header('location:../Adoptar.php');
			}

			if( !$this->Solicitud->execute() ){
				header('location:../Adoptar.php');
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
