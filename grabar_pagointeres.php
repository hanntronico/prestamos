<?php
	session_start();
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  @mysql_fetch_array($rs);

	// $sql = "INSERT INTO usuario(login, clave, nombre, apellidos, dni, direccion, telefono, correo, cod_nivel, estado) VALUES ('hann',md5(123456),'Hannsito','Soft','12345678','calle','261548','h@gmail.com',".$_POST["idPrestamo"].",1)";

	$sql="SELECT pago_saldo FROM pagos WHERE codPrestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";

  $res=@mysql_query($sql,$link);
  $row=@mysql_fetch_array($res);

  $ultima_cuenta = $row["pago_saldo"];

	date_default_timezone_set('America/Lima');

	$sql="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) VALUES ('Pago de intereses', ".$_POST["idPrestamo"].",'".date("Y-m-d")."', 0, ".$_POST["montointeres"].", ".($ultima_cuenta-$_POST["montointeres"]).",".$_SESSION["s_cod"].",1)";
	// echo $sql; 

	@mysql_query($sql,$link);

?>