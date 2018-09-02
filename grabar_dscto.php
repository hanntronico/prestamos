<?php
	// echo "id prestamo : ".$_POST["idPrestamo"];	
	// echo "<br>";
	// echo "descuento: ".$_POST["dscto"];	
	session_start();
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  @mysql_fetch_array($rs);

  $sql="SELECT pago_saldo FROM pagos WHERE codPrestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";

  $res=@mysql_query($sql,$link);
  $row=@mysql_fetch_array($res);

  $ultima_cuenta = $row["pago_saldo"];

  // echo $ultima_cuenta." - ".$_POST["dscto"];

	date_default_timezone_set('America/Lima');

  	$sql="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) VALUES ('Descuento', ".$_POST["idPrestamo"].",'".date("Y-m-d")."', 0, ".$_POST["dscto"].", ".($ultima_cuenta-$_POST["dscto"]).",".$_SESSION["s_cod"].",1)";
	// echo $sql; 

	@mysql_query($sql,$link);

?>