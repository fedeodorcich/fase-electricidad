<?php 
	require_once("controllers/uploadController.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<META HTTP-EQUIV="REFRESH" CONTENT="500;index.php">
	<title></title>
	
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color:black;">
	<style>
		.scroller{
			height: 500px;
			overflow-y: scroll;
		}
	</style>
	 <?php 
		$uploader=new Uploader();
	 ?>

	 <div class="col-md-12 container row m-auto">

	 	<div class="col-md-4 bg-primary m-auto scroller">
	 		<h3>Clientes</h3>
	 		<?php  $uploader->ClienteRead();?>
	 	</div>

	 	<div class="col-md-4 bg-info m-auto scroller">
	 		<h3>Movimientos</h3>
	 		<?php  $uploader->MovimientoRead();?>
	 	</div>

	 	<div class="col-md-4 bg-secondary m-auto scroller">
	 		<h3>Artículos</h3>
	 		<?php  $uploader->ArticuloRead(); ?>
	 	</div>

	 </div>

	 <div>
	 	<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
	 </div>




</body>
</html>