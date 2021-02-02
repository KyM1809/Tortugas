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
				//header('location:../Publicaciones.php');
				//print_r($this->Solicitud);
				//echo '<br><b>ID:</b>' . $this->Solicitud->insert_id . '<br><br><br>';

				$Id = $this->Solicitud->insert_id;

				if (isset($_FILES["Imagenes"]))
				{
					$reporte = null;
					for($x=0; $x<count($_FILES["Imagenes"]["name"]); $x++)
					{
						$file = $_FILES["Imagenes"];
						$nombre = $file["name"][$x];
						$tipo = $file["type"][$x];
						$ruta_provisional = $file["tmp_name"][$x];
						$size = $file["size"][$x];
						$dimensiones = getimagesize($ruta_provisional);
						$width = $dimensiones[0];
						$height = $dimensiones[1];
						$carpeta = "../Imagenes/Subidas/";

						if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
						{
							$reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
						}
						else if($size > 1024*1024)
						{
							$reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
						}
						else if($width > 500 || $height > 500)
						{
							$reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
						}
						else if($width < 60 || $height < 60)
						{
							$reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
						}
						else
						{
							$t = '';
							if($tipo == 'image/jpeg') $t = 'jpeg';
							if($tipo == 'image/jpg') $t = 'jpg';
							if($tipo == 'image/png') $t = 'png';
							if($tipo == 'image/gif') $t = 'gif';

							$src = $carpeta.$nombre;
							$src = $carpeta.hash('sha256', $nombre.$_SESSION['Usuario'].$x).'.'.$t;

							//Caragamos imagenes al servidor
							move_uploaded_file($ruta_provisional, $src);
							// Todo para el propietario, lectura y ejecución para los otros
							//chmod($src, 0777);
							// Lectura y escritura para el propietario, nada para los demás
							//chmod($src, 0600);
							// Lectura y escritura para el propietario, lectura para los demás
							chmod($src, 0644);

							$this->MyConnection = $this->Connection->Conectar();
							$this->Consulta = "INSERT INTO tmultimediapublicacion (Publicacion, Archivo, Extension, Tamano) VALUES (?, ?, ?, ?);";
							//$this->Consulta = "INSERT INTO tnidos(Nido, Huevos, Adoptado, Adopta) VALUES(?,?, 2, Null);";
							if( !$this->Solicitud = $this->MyConnection->prepare( $this->Consulta ) ){
								header('location:../Publicaciones.php');
							}
							if( !$this->Solicitud->bind_param("issi", $Id, $src, $t, $size) ){
								header('location:../Publicaciones.php');
							}

							if( !$this->Solicitud->execute() ){
								header('location:../Publicaciones.php');
							}else{}

							#echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
							#echo '<img src="' . $src . '">';
						}
					}

					//echo $reporte;
					header('location:../Publicaciones.php');
				}


				/*
				//Si se quiere subir una imagen
				if (isset($_POST['subir'])) {
					//Recogemos el archivo enviado por el formulario
					$archivo = $_FILES['Imagenes']['name'];
					$encarchivo = hash('sha-256', $_FILES['Imagenes']['name']);
					//Si el archivo contiene algo y es diferente de vacio
					if (isset($archivo) && $archivo != "") {
						//Obtenemos algunos datos necesarios sobre el archivo
						$tipo = $_FILES['Imagenes']['type'];
						$tamano = $_FILES['Imagenes']['size'];
						$temp = $_FILES['Imagenes']['tmp_name'];
						//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
						if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
							echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
						}
						else {
							//Si la imagen es correcta en tamaño y tipo
							//Se intenta subir al servidor
							if (move_uploaded_file($temp, '../Imagenes/Subidas/'.$archivo)) {
								//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
								chmod('../Imagenes/Subidas/'.$archivo, 0777);
								//Mostramos el mensaje de que se ha subido co éxito
								echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
								//Mostramos la imagen subida
								echo '<p><img src="../Imagenes/Subidas/'.$archivo.'"></p>';
							}
							else {
								//Si no se ha podido subir la imagen, mostramos un mensaje de error
								echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
							}
						}
					}
				}
				*/


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