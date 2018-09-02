<?php
	include("conectar.php");
  $link=Conectarse();

	$temporal=$_FILES['imgprenda']['tmp_name'];
	$nombre=$_FILES['imgprenda']['name'];
	$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

	date_default_timezone_set('America/Lima');
	$fec=date('Hyimsd');
	$newname = $_POST["idprenda"].$fec.".".$ext;
	// echo $newname;

	move_uploaded_file($temporal,"prendas/".$newname);

	// echo $temporal." - ".$nombre;
	// exit();
$sql1 = "UPDATE prendas SET prenda_img='".$newname."' WHERE idPrenda=".$_POST["idprenda"];
@mysql_query($sql1,$link);

?>
	<img src="prendas/<?php echo $newname;?> " width="25%">