<?php
	ini_set('display_errors', 1);
	class ConexionClass{

		private $DbName;
		private $DbUser;
		private $DbPass;
		private $Server;
		private $ObjConnection;

		public function __construct(){
			$this->DbName = "bdcamptort_d6wn4";
			$this->DbUser = "root";
			$this->DbPass = "Gzxt1234";
			$this->Server = "localhost";
		}

		public function Conectar(){
			date_default_timezone_set('America/Mexico_City');
			$this->ObjConnection = new mysqli($this->Server, $this->DbUser, $this->DbPass, $this->DbName);
			$this->ObjConnection->set_charset("utf8");
			return $this->ObjConnection;
		}

	}
?>
