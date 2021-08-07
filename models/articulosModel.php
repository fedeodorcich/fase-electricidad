<?php 

		

	require_once($_SERVER['DOCUMENT_ROOT'].'/fase-electricidad/php/conexion.php');

	class Articulo
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
			function getArticulos(){
				print_r(json_encode($this->ArrayDatos));

			}

			//---------------------------------------------------------------------------------------------------COMPARE

			function compareArticulos(){
		
				$con=new Conectar(); //-----------se crea el objeto de la clase conectar
				$dbh=$con->conexion(); //---------se asigna a la variable el método de conexion

				$sql="SELECT * FROM articulos WHERE CODART=:dato"; //---busca cliente existente en base al código de cliente

				$stmt = $dbh->prepare($sql);

				$stmt->bindParam(':dato',$this->ArrayDatos[2]);

				$stmt->execute();

				if($row = $stmt->fetch()){ //---si el articulo existe ejecuta esto

					/*
					if($row['MAIL']!=$this->ArrayDatos[9] || $row['NROTEL1']!=$this->ArrayDatos[7] || $row['NROTEL2']!=$this->ArrayDatos[8]) //-----si hay cambios en correo o telefonos entra
					{
						$this->updateCliente($dbh,$row['ID']);
						$dbh=null;
					}
					else{
						echo "Cliente existente sin modificacion";
						$dbh=null;
					}
    				*/
    				echo "el artículo existe";
    				

				}else{ //---------si no existe se crea el articulo en la tabla
					$st = $dbh->prepare("INSERT INTO `articulos`(`ID`, `CODRUB`, `DESCRIP RUBRO`, `CODART`, `DESCRIP ART`, `VTA30D`, `STOFIJ`, `STODIS`, `PRELIS1`, `PRELIS2`, `PRELIS3`, `PRELIS4`, `PRELIS5`, `PRELIS6`, `PORCIVA`, `PREDOL`, `IMPINT`, `EXENTO`, `ENLACE`, `UNIDAD`, `KILOS`, `ESTADO`, `TIMING`) VALUES (0,:codrub,:descripr,:codart,:descripa,:vta30d,:stofij,:stodis,:prelis1,:prelis2,:prelis3,:prelis4,:prelis5,:prelis6,:porciva,:predol,:impint,:exento,:enlace,:unidad,:kilos,:estado,current_timestamp())");



					//------------se asignan los parámetros a los bindeos
					$params=[
						":codrub" => $this->ArrayDatos[0],
						":descripr" => $this->ArrayDatos[1],
						":codart" => $this->ArrayDatos[2],
						":descripa" => $this->ArrayDatos[3],
						":vta30d" => $this->ArrayDatos[4],
						":stofij" => $this->ArrayDatos[5],
						":stodis" => $this->ArrayDatos[6],
						":prelis1" => $this->ArrayDatos[7],
						":prelis2" => $this->ArrayDatos[8],
						":prelis3" => $this->ArrayDatos[9],
						":prelis4" => $this->ArrayDatos[10],
						":prelis5" => $this->ArrayDatos[11],
						":prelis6" => $this->ArrayDatos[12],
						":porciva" => $this->ArrayDatos[13],
						":predol" => $this->ArrayDatos[14],
						":impint" => $this->ArrayDatos[15],
						":exento" => $this->ArrayDatos[16],
						":enlace" => $this->ArrayDatos[17],
						":unidad" => $this->ArrayDatos[18],
						":kilos" => $this->ArrayDatos[19],
						":estado" => $this->ArrayDatos[20]

					];

					
					foreach ($params as $key => &$val) {
    					$st->bindParam($key, $val); //------------aca se bindean los parametros
					}					

					$st->execute();
					echo "articulo creado";
					$st=null;

				}
				$stmt=null;
				$dbh=null;
				
			}
		}


 ?>