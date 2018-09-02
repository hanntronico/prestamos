<?php 
	// echo "click en SI CANCELAR PRESTAMO id : ".$_POST["idPrestamo"];

	session_start();
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  @mysql_fetch_array($rs);

  if ($_POST["sw"]==0) {
	  $sql2="UPDATE prestamos SET prestamo_estado=0 
	  			 WHERE codPrestamo=".$_POST["idPrestamo"];
  }elseif ($_POST["sw"]==2) {
  	$sql2="UPDATE prestamos SET prestamo_estado=2 
	  			 WHERE codPrestamo=".$_POST["idPrestamo"];
  }

	@mysql_query($sql2,$link);

?>