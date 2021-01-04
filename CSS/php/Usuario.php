<?php
	session_start();
	class Usuario{
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

			$this->Consulta = "";
			$this->Solicitud = "";
			$this->Respuesta = "";
			$this->Util = new Utiles();
		}

		public function Registrar(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP001RegistrarUsuario`(?,?,?,?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{"Exito": true, "Correcto": false, "P": 1, "Existe":false}';
			}

			if( !$this->Solicitud->bind_param("sssi",$_POST["Usuario"],  hash('sha512', $_POST["Contrasena"]), $_POST["Nombre"] ,$_POST["TipoUsuario"] )){
				echo '{"Exito": true, "Correcto": false, "P": 2, "Existe":false}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{"Exito": true, "Correcto": false, "P": 3, "Existe":false}';
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				
				if($this->Respuesta["Codigo"] == "1"){
					echo '{"Exito": true, "Correcto": true, "P": 4, "Existe":false}';
				}else{
					echo '{"Exito": true, "Correcto": false, "P": 5, "Existe":false}';
				}
				
			}
		}
		
	}
?>