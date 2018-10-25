<?php 
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';
	// echo fechas_hann($_POST["desde"])." - ".fechas_hann($_POST["hasta"])." - ".$_POST["opcConcepto"];
	// echo "<br>";

	if ($_POST["opcConcepto"]==0) {
		$consulta = "";
	}elseif ($_POST["opcConcepto"]<>0) {
		$consulta = " AND caja_concepto =".$_POST["opcConcepto"];
	}

  $sql = "SELECT * FROM flujos_caja f, usuario u, conceptos c 
  				WHERE f.cod_usuario = u.cod_usuario AND f.caja_concepto = c.idConcepto
  				AND caja_fecha_mov BETWEEN '".fechas_hann($_POST["desde"])." 00:00:00' AND '".fechas_hann($_POST["hasta"])." 23:59:59'".$consulta;

  // echo $sql; 
  // exit();

	$res3=hannquery($sql, $link);
  // $resul=@mysql_query($sql,$link);
  // $row3=@mysql_fetch_array($resul);

  // $fila=@mysql_fetch_object($res3);

?>

<script type="text/javascript">
    $('#dataTable3').dataTable({
              "oLanguage": {
                  "sLengthMenu": "Mostrar _MENU_ registros",
									"sZeroRecords": "No existen registros",
        					"sEmptyTable": "No existen registros",
							    "sInfo":        "Mostrando _START_ al _END_ de _TOTAL_ registros",
							    "sInfoEmpty":      "Mostrando 0 al 0 de 0 registros",
							    "sInfoFiltered":   "(filtered from _MAX_ total entries)",
							    "sInfoPostFix":    "",
							    "thousands":      ",",
							    "loadingRecords": "Loading...",
							    "sProcessing":     "Procesando...",
							    "sSearch":         "Buscar:",
							    "Paginate": {
							        "First":      "Primero",
							        "Last":       "Ultimo",
							        "Next":       "Siguiente",
							        "Previous":   "Anterior"
							    },        					 
              }
    });

    // function carga_modal(id) {
    //   $.post("modal_verprenda.php", {idPrenda: id}, function(htmlexterno){
    //      $("#cont_modal_verprenda").html(htmlexterno);
    //   });        
    // }  
</script>


<div style="overflow-x: auto;">

	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped" style="font-size: 11px;">
		<colgroup>
      <col class="con0" style="width: 10%" />
      <col class="con1" style="width: 30%" />
      <col class="con2" style="width: 10%" />
      <col class="con2" style="width: 10%" />
      <col class="con2" style="width: 8%" />
      <col class="con2" style="width: 8%" />
      <col class="con2" style="width: 8%" />
    </colgroup>
		<thead>
			<tr>
				<th align="left">Fecha</th>
				<th>Usuario</th>
				<th>Concepto</th>
				<th>Detalles</th>
				<th>Entradas</th>
				<th>Salidas</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
<!-- 			<tr>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
			</tr> -->

		<?php while ($row=@mysql_fetch_array($res3)) { ?>

<!-- idCajaflujo
caja_concepto
caja_fecha_mov
caja_monto
caja_descrip_mov
caja_tipo
cod_usuario
caja_estado -->
			<tr>
				<td><?php echo $row["caja_fecha_mov"]; ?></td>
				<td><?php echo $row["nombre"]." ".$row["apellidos"]; ?></td>
				<td><?php echo $row["nom_concepto"]; ?></td>
				<td><?php echo $row["caja_descrip_mov"]; ?></td>
				<?php
					if ($row["caja_tipo"]==1) {
						$entrada = $row["caja_monto"];
						$salida = 0;
					}elseif ($row["caja_tipo"]==-1) {
						$entrada = 0;
						$salida = $row["caja_monto"];
					}

				?>
				<td align="right"><?php echo $entrada; ?></td>
				<td align="right"><?php echo $salida; ?></td>
				<?php 
					$saldo = $saldo + ($entrada*$row["caja_tipo"])+($salida*$row["caja_tipo"]);
				?>

				<td align="right"><?php echo number_format($saldo, 2, ".", ""); ?></td>
			</tr>

		<?php } ?>	
				<tr>
					<td></td>
					<td></td>
					<td style="font-weight: bolder; font-size: 11px;">Disponible en caja</td>
					<td></td>
					<td></td>
					<td></td>
					<td align="right" style="font-weight: bolder; font-size: 11px;">
						<?php echo number_format($saldo, 2, ".", "");?>
					</td>
				</tr>
		</tbody>
	</table>	

</div>	