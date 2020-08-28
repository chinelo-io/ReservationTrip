<?php
	/**
	 * Clase encargada de realizar la conexión a la Base de Datos.
	 */
	class DatabaseConnection{


		private $host;
		private $database;
		private $user;
		private $password;

		//Constructor
		//Cuando es llamado inicializa las variables, con los del archivo.
		public function __construct(){
			$db_cfg = require_once 'PropertiesBD.php';
			$this->host=$db_cfg["host"];
			$this->database=$db_cfg["database"];
			$this->user=$db_cfg["user"];
			$this->password=$db_cfg["password"];
        }

        /**
         * 
         */
		public function getConnection(){
			try {
				$conexion = mysqli_connect($this->host,$this->user,$this->password,$this->database);
				if ($conexion != null) {
					return $conexion;
				}else{
					return null;
				}
			} catch (Exception $exception) {
				die("Ocurrió un error al inicializar la base de datos. ".$exception->getMessage());
			}
		}

		
	}

?>