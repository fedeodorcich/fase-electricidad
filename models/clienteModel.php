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

			}


			 //mysql_real_escape_string($usuario), 

			function compareClientes(){
		
				$con=new Conectar(); //-----------se crea el objeto de la clase conectar
				$dbh=$con->conexion(); //---------se asigna a la variable el método de conexion

				$sql="SELECT * FROM clientes WHERE CODCTA=:dato"; //---busca cliente existente en base al código de cliente

				$stmt = $dbh->prepare($sql);

				$stmt->bindParam(':dato',$this->ArrayDatos[0]);

				$stmt->execute();

				if($row = $stmt->fetch()){ //---si el usuario existe ejecuta esto

					if($row['MAIL']!=$this->ArrayDatos[9] || $row['NROTEL1']!=$this->ArrayDatos[7] || $row['NROTEL2']!=$this->ArrayDatos[8])
					{
						$sqlt="UPDATE `clientes` SET `MAIL` = ':mail' WHERE `clientes`.`ID` = '$row[ID]'";


						$st = $dbh->prepare($sqlt);

						$st->bindParam(':mail',$this->ArrayDatos[9]);
						$st->bindParam(':tel1',$this->ArrayDatos[7]);
						$st->bindParam(':tel2',$this->ArrayDatos[8]);
						$st->execute();
						
						echo "Cliente updated";

					}
					else{
						echo "cliente existente sin modificacion";
					}
    				
    				

				}else{ //---------si no existe se crea el usuario en la tabla
					$st = $dbh->prepare("INSERT INTO `clientes`(`ID`, `CODCTA`, `NOMBRE`, `DIRECC`, `CALLE`, `NRO`, `LOCALIDAD`, `CODPOSTAL`, `NROTEL1`, `NROTEL2`, `MAIL`, `CODIVA`, `NROIVA`, `CODVEN`, `CODCOB`, `LISPRE`, `LIMCRE`, `DIAVEN`, `DEUSAL`, `ESTADO`, `TIMING`) VALUES (0,:cod,:name,:dir,:street,:num,:loc,:cp,:tel1,:tel2,:mail,:codiva,:numiva,:codven,:codcob,:lispre,:limcre,:diaven,:deusal,:state,current_timestamp())");



					//------------se asignan los parámetros a los bindeos
					$params=[
						":cod" => $this->ArrayDatos[0],
						":name" => $this->ArrayDatos[1],
						":dir" => $this->ArrayDatos[2],
						":street" => $this->ArrayDatos[3],
						":num" => $this->ArrayDatos[4],
						":loc" => $this->ArrayDatos[5],
						":cp" => $this->ArrayDatos[6],
						":tel1" => $this->ArrayDatos[7],
						":tel2" => $this->ArrayDatos[8],
						":mail" => $this->ArrayDatos[9],
						":codiva" => $this->ArrayDatos[10],
						":numiva" => $this->ArrayDatos[11],
						":codven" => $this->ArrayDatos[12],
						":codcob" => $this->ArrayDatos[13],
						":lispre" => $this->ArrayDatos[14],
						":limcre" => $this->ArrayDatos[15],
						":diaven" => $this->ArrayDatos[16],
						":deusal" => $this->ArrayDatos[17],
						":state" => $this->ArrayDatos[18]
					];

					
					foreach ($params as $key => &$val) {
    					$st->bindParam($key, $val); //------------aca se bindean los parametros
					}					

					$st->execute();
					echo "usuario creado";

				}
				
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