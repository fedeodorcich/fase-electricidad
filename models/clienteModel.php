<?php 
	//require_once("/solar/php/conexion.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/solar/php/conexion.php');
	class Cliente
		{
			private $ArrayDatos = [];
			private $length;
			function __construct($array)
			{
				$this->ArrayDatos = $array;
				$this->length = sizeof($array);
			}
			function createCliente(){
				
			}
			function updateCliente(){
				// llama a la query para un insert
			}
			function getClientes(){
				echo $this->ArrayDatos[0];
				/*$conexion=new mysqli('localhost','root','','fase');
				$sql="SELECT * FROM clientes";
				$query=mysqli_query($conexion,$sql);
				$resp=mysqli_fetch_array($query);
				print_r($resp);*/
			}
			function compareClientes(){
				//--------obtencion de schema
				$con=new Conectar();
				$dbh=$con->conexion();

				/*$stmt = $dbh->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'fase' AND TABLE_NAME = 'clientes'");

				$schemaSql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'fase' AND TABLE_NAME = 'clientes'";
				$getSchema=mysqli_query($conexion,$schemaSql);
				$Schema=mysqli_fetch_array($getSchema);*/



				//---------------------------

				$sql="SELECT * FROM clientes WHERE CODCTA=:dato"; //---busca cliente existente

				$stmt = $dbh->prepare($sql);

				$stmt->bindParam(':dato',$this->ArrayDatos[0]);

				$stmt->execute();

				if($row = $stmt->fetch()){

					//$st = $dbh->prepare("");
    				echo json_encode($row);
				}else{
					$st = $dbh->prepare("INSERT INTO `clientes`(`ID`, `CODCTA`, `NOMBRE`, `DIRECC`, `CALLE`, `NRO`, `LOCALIDAD`, `CODPOSTAL`, `NROTEL1`, `NROTEL2`, `MAIL`, `CODIVA`, `NROIVA`, `CODVEN`, `CODCOB`, `LISPRE`, `LIMCRE`, `DIAVEN`, `DEUSAL`, `ESTADO`, `TIMING`) VALUES ('0',:0,:1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11,:12,:13,:14,:15,:16,:17,:18,current_timestamp())");

					for ($i=0; $i < $this->length; $i++) { 
						$stmt->bindParam(':'.$i,$this->ArrayDatos[$i]);
					}

					$st->execute();
					echo "usuario creado";

				}

				/*if($query=mysqli_query($conexion,$sql))
				{

					$resp=mysqli_fetch_array($query);
					$lenght=sizeof($ArrayDatos);
					for ($i=0; $i < $length; $i++) { 
						if($ArrayDatos[$i]!=$resp[$i]) //----compara los datos del array con los datos en la tabla
						{
							//$sql2="UPDATE `clientes` SET '$Schema'='$ArrayDatos['$i']' WHERE CODCTA='$ArrayDatos['$i']'";
						}
					}
				}*/
				
			}
		}




/*


	class Clients{


		private $dbh;

		public function createClient($nombre,$user,$pass){

			// Prepare

			$stmt = $dbh->prepare("INSERT INTO `clients`(`id`, `nombre`, `user`, `pass`, `timestamp`) VALUES (:id,:nombre,:user,:pass,:tim)");

			// Bind

			$nombre = "Peter";

			$ciudad = "Madrid";

			$stmt->bindParam(':id', 0);

			$stmt->bindParam(':nombre', $nombre);

			$stmt->bindParam(':pass', $user);

			$stmt->bindParam(':pass', $pass);

			$stmt->bindParam(':tim', current_timestamp());

			// Excecute

			$stmt->execute();

		}



		public function getAllClients(){
			$con=new Conectar();

			$dbh=$con->conexion();

			var_dump($dbh);

			// FETCH_ASSOC

			$stmt = $dbh->prepare("SELECT * FROM clients");

			// Especificamos el fetch mode antes de llamar a fetch()

			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			// Ejecutamos

			$stmt->execute();

			// Mostramos los resultados
			
			while ($row = $stmt->fetch()){

    			echo json_encode($row);

			}
			$dbh=null;

		}



		public function getClient($user,$pass){


			// FETCH_ASSOC

			$stmt = $dbh->prepare("SELECT * FROM clients WHERE 'user'=:user AND 'pass'=:pass");

			$stmt->bindParam(':user',$user);

			$stmt->bindParam(':pass',$pass);

			// Especificamos el fetch mode antes de llamar a fetch()

			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			// Ejecutamos

			$stmt->execute();

			// Mostramos los resultados

			while ($row = $stmt->fetch()){

    			echo json_encode($row);

			}

		}



	}*/

 ?>