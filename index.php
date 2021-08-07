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
<body style="background-color:teal;">
	<?php 

		$uploader=new Uploader();
		$uploader->ClienteRead();
		$uploader->MovimientoRead();
	 ?>

</body>
</html>