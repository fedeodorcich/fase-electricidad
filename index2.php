<!DOCTYPE html>
<html>
<head>
	<title></title>
	<META HTTP-EQUIV="REFRESH" CONTENT="1800;index.php">
<meta charset="utf-8">
</head>
<body style="background-color:black;">



<?php 
date_default_timezone_set('America/Argentina/San_Juan');
 include("php/conexion.php");

/*
		PARA BORRAR ARCHIVO DEL DIA ANTERIOR
$archi="archivos/2019-10-12.log";
unlink($archi);*/


$ayer=date('Y-m-d', strtotime('yesterday')); //usando esta sentencia se deberá borrar el registro del dia anterior
echo $ayer;
$link2="archivos/".$ayer.".log";
$aCadena2= file("$link2"); //Lee archivo del dia anterior


$hoy = date("Y-m-d");
$link="archivos/".$hoy.".log";


$aCadena = file("$link");//lee archivo del dia actual

$inter1="21:00";//Se define la cota inferior
$inter2="22:00";//Se define la cota superior
$punto=date("H:i");//Se obtiene la hora actual


echo "la hora es : ".$punto;
	echo '<br>';



	$hora;
	$energy;
	//--------------------------
	$hora_on;
	$hora_off;
	$energy_total;
	$energy_pico;
	//--------------------------
	$arrayend=end($aCadena);
	echo $arrayend[0];
	$arrayendz=end($aCadena2);
	if(($arrayend[0]!='E')&&(($punto>"05:00")&&($punto<"22:00")))
	{
		$indexpre=array_key_last($aCadena);//obtiene el indice del ultimo elemento del arreglo y lo asigna a la variable
		$firstaux=$aCadena[$indexpre-1];//asigna al auxiliar el penultimo elemento del arreglo
		$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
		$horaa=$firstaux[0];//almacena el primer elemento del arreglo
		$energya=str_replace(",",".",$firstaux[12]);//Se reemplaza la coma por el punto para un correcto almacenamiento
		$invertera=$firstaux[1];
		/*echo $horaa;
		echo "<br>";
		echo "soy el firstaux convertido ".$energya;
		echo "<br>";
		echo "soy el firstaux ".$firstaux[12];
		echo "<br>";*/
		
		$queryfirst=mysqli_query($conexion3,"INSERT INTO `registros` (`id`, `hora`, `energy`, `inverter`,`timestamp`) VALUES ('0', '$horaa', '$energya','$invertera',current_timestamp())");

		$queryfirst;


		$newarray = explode(";", $arrayend);
		//echo $newarray[12];
		$hora=$newarray[0];
		$energy=str_replace(",",".",$newarray[12]);
		$inverterb=$newarray[1];
		//echo $energy;
		//print_r($newarray);
		$query=mysqli_query($conexion3,"INSERT INTO `registros` (`id`, `hora`, `energy`, `inverter`,`timestamp`) VALUES ('0', '$hora', '$energy','$inverterb',current_timestamp())");
		$query;
	}
	else
	{
		$var3="SELECT * FROM resumen ORDER BY id desc limit 1";
		$fechadecorte;
		$queryz=mysqli_query($conexion3,$var3);
		if($consultafecha=mysqli_fetch_array($queryz))
		{
			$fechadecorte=$consultafecha['date'];
		}
		echo 'entro al else';
		if(($punto>$inter1)&&($punto<$inter2))//Se verifica que la hora actual este dentro del intervalo
		{
		echo 'se carga el resumen diario';
		//--------------------ENERGÍA TOTAL----------------------------------------
		$newarray2 = explode(" ", $arrayendz); //se divide el arreglo por el caracter espacio
		$index=array_key_last($aCadena2);// Obtiene el índice del ultimo elemento del arreglo
		$energy_total=str_replace(",",".",$newarray2[2]);//Asigna el elemento del arreglo perteneciente al valor en Kw
		echo "newarray2".$newarray2;
		//-------------------HORA DE ENCENDIDO------------------------------
		$hora_encendido=explode(" ", $aCadena2[$index-3]);
		$hora_on= $hora_encendido[4];
		
		//-------------------HORA DE APAGADO------------------------------
		$hora_apagado=explode(" ", $aCadena2[$index-2]);
		$hora_off= $hora_apagado[4];
		
		//-------------------ENERGIA PICO------------------------------
		$energia_pico=explode(" ", $aCadena2[$index-1]);
		$energy_pico= str_replace(",",".",$energia_pico[4]);
		
		 

		$var2="INSERT INTO `resumen` (`id`, `encendido`, `apagado`, `pico`, `total`, `date`) VALUES ('0', '$hora_on', '$hora_off','$energy_pico','$energy_total','$hoy')";

		$query2=mysqli_query($conexion3,$var2);
		$query2;

		echo "hora encendido : ".$hora_on;
		echo "hora apagado : ".$hora_off;
		echo "energia pico : ".$energy_pico;
		echo "energia total : ".$energy_total;

		}
		else {
			echo 'ya se cargo el resumen diario';
		}
	}
	
 ?>

<h1 style="color:orange;">NO CERRAR ESTA PÁGINA</h1>
 </body>
</html>
