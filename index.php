﻿<?php 
	require_once("models/clienteModel.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<META HTTP-EQUIV="REFRESH" CONTENT="500;index.php">
	<title></title>
</head>
<body style="background-color:teal;">
	<?php 
	
		$link="textos/Clientes.txt";
		$aCadena = file("$link");
		$arrayend=end($aCadena);
		$indexpre=array_key_last($aCadena);
		//$i=1;
		$length = sizeof($aCadena);
		for ($i=1; $i < $length; $i++) { 
			$firstaux=$aCadena[$i];//asigna al auxiliar el penultimo elemento del arreglo
			$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
			$cliente=new Cliente($firstaux);
			$cliente->compareClientes();
			echo '<hr>';
			echo '<br>';
		}
		
	 ?>

</body>
</html>