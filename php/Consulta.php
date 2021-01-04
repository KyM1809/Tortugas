<?php
	session_start();
	include "Conexion.php";
	include "Utiles.php";
	include "Usuario.php";
	class Inventario{
		
		private $Consulta;
		private $Resultado;
		private $Connection;
		private $JsonData;
		private $MyConnection;
		private $Solicitud;
		private $Respuesta;
		private $Numero;
		private $Util;
		private $Users;

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
			$this->User = new Usuario();
		}

		public function RegistrarUsuario(){
			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP002EliminarUsuario`(?);";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{"Exito": true, "Correcto": false, "P": 1, "Existe":true}';
			}

			if( !$this->Solicitud->bind_param("s",$_POST["Usuario"] )){
				echo '{"Exito": true, "Correcto": false, "P": 2, "Existe":true}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{"Exito": true, "Correcto": false, "P": 3, "Existe":true}';
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				$this->Respuesta = $this->Resultado->fetch_assoc();
				
				if($this->Respuesta["Codigo"] == "1"){
					echo '{"Exito": true, "Correcto": true, "P": 4, "Existe":true}';
				}else{
					echo '{"Exito": true, "Correcto": false, "P": 5, "Existe":true}';
				}
			}
		}

		public function EliminarUsuario(){
			if($this->Util->VerificarUsuario($_POST["Usuario"]) == '1'){
				$this->MyConnection = $this->Connection->Conectar();
				$this->Consulta = "CALL `SP002EliminarUsuario`(?);";
				if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
					echo '{"Exito": true, "Correcto": false, "P": 1, "Existe":true}';
				}

				if( !$this->Solicitud->bind_param("s",$_POST["Usuario"] )){
					echo '{"Exito": true, "Correcto": false, "P": 2, "Existe":true}';
				}

				if( !$this->Solicitud->execute() ){
					echo '{"Exito": true, "Correcto": false, "P": 3, "Existe":true}';
				}else{
					$this->Resultado = $this->Solicitud->get_result();
					$this->Respuesta = $this->Resultado->fetch_assoc();
					
					if($this->Respuesta["Codigo"] == "1"){
						echo '{"Exito": true, "Correcto": true, "P": 4, "Existe":true}';
					}else{
						echo '{"Exito": true, "Correcto": false, "P": 5, "Existe":true}';
					}
					
				}
			}else{
				echo '{"Exito": true, "Correcto": false, "P": 6, "Existe":false}';
			}
		}

		public function ListaUsuarios(){

			$this->MyConnection = $this->Connection->Conectar();
			$this->Consulta = "CALL `SP003ListaUsuarios`();";
			if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
				echo '{"Exito": true, "Correcto": false, "P": 1}';
			}

			if( !$this->Solicitud->execute() ){
				echo '{"Exito": true, "Correcto": false, "P": 3}';
			}else{
				$this->Resultado = $this->Solicitud->get_result();
				
				$Json["Exito"] = true;
				$Json["Correcto"] = true;
				$Json["P"] = 3;
				$Json["Usuario"] = array();
				$i = 0;
				while($this->Respuesta = $this->Resultado->fetch_assoc()){
					$Json["Usuario"][$i]["Nick"] = $this->Respuesta["Usuario"];
					$Json["Usuario"][$i]["Nombre"] = $this->Respuesta["Nombre"];
					$Json["Usuario"][$i]["Tipo"] = $this->Respuesta["TipoUsuario"];
					$Json["Usuario"][$i]["FechaHora"] = $this->Respuesta["FechaHoraRegistro"];
					$i++;
				}
				echo json_encode($Json);
				
			}
		}

		public function ActualizarUsuario(){

			try{
				$this->MyConnection = $this->Connection->Conectar();
				$this->Consulta = "CALL `SP004ActualizarUsuario`(?,?,?,?);";
				if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
					echo '{"Exito": true, "Correcto": false, "P": 1}';
				}

				if( !$this->Solicitud->bind_param("sssi",$_POST["Usuario"], hash('sha512', $_POST["Contrasena"]), $_POST["Nombre"], $_POST["TipoUsuario"] )){
					echo '{"Exito": true, "Correcto": false, "P": 2}';
				}

				if( !$this->Solicitud->execute() ){
					echo '{"Exito": true, "Correcto": false, "P": 3}';
				}else{
					$this->Resultado = $this->Solicitud->get_result();
					$this->Respuesta = $this->Resultado->fetch_assoc();
					
					if($this->Respuesta["Codigo"] == "1"){
						echo '{"Exito": true, "Correcto": true, "P": 4}';
					}else{
						echo '{"Exito": true, "Correcto": false, "P": 5}';
					}
					
				}
			}catch(Exception $Ex){
				echo '{}';
			}
		}

		public function CatTipoUsuario(){
			try{
				$this->MyConnection = $this->Connection->Conectar();
				$this->Consulta = "CALL `SP008CatTipoUsuario`();";
				if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
					echo '{"Exito": true, "Correcto": false, "P": 1}';
				}

				if( !$this->Solicitud->execute() ){
					echo '{"Exito": true, "Correcto": false, "P": 3}';
				}else{
					$this->Resultado = $this->Solicitud->get_result();
					
					$Json["Exito"] = true;
					$Json["Correcto"] = true;
					$Json["P"] = 3;
					$Json["Elemento"] = array();
					$i = 0;
					while($this->Respuesta = $this->Resultado->fetch_assoc()){
						$Json["Elemento"][$i]["Id"] = $this->Respuesta["TipoUsuario"];
						$Json["Elemento"][$i]["Tipo"] = $this->Respuesta["Descripcion"];
						$i++;
					}
					echo json_encode($Json);
					
				}
			}catch(Exception $Ex){}
		}

	}

	$Obj = new Inventario();
	switch ($_POST["Id"]) {
		case '1':
			$Obj->RegistrarUsuario();
			break;
		case '2':
			$Obj->EliminarUsuario();
			break;
		case '3':
			$Obj->ListaUsuarios();
			break;
		case '4':
			$Obj->ActualizarUsuario();
			break;
		case '5':
			$Obj->CatTipoUsuario();
			break;
		default:
			# code...
			break;
	}
?>
