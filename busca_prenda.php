<?php
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $sql="SELECT prendas.idprenda as idPrenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, 
               prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie, prenda_img
        FROM prendas, detalle_prestamo, prestamos, clientes
        WHERE prendas.idprenda = detalle_prestamo.idprenda 
        AND detalle_prestamo.codprestamo = prestamos.codprestamo 
        AND prestamos.codcliente = clientes.codcliente ";

  $consulta = $sql."AND prestamos.prestamo_estado = 1 and prenda_descrip like '".$_POST["busprenda"]."%'";
  // $sql="SELECT * FROM prendas where prenda_descrip like '".$_POST["busprenda"]."%'"; 
  // $sql="SELECT * FROM prendas where prenda_descrip like '".$_GET["bus"]."%'"; 

  if ($_POST["sw"]==1) {
  	// $sql="SELECT * FROM prendas WHERE prenda_estado=1";
    $consulta = $sql."AND prestamos.prestamo_estado = 1";
  }elseif ($_POST["sw"]==2) {
  	// $sql="SELECT * FROM prendas WHERE prenda_estado=2";
    $consulta = $sql."AND prestamos.prestamo_estado = 2";
  }elseif ($_POST["sw"]==3) {
  	// $sql="SELECT * FROM prendas WHERE prenda_estado=3";
    $consulta = $sql."and prenda_estado=3";
  }

  // echo $sql;
  // exit();
  $res=@mysql_query($consulta,$link);
 	
?>
<!-- <script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script> -->
<script type="text/javascript">
    $('#dataTable1').dataTable({
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

    <div id="verprenda" class="modal fade">
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
    </div>

<!--     <a id="btnVerPrenda" data-toggle="modal" data-original-title="Ver Prenda" data-placement="bottom" class="btn btn-danger btn-round btn-grad" href="#verprenda" style="font-size: 12px;">
      Ver Prenda
    </a> -->    	
<div style="overflow-x: auto;">
	<table id="dataTable1" class="table table-bordered table-condensed table-hover table-striped">
		<colgroup>
      <col class="con0" style="width: 0.2%" />
      <col class="con1" style="width: 70%" />
      <col class="con2" style="width: 8%" />
      <col class="con3" style="width: 8%" />
    </colgroup>
		<thead>
			<tr>
				<th align="center">ID</th>
				<th>Prenda</th>
				<th>Marca</th>
				<th align="center">Img</th>
			</tr>
		</thead>
		<tbody>
<?php while($row1=@mysql_fetch_array($res)){$i++; ?>
			<tr>
				<!-- id="btnVerPrenda<?php //echo $row1["idPrenda"];?>" -->
				<td align="center" style="vertical-align: middle;"><?php echo $row1["idPrenda"]; ?></td>
				<td style="vertical-align: middle;"><a onclick="carga_modal(<?php echo $row1["idPrenda"];?>)" name="verprenda" href="#verprenda" data-toggle="modal" data-original-title="Ver Prenda">
          <?php echo $row1["prenda_descrip"]." ".$row1["prenda_marca"]." ".$row1["prenda_modelo"]; ?>
          <br>
          <?php echo $row1["prenda_serie"]; ?>
					</a>
				</td>
				<td align="center" style="vertical-align: middle;"><?php echo $row1["prenda_marca"]; ?></td>
				<td align="center" style="vertical-align: middle;"><?php 
              if ($row1["prenda_img"]<>"no_image.jpg") {
                echo "<strong style='color: #77ee77'><i class='fa fa-check-square-o'></i></strong>";
              }else{
                echo "<strong style='color: #ee7777'><i class='fa fa-times'></i></strong>";
              }

            ?>
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