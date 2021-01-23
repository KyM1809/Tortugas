
<?php
	include "Conexion.php";
	class Utiles{

		private $Consulta;
		private $Resultado;
		private $Connection;
		private $JsonData;
		private $MyConnection;
		private $Solicitud;
		private $Respuesta;
		private $Numero;
		private $Numero1;

		private $Consulta2;
		private $Resultado2;
		private $Connection2;
		private $Solicitud2;
		private $Respuesta2;
		private $MyConnection2;

		public function __construct(){
			$this->Consulta = "";
			$this->Connection = new ConexionClass();
			$this->Solicitud = "";
			$this->Respuesta = "";
			$this->Numero = "3";
			$this->Numero1 = "4";

			$this->Consulta2 = "";
			$this->Connection2 = new ConexionClass();
			$this->Solicitud2 = "";
			$this->Respuesta2 = "";
			$this->Numero2 = "3";
		}

		public function ComprobarExisteUsuario($U, $C){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP02ComprobarExisteUsuario`(?,?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F1");
			}

			if( !$this->Solicitud->bind_param("ss", $U, $C)){
				//ListaUsuarios::Responder(false,"ERRORRS01-F2");
			}

			if( !$this->Solicitud->execute() ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F3");
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				$this->Numero1 = $this->Respuesta["Numero"];
			}
			return $this->Numero1;
		}

		public function VerificarUsuario($U){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP007VerificarExisteUsuario`(?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				ListaUsuarios::Responder(false,"ERRORRS01-F1");
			}

			if( !$this->Solicitud->bind_param("s", $U)){
				ListaUsuarios::Responder(false,"ERRORRS01-F2");
			}

			if( !$this->Solicitud->execute() ){
				ListaUsuarios::Responder(false,"ERRORRS01-F3");
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				$this->Numero1 = $this->Respuesta["Numero"];
			}
			return $this->Numero1;
		}

		public function VerificarCodigo($C){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP022VerificarExisteCodigo`(?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F1");
			}

			if( !$this->Solicitud->bind_param("s", $C)){
				//ListaUsuarios::Responder(false,"ERRORRS01-F2");
			}

			if( !$this->Solicitud->execute() ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F3");
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				$this->Numero1 = $this->Respuesta["Numero"];
			}
			return $this->Numero1;
		}

		public function ConectarUsuario($U){
			if(Utiles::VerificarUsuario($U) == "1"){
				$this->MyConnection = $this->Connection->Conectar();
				$this->Consulta = "CALL `SPConectarUsuario`(?);";
				if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
					//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 2}';
				}

				if( !$this->Solicitud->bind_param("s", $U)){
					//echo '{"Exito":true ,"Existe": true, "Completado":false, "P": 3}';
				}

				if( !$this->Solicitud->execute() ){
					//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 4}';
				}else{
					$this->Resultado = $this->Solicitud->get_result();
					//$this->Respuesta = $this->Resultado->fetch_assoc();
					
					if($this->Respuesta["Exito"] == "1" && $this->Respuesta["Numero"] == "1"){
						//echo '{"Exito":true,"Existe": true,"Completado":true, "P": 5}';
					}else{
						//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 6}';
					}
				}
			}else{
				//echo '{"Exito":true ,"Existe":false, "Completado":false, "P": 1}';
			}
		}

		public function ActualizarDatosCierre($U){
			if(Utiles::VerificarUsuario($U) == "1"){
				$this->MyConnection2 = $this->Connection2->Conectar();
				$this->Consulta2 = "CALL `SPActualizarDatosCierre`(?,?,?);";
				if( !$this->Solicitud2 = $this->MyConnection2->prepare( $this->Consulta2 ) ){
					//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 2}';
				}

				if( !$this->Solicitud2->bind_param("sss", $U, Utiles::FechaHora(), Utiles::ObtenerIpPublica())){
					//echo '{"Exito":true ,"Existe": true, "Completado":false, "P": 3}';
				}

				if( !$this->Solicitud2->execute() ){
					//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 4}';
				}else{
					$this->Resultado2 = $this->Solicitud2->get_result();
					//$this->Respuesta2 = $this->Resultado2->fetch_assoc();
				}
			}else{
				//echo '{"Exito":true ,"Existe":false, "Completado":false, "P": 1}';
			}
		}

		public function ActualizarDatosInicio($U){
			$this->MyConnection2 = $this->Connection2->Conectar();
			$this->Consulta2 = "CALL `SPActualizarDatosInicio`(?,?,?);";
			if( !$this->Solicitud2 = $this->MyConnection2->prepare( $this->Consulta2 ) ){
				//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 2}';
			}

			if( !$this->Solicitud2->bind_param("sss", $U, Utiles::FechaHora(), Utiles::ObtenerIpPublica())){
				//echo '{"Exito":true ,"Existe": true, "Completado":false, "P": 3}';
			}

			if( !$this->Solicitud2->execute() ){
				//echo '{"Exito":true,"Existe": true,"Completado":false, "P": 4}';
			}else{
				$this->Resultado2 = $this->Solicitud2->get_result();
				//$this->Respuesta2 = $this->Resultado2->fetch_assoc();
			}
		}

		public function IdCatalogo($C,$D){
			$SP = ["CALL `SP027IdTamano`(?)","CALL `SP028IdColor`(?)","CALL `SP029IdEstado`(?)","CALL `SP030IdEdificio`(?)"];
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = $SP[$C];
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F1");
			}

			if( !$this->Solicitud->bind_param("s", $D)){
				//ListaUsuarios::Responder(false,"ERRORRS01-F2");
			}

			if( !$this->Solicitud->execute() ){
				//ListaUsuarios::Responder(false,"ERRORRS01-F3");
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				$this->Numero1 = $this->Respuesta["Id"];
			}
			return $this->Numero1;
		}

		public function ObtenerIpPublica(){
	        try{
	            if (isset($_SERVER["HTTP_CLIENT_IP"])){
	                return $_SERVER["HTTP_CLIENT_IP"];
	            }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	                return $_SERVER["HTTP_X_FORWARDED_FOR"];
	            }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
	                return $_SERVER["HTTP_X_FORWARDED"];
	            }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
	                return $_SERVER["HTTP_FORWARDED_FOR"];
	            }elseif (isset($_SERVER["HTTP_FORWARDED"])){
	                return $_SERVER["HTTP_FORWARDED"];
	            }else{
	                return $_SERVER["REMOTE_ADDR"];
	            }
	        }catch(Exception $Ex){
	        	return "Error";
	        }
	    }

	    public function FechaHora(){
			date_default_timezone_set('America/Mexico_City');
			$time = time();
			return date("Y-m-d H:i:s", $time);
		}

		public function Fecha(){
			date_default_timezone_set('America/Mexico_City');
			$time = time();
			return date("Y-m-d", $time);
		}

	}
?>
