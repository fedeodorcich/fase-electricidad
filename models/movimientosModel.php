<?php 

	
	require_once($_SERVER['DOCUMENT_ROOT'].'/fase-electricidad/php/conexion.php');

	class Movimiento
		{
			private $ArrayDatos = [];
			private $length;
			//--------------------------------------------------------------------------------------------------CREATE
			function __construct($array)
			{
				$this->ArrayDatos = $array;
				$this->length = sizeof($array);
			}	
			//---------------------------------------------------------------------------------------------------READ
			function getMovimientos(){
				print_r(json_encode($this->ArrayDatos));

			}

			//---------------------------------------------------------------------------------------------------COMPARE

			function compareMovimientos(){
		
				$con=new Conectar(); //-----------se crea el objeto de la clase conectar
				$dbh=$con->conexion(); //---------se asigna a la variable el método de conexion

				$sql="SELECT * FROM movimientos WHERE NROMOV=:dato"; //---busca movimiento existente
				$stmt = $dbh->prepare($sql);

				$stmt->bindParam(':dato',$this->ArrayDatos[0]);

				$stmt->execute();

				if($row = $stmt->fetch()){ //---si el movimiento existe ejecuta esto				

					echo "No hay actualización";

				}else{ //---------si el movimiento no existe lo crea en la tabla
					$st = $dbh->prepare("INSERT INTO `movimientos`(`ID`, `NROMOV`,`TIPASI`, `TIPCOM`, `SERCOM`, `NROCOM`, `FECCOM`, `CODCTA`, `TOTDEB`, `TOTCRE`, `SALLIB`, `OBSERV`, `TIMING`) VALUES (0,:nromov,:tipasi,:tipcom,:sercom,:nrocom,:fecom,:codcta,:totdeb,:totcre,:sallib,:observ,current_timestamp())");



					//------------se asignan los parámetros a los bindeos
					$params=[
						":nromov" => $this->ArrayDatos[0],
						":tipasi" => $this->ArrayDatos[1],
						":tipcom" => $this->ArrayDatos[2],
						":sercom" => $this->ArrayDatos[3],
						":nrocom" => $this->ArrayDatos[4],
						":fecom" => $this->ArrayDatos[5],
						":codcta" => $this->ArrayDatos[6],
						":totdeb" => $this->ArrayDatos[7],
						":totcre" => $this->ArrayDatos[8],
						":sallib" => $this->ArrayDatos[9],
						":observ" => $this->ArrayDatos[10]
					];

					
					foreach ($params as $key => &$val) {
    					$st->bindParam($key, $val); //------------aca se bindean los parametros
					}					

					$st->execute();
					echo "Movimiento agregado creado";
					$st=null;

				}
				$stmt=null;
				$dbh=null;
				
			}
		}


 ?>