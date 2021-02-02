<?php
	session_start();
	ini_set('display_errors', 1);
	include "Utiles.php";
	class Publicacion{
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

		public function Publicar(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "INSERT INTO tpublicaciones (Titulo, Texto, FechaHora, Usuario, Token) VALUES (?, ?, now(), ?, 'VACIO');";
			//$this->Consulta = "INSERT INTO tnidos(Nido, Huevos, Adoptado, Adopta) VALUES(?,?, 2, Null);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{}';
			}
			$Titulo = $_POST["Titulo"]; 
			$Texto = $_POST["Texto"];
			$Usuario = $_SESSION["Usuario"];
			if( !$this->Solicitud->bind_param("sss", $Titulo, $Texto, $Usuario) ){
				echo '{}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{}';
			}else{
				header('location:../Publicaciones.php');
				#########
				#		#
				#	OK	#
				#		#
				#########
				//print_r($this->Solicitud);
				//echo '<br><b>ID:</b>' . $this->Solicitud->insert_id . '<br><br><br>';
			}
		}

	}

	if (isset($_SESSION['Logueado'])) {
		if($_SESSION['Logueado']){
			$Obj = new Publicacion();
			$Obj->Publicar();
		}else{
			header('location:../Publicaciones.php');
		}
	}else{
		header('location:../Publicaciones.php');
	}
?>