<?php 
	

	require_once($_SERVER['DOCUMENT_ROOT'].'/fase-electricidad/php/conexion.php');

	class Cliente
		{
			private $ArrayDatos = [];
			private $length;
			//--------------------------------------------------------------------------------------------------CREATE
			function __construct($array)
			{
				$this->ArrayDatos = $array;
				$this->length = sizeof($array);
			}
			//--------------------------------------------------------------------------------------------------UPDATE
			function updateCliente($dbh,$id){
				$sqlt="UPDATE `clientes` SET `MAIL` = :mail , `NROTEL1` = :tel1 , `NROTEL2` = :tel2 WHERE `clientes`.`ID` = :id";


				$st = $dbh->prepare($sqlt);

				$st->bindParam(':mail',$this->ArrayDatos[9]); //---------bindeo de datos
				$st->bindParam(':tel1',$this->ArrayDatos[7]);
				$st->bindParam(':tel2',$this->ArrayDatos[8]);
				$st->bindParam(':id',$id);

				$st->execute();	//-------actualiza correo y telefonos
						
				echo "Cliente ".$this->ArrayDatos[0]." actualizado";

			}
			//---------------------------------------------------------------------------------------------------READ
			function getClientes(){
				print_r(json_encode($this->ArrayDatos));

			}

			//---------------------------------------------------------------------------------------------------COMPARE
			 //mysql_real_escape_string($usuario), 

			function compareClientes(){
		
				$con=new Conectar(); //-----------se crea el objeto de la clase conectar
				$dbh=$con->conexion(); //---------se asigna a la variable el método de conexion

				$sql="SELECT * FROM clientes WHERE CODCTA=:dato"; //---busca cliente existente en base al código de cliente

				$stmt = $dbh->prepare($sql);

				$stmt->bindParam(':dato',$this->ArrayDatos[0]);

				$stmt->execute();

				if($row = $stmt->fetch()){ //---si el usuario existe ejecuta esto

					if($row['MAIL']!=$this->ArrayDatos[9] || $row['NROTEL1']!=$this->ArrayDatos[7] || $row['NROTEL2']!=$this->ArrayDatos[8]) //-----si hay cambios en correo o telefonos entra
					{
						$this->updateCliente($dbh,$row['ID']);
						$dbh=null;
					}
					else{
						echo "Cliente ".$row['CODCTA']." sin modificacion";
						$dbh=null;
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
					echo "Cliente ".$this->ArrayDatos[0]." agregado";
					$st=null;

				}
				$stmt=null;
				$dbh=null;
				
			}
		}



 ?>