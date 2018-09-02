<?php 
	
	session_start();
	
	$descripcion = $_POST['descripcion'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$serie = $_POST['serie'];
	$observacion = $_POST['observacion'];
	$avaluo = $_POST['avaluo'];
	$prestamo = $_POST['prestamo'];


	$conta = count($_SESSION['prendas']);

	// echo $conta;

// prenda_descrip
// prenda_marca
// prenda_modelo
// prenda_serie
// prenda_observ
// prenda_avaluo
// prenda_prest

$_SESSION['prendas'][$conta]  =  array('id'=>$conta,
																				'descripcion'=>$descripcion, 
                                        'marca'=>$marca,
                                        'modelo'=>$modelo,
                                        'serie'=>$serie,
																				'observacion'=>$observacion,
																				'avaluo'=>$avaluo,
																				'prestamo'=>$prestamo
                                       );

// $_SESSION['prendas'][2]  =  array('cantidad'=>3, 'producto'=>'blusa','color'=>'verde','precio'=>35.00);
 



	// echo "<br>";
	// echo count($_SESSION['prendas']);
	// echo "<br>";

	// echo $_SESSION['prendas'];

	// for ($i=0; $i < count($_SESSION['prendas']) ; $i++) { 
	// 	echo $i;
	// 	echo "<br>";
	// }

	// $i = 0;
	// while ($i < count($_SESSION['prendas'])) {
	// 	echo $i;
	// 	echo "<br>";
	// 	$i++;
	// }




?>
<!-- <script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script> -->
<script type="text/javascript">
		// $("a[id^=delprenda_]").click(function() {
		//   // alert($(this).attr('id').split('_')[1]);
		//     $.post("limpia_prenda_id.php", {id: $(this).attr('id').split('_')[1]}, function(htmlexterno){
		//    			$("#lista_prendas").html(htmlexterno);
		//     });

		// });

</script>

<br>
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
	<thead>
		<tr>
			<th>Descrip.</th>
			<th>Prestamo</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>

	<?php  
	        foreach($_SESSION['prendas'] as $fila)
	        	{
				     // echo '<tr>
				     // <td><a href="javascript:;" id="btnLimpiaPren'.$fila['id'].'">'.$fila['id'].'</a></td>
				     // <td>'.$fila['descripcion'].'</td>
				     // <td>'.$fila['marca'].'</td>
				     // <td>'.$fila['modelo'].'</td>
				     // <td>'.$fila['serie'].'</td>
				     // <td>'.$fila['observacion'].'</td>
				     // <td>'.$fila['avaluo'].'</td>
				     // <td>'.$fila['prestamo'].'</td>
				     // <td>'.'<a href="javascript:;" id="delprenda_'.$fila['id'].'" name="btnLimpiaPrenda" class="btn btn-danger btn-round btn-grad"><i class="fa fa-trash"></i></a>'.'</td>';


				     echo '<tr>
				     <td>'.$fila['descripcion'].'</td>
				     <td>'.$fila['prestamo'].'</td>
				     <td>'.'<a href="javascript:;" id="delprenda_'.$fila['id'].'" name="btnLimpiaPrenda" class="btn btn-danger btn-round btn-grad"><i class="fa fa-trash"></i></a>'.'</td>';

				     echo '</tr>';
	          }
	?>

<!-- 		<tr>
			<td><?php //echo var_dump($_SESSION['prendas']); ?></td>
			<td><?php //echo $_SESSION['prendas'][1]; ?></td>
			<td><?php //echo $_SESSION['prendas'][2]; ?></td>
		</tr> -->
	
	</tbody>
</table>

	<?php 
		foreach($_SESSION['prendas'] as $fila){$total =  $total + $fila['prestamo'];}

		$str = "<h4>Préstamo Total</h4>";
		$str = $str."<h2>S/ ".number_format($total, 2, '.', '')."</h2><br>";
		$str = $str."<h4>Interés al final del plazo</h4>";
		$str = $str."<h2>S/ ".number_format($total*($_SESSION["catinteres"]/100), 2, '.', '')."</h2><br>";
		$str = $str."<h4>Total a Pagar al finalizar el plazo</h4>";
		$str = $str."<h2>S/ ".number_format($total*(1+($_SESSION["catinteres"]/100)), 2, '.', '')."</h2><br>";

	?>

<script type="text/javascript"> $('#totprendas').val(<?php echo $total;?>); </script>

<div class="box"><?php echo $str; ?> </div>



<?php //var_dump($_SESSION['prendas']); ?>


