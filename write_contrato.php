<?php 
  include "conectar.php";
  $link=Conectarse();
  include "funciones.php";

  $_SESSION["id_contrato"] = $_GET["idCont"];

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $consulta = "SELECT file_contrato FROM contratos WHERE idContrato=".$_GET["idCont"];
  $res=@mysql_query($consulta,$link);
  $fila =mysql_fetch_object($res);

  $filecontrato = $fila->file_contrato;

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $sql="SELECT * FROM prestamos, clientes, categorias 
        WHERE prestamos.codCliente = clientes.codCliente 
        AND prestamos.codCategoria = categorias.idCategoria 
        AND prestamos.codPrestamo ='".$_GET["id"]."'";
  $res=@mysql_query($sql,$link);
  $fila =@mysql_fetch_object($res);

  $codPrestamo = $fila->codPrestamo;
  $nomclie = $fila->nomClie;
  $apepatclie = $fila->apepatClie;
  $apematclie = $fila->apematClie;
  $nrodni = $fila->nroDNI;
  $fecprest = $fila->fec_prestamo;
  $direc = $fila->direccion;
  $catPeriod = $fila->categ_periodo;
	$catPlazo = $fila->categ_plazo;


  $res1=hannquery("SELECT * FROM prestamos, detalle_prestamo, prendas 
                   WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
                   AND detalle_prestamo.idPrenda = prendas.idPrenda
                   AND prestamos.codPrestamo =".$_GET["id"],
                  $link);

  while($row1=@mysql_fetch_array($res1))
    {
      $totmonto = $totmonto + $row1["monto"];
      $list_prendas = $list_prendas.$row1["prenda_descrip"]." ".$row1["prenda_marca"]."; ";
      // $list_prendas = $list_prendas.$row1["prenda_descrip"].";";
      // $marca_prendas = $marca_prendas.$row1["prenda_marca"].";";
      $obs_prendas = $obs_prendas.$row1["prenda_observ"]."; ";
    }

    $prendas = explode(";", $list_prendas);
    // $marcaPrendas = explode(";", $marca_prendas);
    $obsPrendas = explode(";", $obs_prendas);


	if (file_exists("contratos/".$filecontrato)) {

	  $cadena =file_get_contents("contratos/".$filecontrato);

	  $res = explode("{{NOMBRE}}", $cadena);
	  $cadena = $res[0]." ".$nomclie." ".$apepatclie." ".$apematclie." ".$res[1];
	  
	  $res = explode("{{DNI}}", $cadena);
	  for ($i=0; $i < count($res); $i++) { 
	  	if ($i!=(count($res)-1)) {
	  		$cad = $cad . $res[$i]." ".$nrodni;
	  	}else{
	  		$cad = $cad . $res[$i];
	  	}
	  }

	  // date_default_timezone_set('America/Lima');

	  $fecPrst = explode("-", $fecprest);

	  $res = explode("{{FECHA}}", $cad);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		$cad1 = $cad1 . $res[$i]." ".$fecPrst[2]." de ".fechas_espanol_2(2,$fecPrst[1])." de ".$fecPrst[0];
	  	}else{
	  		$cad1 = $cad1 . $res[$i];
	  	}	
	  }

	  $res = explode("{{DIRECCION}}", $cad1);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		$cad2 = $cad2 . $res[$i]." ".$direc;
	  	}else{
	  		$cad2 = $cad2 . $res[$i];
	  	}	
	  }

	  $res = explode("{{PRENDA}}", $cad2);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		// $cad3 = $cad3 . $res[$i]." ".$prendas[0]." ".$marcaPrendas[0];
	  		$cad3 = $cad3 . $res[$i]." ".$list_prendas;
	  	}else{
	  		$cad3 = $cad3 . $res[$i];
	  	}	
	  }

	  $res = explode("{{OBSERVACIONES}}", $cad3);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		// $cad4 = $cad4 . $res[$i]." ".$obsPrendas[0];
	  		$cad4 = $cad4 . $res[$i]." ".$obs_prendas;
	  	}else{
	  		$cad4 = $cad4 . $res[$i];
	  	}	
	  }

	  $res = explode("{{MONTO}}", $cad4);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		// $cad4 = $cad4 . $res[$i]." ".$obsPrendas[0];
	  		$cad5 = $cad5 . $res[$i]." ".$totmonto;
	  	}else{
	  		$cad5 = $cad5 . $res[$i];
	  	}	
	  }

	  $res = explode("{{PLAZO}}", $cad5);
	  for ($i=0; $i < count($res); $i++) { 
			if ($i!=(count($res)-1)) {
	  		// $cad4 = $cad4 . $res[$i]." ".$obsPrendas[0];
	  		$cad6 = $cad6 . $res[$i]." ".($catPeriod*$catPlazo);
	  	}else{
	  		$cad6 = $cad6 . $res[$i];
	  	}	
	  }

 
	  echo $cad6;

	}else{
		echo "El fichero no existe";
	}

?>