<?php
	session_start();
	include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  // $sql="SELECT * FROM prestamos WHERE fec_vencim = '0000-00-00' and codCategoria = 1"; 
  // $sql = "SELECT * FROM prestamos, categorias WHERE prestamos.codCategoria = categorias.idCategoria and prestamos.fec_vencim = '0000-00-00' and prestamos.codCategoria = 2";
  
  $sql = "SELECT * FROM prestamos, categorias WHERE prestamos.codCategoria = categorias.idCategoria";

  $res=@mysql_query($sql,$link);



// codPrestamo, codCliente, codCategoria, fec_prestamo, fec_vencim, cod_usuario, prestamo_estado

	// while($row1=@mysql_fetch_array($res))
 //    {
 //      echo $row1["codPrestamo"]." - ".$row1["fec_prestamo"]."<br>";
 //    }

?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.min.css">

<div class="row">

	<div class="col-lg-8">
		<table class="table table-bordered sortableTable responsive-table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Fec. Prest.</th>
		      <th>Fec. Vencim.</th>
		      <th>Dias</th>
		      <th>Calc. fecha</th>
		      <th> = </th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			date_default_timezone_set('America/Lima'); 	
			while($row1=@mysql_fetch_array($res)) { 
		?>  	
		    <tr>
		      <td><?php echo $row1["codPrestamo"]; ?></td>
		      <td><?php echo $row1["fec_prestamo"]; ?></td>
		      <td style="color: #5555ff; font-weight: bold;"><?php echo $row1["fec_vencim"]; ?></td>
		      <td><?php 
		      			$diastotal = $row1["categ_periodo"]*$row1["categ_plazo"]; 
		      			echo $diastotal; 
		      		?>
		      </td>
		      <td style="color: #5555ff; font-weight: bold;">
		      	<?php 
		     	$nuevafecha1 = strtotime ( '+'.$diastotal.' day' , strtotime ( $row1["fec_prestamo"] ) ) ;
					$nuevafecha2 = date ( 'Y-m-d' , $nuevafecha1 );
		      	echo $nuevafecha2;
		      	?>
					</td>
					<td>
						<?php
							if ($row1["fec_vencim"] == $nuevafecha2) {
							  echo "<strong style='color: green;'>SI</strong>";
							} else {
								echo "<strong style='color: red;'>NOO!!</strong>";
							}  

						?> 
					</td>
		    </tr>
		    <tr>
					<td colspan="6">
						<?php 
							// $sql = "UPDATE prestamos SET fec_vencim='".$nuevafecha."' WHERE prestamos.fec_vencim = '0000-00-00' and prestamos.codCategoria = 2";
							if ($row1["fec_vencim"] == $nuevafecha2) {
								echo "----";
							}else{
								$sql= "UPDATE prestamos SET fec_vencim='".$nuevafecha2."' WHERE codPrestamo=".$row1["codPrestamo"];
								echo $sql."<br>";
								// @mysql_query($sql,$link);								
							}
						?>
					</td>
		    </tr>
		<?php } ?>
		  </tbody>
		</table>
	</div>


<!-- 	<div class="col-lg-8">
		<table class="table table-bordered sortableTable responsive-table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Fec. Prest.</th>
		      <th>Fec. Vencim.</th>
		      <th>Dias</th>
		      <th> = </th>
		    </tr>
		  </thead>
			<tbody>
		<?php
		 // $sql = "SELECT * FROM prestamos, categorias WHERE prestamos.codCategoria = categorias.idCategoria";
		 // $res=@mysql_query($sql,$link);

			// while($row1=@mysql_fetch_array($res)) { 
		?>  	
		    <tr>
		      <td><?php echo $row1["codPrestamo"]; ?></td>
		      <td><?php echo $row1["fec_prestamo"]; ?></td>
		      <td><?php echo $row1["fec_vencim"]; ?></td>
		      <td>
		      	<?php 
		      			// $diastotal = $row1["categ_periodo"]*$row1["categ_plazo"]; 
		      			// echo $diastotal; 
		      		?>
		      </td>
					<td>
						<?php
							// if ($row1["fec_vencim"] == $nuevafecha2) {
							//   echo "<strong style='color: green;'>SI</strong>";
							// } else {
							// 	echo "<strong style='color: red;'>NOO!!</strong>";
							// }  
						?> 
					</td>
		    </tr>
		<?php //} ?>    				
			</tbody>	
	</div> -->

</div>