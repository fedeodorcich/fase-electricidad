<?php

	require_once $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/models/clienteModel.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/models/articulosModel.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/models/movimientosModel.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/models/vencimientosModel.php";


	class Uploader
	{

		private $art;
		private $mov;
		private $cli;
		private $ven;

		function __construct()
		{
				$this->art= $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/textos/Articulos.txt";
				$this->mov= $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/textos/Movimientos.txt";
				$this->cli= $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/textos/Clientes.txt";
				$this->ven= $_SERVER['DOCUMENT_ROOT']."/fase-electricidad/textos/Vencimientos.txt";
		}
	
		
		function ClienteRead(){
			$aCadena = file("$this->cli");
			$length = sizeof($aCadena);
			for ($i=1; $i < $length; $i++) { 
				$firstaux=$aCadena[$i];//asigna al auxiliar el segundo elemento del arreglo
				$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
				$cliente=new Cliente($firstaux);
				$cliente->compareClientes();
				//$cliente->getClientes();
				echo '<hr>';
			}
		}

		function MovimientoRead(){
			$aCadena = file("$this->mov");
			$length = sizeof($aCadena);
			for ($i=1; $i < $length; $i++) { 
				$firstaux=$aCadena[$i];//asigna al auxiliar el segundo elemento del arreglo
				$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
				$movimiento=new Movimiento($firstaux);
				$movimiento->compareMovimientos();
				//$movimiento->getMovimientos();
				echo '<hr>';
				echo '<br>';
			}
		}
		
		function ArticuloRead(){
			$aCadena = file("$this->art");
			$length = sizeof($aCadena);
			for ($i=1; $i < $length; $i++) { 
				$firstaux=$aCadena[$i];//asigna al auxiliar el segundo elemento del arreglo
				$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
				$articulo=new Articulo($firstaux);
				$articulo->compareArticulos();
				//$articulo->getArticulos();
				echo '<hr>';
				echo '<br>';
			}
		}

		function VencimientoRead(){
			$aCadena = file("$this->ven");
			$length = sizeof($aCadena);
			for ($i=1; $i < $length; $i++) { 
				$firstaux=$aCadena[$i];//asigna al auxiliar el segundo elemento del arreglo
				$firstaux=explode(";", $firstaux);//Divide campos tomando como referencia el caracter de punto y coma
				$articulo=new Vencimiento($firstaux);
				$articulo->compareVencimientos();
				//$articulo->getVencimientos();
				echo '<hr>';
				echo '<br>';
			}
		}
	}

 ?>