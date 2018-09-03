<?php
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");
	date_default_timezone_set('America/Lima');
	
	$sql1 = "SELECT nomClie, apepatClie, apematClie, nroDNI, fecNac, telefono, email 
					 FROM clientes 
					 WHERE month(fecNac) = ".date('n');
	$res1=hannquery($sql1,$link);
?>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <style type="text/css">
      @media print {
        .am {
          width: 35%;
          /*border: 1px solid #ff0000;*/
        } 

        .bm {
          width: 25%;
          /*border: 1px solid #00ff00;*/
        }

        .am, .bm {
          display: inline-block;
          vertical-align: top;
        }
      }
    </style>


	  <div class="row">
      <div class="col-lg-12">
        <h3>Cumpleañeros del mes</h3>
								
        <div id="div-2">
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