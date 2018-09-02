<?php
	session_start();
	include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  
  // $sql = "select * from prestamos where codPrestamo NOT IN (SELECT codPrestamo FROM pagos GROUP BY 1)";
  $sql = "SELECT prestamos.codPrestamo 
  				FROM prestamos, detalle_prestamo
  				WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo and prestamos.codPrestamo NOT IN (SELECT codPrestamo FROM pagos GROUP BY 1) GROUP BY 1";
  $res=@mysql_query($sql,$link);

	// while($row1=@mysql_fetch_array($res))
 //    {
 //      echo $row1["codPrestamo"]." - ".$row1["fec_prestamo"]."<br>";
 //    }

?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.min.css">

	<div class="col-lg-8">
		<table class="table table-bordered sortableTable responsive-table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Monto Prest.</th>
		      <th>% Int.</th>
		      <th>$ Int. </th>
		      <th>Fecha</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			while($row1=@mysql_fetch_array($res)) { 

			$sql="SELECT prestamos.codPrestamo, 
			 			 sum(monto) AS total, 
			 			 categorias.categ_interes, 
			 			 ((sum(monto)*categorias.categ_interes)/100) as interes,
			 			 prestamos.fec_prestamo as fecprestamo
			 			FROM prestamos, detalle_prestamo, categorias
			 			WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
			 			AND prestamos.codCategoria = categorias.idCategoria
			 			AND prestamos.codPrestamo =".$row1["codPrestamo"]." GROUP by 1";
			$res2=@mysql_query($sql,$link);
			$fila =mysql_fetch_object($res2);

			$codPrestamo = $fila->codPrestamo; 
			$total = $fila->total;  
			$categinteres = $fila->categ_interes; 
			$interes = $fila->interes;
			$fecpresta = $fila->fecprestamo;

		?>  	
		    <tr>
		      <td><?php echo $codPrestamo; ?></td>
		      <td><?php echo $total; ?></td>
		      <td><?php echo $categinteres; ?></td>
		      <td><?php echo $interes; ?></td>
					<td><?php echo $fecpresta; ?></td>
		    </tr>
		    <tr>
		    	<td colspan="5">
						<?php 

				   	// $sql2="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) 
				    // 			 VALUES ('Préstamo', ".$codPrestamo.",'".$fecpresta."', ".$total.", 0, ".$total.", ".$_SESSION["s_cod"].",1)";
				    // echo $sql2;			 
				    // echo "<br>";			

				    // @mysql_query($sql2,$link);

				    // $sql3="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) 
				    // 			 VALUES ('Intereses generados', ".$codPrestamo.",'".$fecpresta."', ".$interes.", 0, ".($total+$interes).", ".$_SESSION["s_cod"].", 1)";
				    // echo $sql3;			 	
				    
				    // @mysql_query($sql3,$link);


						?>
		    	</td>
		    </tr>  
		<?php } ?>
		  </tbody>
		</table>
	</div>		  	