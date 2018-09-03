<?php 
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");
  $sql1 = "SELECT nomClie, apepatClie, apematClie, nroDNI, fecNac, telefono, email FROM clientes ORDER BY 2";
	$res1=hannquery($sql1,$link);

?>

  <div class="outer">
    <div class="inner bg-light lter">
      <div class="row">
              <div class="col-lg-12">
                <h2>Clientes por orden alfabético</h2>
                <div class="btn-group" data-toggle="buttons" id="dark-toggle">
                  <a href="javascript:;" class="btn btn-default" onclick="cargare('reportes.php'); return false;">Volver</a>
                  <iframe src="print_clientes_alfa.php" style="display:none;" name="frame"></iframe>
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
				                          <th width="30%">Nombres</th>
				                          <th width="30%">Apellidos</th>
				                          <th width="10%">DNI</th>
				                          <th width="10%">Fec. Nac.</th>
				                          <th width="10%">Teléfono</th>
				                          <th width="10%">Email</th>
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <?php 
				                            while($row1=@mysql_fetch_array($res1))
				                              {$j++;
				                        ?>      
				                        <tr>
				                          <td align="left"><?php echo $row1["nomClie"]; ?></td>
				                          <td align="left"><?php echo $row1["apepatClie"]." ".$row1["apematClie"]; ?> </td>
				                          <td align="left"><?php echo $row1["nroDNI"]; ?></td>
				                          <td align="left"><?php echo dma_shora($row1["fecNac"]); ?></td>
				                          <td align="left"><?php echo $row1["telefono"]; ?></td>
				                          <td align="left"><?php echo $row1["email"]; ?></td>
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
             
      <div style="height: 150px;"></div>

    </div><!-- /.inner -->
  </div><!-- /.outer -->