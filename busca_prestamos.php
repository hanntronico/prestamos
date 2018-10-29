<?php 
	include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  // if ($row1["prestamo_estado"] ==1) {
  //   $msj_estado="Activo";
  //   $color_estado="btn-success";
  // }elseif ($row1["prestamo_estado"] ==2) {
  //   $msj_estado="Expirado";
  //   $color_estado="btn-danger";
  // }elseif ($row1["prestamo_estado"] ==3) {
  //   $msj_estado="Liquidado";
  //   $color_estado="btn-default";
  // }elseif ($row1["prestamo_estado"] ==0) {
  //   $msj_estado="Cancelado";
  //   $color_estado="btn-metis-5";
  // } 

	date_default_timezone_set('America/Lima');
  
  if ($_POST["sw"]==1) {
  	$finquery = " AND prestamo_estado=1 GROUP BY 1 ORDER BY 1";
  }elseif ($_POST["sw"]==2) {
  	$finquery = " AND prestamo_estado=2 GROUP BY 1 ORDER BY 1";
  }elseif ($_POST["sw"]==3) {
  	$finquery = " AND prestamo_estado=3 GROUP BY 1 ORDER BY 1";
  }elseif ($_POST["sw"]==0) {
  	$finquery = " AND prestamo_estado=0 GROUP BY 1 ORDER BY 1";
  }elseif ($_POST["sw"]==4) {
  	$finquery = " AND fec_vencim < '".date('Y-m-d')."'GROUP BY 1 ORDER BY fec_vencim";
  }

  // $sql="SELECT * FROM prestamos, clientes WHERE prestamos.codCliente = clientes.codCliente".$finquery;
  $sql="SELECT prestamos.*, prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
  			FROM prendas, detalle_prestamo, prestamos, clientes
  			WHERE prendas.idprenda = detalle_prestamo.idprenda 
  			AND detalle_prestamo.codprestamo = prestamos.codprestamo 
  			AND prestamos.codcliente = clientes.codcliente".$finquery;
  // echo $sql;
  // echo "<br>";
  $res=hannquery($sql,$link);

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

    function carga_modal(id) {
      $.post("modal_verprenda.php", {idPrenda: id}, function(htmlexterno){
         $("#cont_modal_verprenda").html(htmlexterno);
      });        
    }  
</script>

<!--     <div id="verprenda" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Datos de Prenda</h4>
          </div>
          <div class="modal-body">

            <div id="cont_modal_verprenda"></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div> -->
<div style="overflow-x: auto;">

	<table id="dataTable3" class="table table-bordered table-condensed table-hover table-striped">
		<colgroup>
      <col class="con0" style="width: 0.2%" />
      <col class="con1" style="width: 30%" />
      <col class="con2" style="width: 10%" />
      <col class="con2" style="width: 10%" />
      <col class="con2" style="width: 8%" />
    </colgroup>
		<thead>
			<tr>
				<th align="center">ID</th>
				<th>Cliente</th>
				<th>Fec. Préstamo</th>
				<th>Fec. Vencim.</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>

<?php while ($row=@mysql_fetch_array($res)) { 
		if ($row["prestamo_estado"]==0) {
			$col_estado = "Cancelado";
			$fila_color = "bg-dark lter";
		}elseif ($row["prestamo_estado"]==1) {
			$col_estado = "Activo";
			$fila_color = "bg-green lter";
		}elseif ($row["prestamo_estado"]==2) {
			$col_estado = "Expirado";
			$fila_color = "bg-red lter";
		}elseif ($row["prestamo_estado"]==3) {
			$col_estado = "Liquidado";
			$fila_color = "bg-light";
		}

		if ($_POST["sw"]==4) {
			$col_estado = "Vencido";
			$fila_color = "bg-brick";
		}
?>
			<tr>
				<td align="center" style="vertical-align: middle;" class="<?php echo $fila_color; ?>">
          <?php echo $row["codPrestamo"]; ?></td>
				<td style="vertical-align: middle;">
					<a href="javascript:;" onclick="cargare('show_prestamo.php?id=<?php echo $row["codPrestamo"] ?>'); return false;">
						<strong style="font-size: 14px;">
							<?php echo $row["nomClie"]." ".$row["apepatClie"]." ".$row["apematClie"]; ?>
						</strong>
						<br>
						<?php echo $row["prenda_descrip"]." ".$row["prenda_marca"]." ".$row["prenda_modelo"]; ?>
					</a>
				</td>
				<td style="vertical-align: middle; text-align: center;"><?php echo dma_shora($row["fec_prestamo"]); ?></td>
				<td style="vertical-align: middle; text-align: center;"><?php echo dma_shora($row["fec_vencim"]); ?></td>
				<td style="vertical-align: middle; text-align: center;"><?php echo $col_estado; ?>
				</td>
			</tr>
<?php } ?>

		</tbody>
	</table>
</div>	

<!--     <script>
      $(function() {
        Metis.MetisTable();
        Metis.metisSortable();
      });
    </script> -->