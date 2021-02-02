<?php
	session_start();

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
			$this->Consulta = "CALL `SP04CrearNido`(?,?);";
			//$this->Consulta = "INSERT INTO tnidos(Nido, Huevos, Adoptado, Adopta) VALUES(?,?, 2, Null);";
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

		public function ListarPublicaciones(){
			#
		}

	}
?>