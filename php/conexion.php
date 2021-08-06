<?php 

	class Conectar
	{
		private $dsn = 'mysql:host=localhost;dbname=fase';
		private $usuario = 'root';
		private $contrasenia = '';
		function conexion()
		{

			try {

    				$dbh = new PDO($this->dsn, $this->usuario, $this->contrasenia);
    				return $dbh;

				} 

			catch (PDOException $e) {

    				echo 'Falló la conexión: ' . $e->getMessage();

			}

		}

	}	

 ?>