<?php
	session_start();
	include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  @mysql_fetch_array($rs);

  date_default_timezone_set('America/Lima');

	// echo $_POST["cantidad"]." - ".
	// 		 $_POST["descrip_deposito"]." - ".
	// 		 $_SESSION["s_cod"]." - ".
	// 		 date("Y-m-d H:i:s")." - ".
	// 		 $_POST["codConcepto"]."<br>";

	$sql="INSERT INTO flujos_caja(caja_concepto, caja_fecha_mov, caja_monto, caja_descrip_mov, caja_tipo, cod_usuario, caja_estado) VALUES (".$_POST["codConcepto"].", '".date("Y-m-d H:i:s")."', ".$_POST["cantidad"].", '".$_POST["descrip_deposito"]."', 1, ".$_SESSION["s_cod"].", 1)";

	@mysql_query($sql,$link);

?>