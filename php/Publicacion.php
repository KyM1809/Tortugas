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
				//print_r($this->Solicitud);
				//echo '<br><b>ID:</b>' . $this->Solicitud->insert_id . '<br><br><br>';

				$Id = $this->Solicitud->insert_id;

				//Si se quiere subir una imagen
				if (isset($_POST['subir'])) {
					//Recogemos el archivo enviado por el formulario
					$archivo = $_FILES['archivo']['name'];
					$encarchivo = hash('sha-256', $_FILES['archivo']['name']);
					//Si el archivo contiene algo y es diferente de vacio
					if (isset($archivo) && $archivo != "") {
						//Obtenemos algunos datos necesarios sobre el archivo
						$tipo = $_FILES['archivo']['type'];
						$tamano = $_FILES['archivo']['size'];
						$temp = $_FILES['archivo']['tmp_name'];
						//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
						if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
							echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
						}
						else {
							//Si la imagen es correcta en tamaño y tipo
							//Se intenta subir al servidor
							if (move_uploaded_file($temp, '../Imagenes/Subidas/'.$archivo)) {
								//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
								chmod('images/'.$archivo, 0777);
								//Mostramos el mensaje de que se ha subido co éxito
								echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
								//Mostramos la imagen subida
								echo '<p><img src="images/'.$archivo.'"></p>';
							}
							else {
								//Si no se ha podido subir la imagen, mostramos un mensaje de error
								echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
							}
						}
					}
				}


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