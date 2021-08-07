<?php 
	require_once("controllers/uploadController.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<META HTTP-EQUIV="REFRESH" CONTENT="500;index.php">
	<title></title>
</head>
<body style="background-color:black;">
	<?php 

		$uploader=new Uploader();
		

		echo '<div style="background-color:red;"><h2>CLIENTES</h2>';
		$uploader->ClienteRead();
		echo '</div>';

		echo '<div style="background-color:cyan;"><h2>MOVIMIENTOS</h2>';
		$uploader->MovimientoRead();
		echo '</div>';
		
		echo '<div style="background-color:magenta;"><h2>ARTICULOS</h2>';
		$uploader->ArticuloRead();
		echo '</div>';
	 ?>

</body>
</html>