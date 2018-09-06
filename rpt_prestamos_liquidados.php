<?php
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");
	
	$sql1 = "SELECT prestamos.*, prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
  			FROM prendas, detalle_prestamo, prestamos, clientes
  			WHERE prendas.idprenda = detalle_prestamo.idprenda 
  			AND detalle_prestamo.codprestamo = prestamos.codprestamo 
  			AND prestamos.codcliente = clientes.codcliente AND prestamo_estado=3 GROUP BY 1 ORDER BY 1";
	$res1=hannquery($sql1,$link);
?>

        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row">
              <div class="col-lg-12">
                <h2>Préstamos liquidados</h2>
                <div class="btn-group" data-toggle="buttons" id="dark-toggle">
                  <a href="javascript:;" class="btn btn-default" onclick="cargare('reportes.php'); return false;">Volver</a>
                  <iframe src="print_prestamos_liquidados.php" style="display:none;" name="frame"></iframe>
                  <input type="button" class="btn btn-success" onclick="frames['frame'].print()" value="PRINT">
                </div>
								
                <div id="div-2" class="body">
			            <div class="row">
			              <div class="col-lg-12">
			              	<div class="box" style="overflow-x: auto;">

			              		<div id="div-2" class="body">
				                  <table class="table table-striped responsive-table" style="font-size: 12px;">
				                      <thead>
				                        <tr>
				                          <th width="10%">Fec. Préstamo</th>
				                          <th width="10%">Fec. Vencimiento</th>
				                          <th width="10%">Contrato</th>
				                          <th width="30%">Cliente</th>
				                          <th width="20%">Prenda</th>
				                          <th width="10%">Monto</th>
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <?php 
				                            while($row1=@mysql_fetch_array($res1))
				                              {$j++;
				                        ?>      
				                        <tr>
				                          <td align="left"><?php echo dma_shora($row1["fec_prestamo"]); ?></td>
				                          <td align="left"><?php echo dma_shora($row1["fec_vencim"]); ?> </td>
				                          <td align="left"><?php echo $row1["codPrestamo"]; ?></td>
				                          <td align="left"><?php echo $row1["nomClie"]." ".$row1["apepatClie"]." ".$row1["apematClie"]; ?></td>
				                          <td align="left"><?php echo $row1["prenda_descrip"]; ?></td>
				                          <td align="left"><?php echo $row1["prenda_prest"]; ?></td>
				                        </tr>                        
				                        <?php  }  ?>
				                      </tbody>
				                    </table>			              			

			              		</div>	

			              	</div>	
			              </div>
			            </div>  	
                </div>	

              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
             
            <div style="height: 300px;"></div>

          </div><!-- /.inner -->
        </div><!-- /.outer -->