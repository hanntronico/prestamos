<?php
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");

  date_default_timezone_set('America/Lima');
  $fecNac = date('Y-m-d');
?>

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8" async></script>

        <div class="outer">
          <div class="inner bg-light lter">
            
            <div class="row">
              <div class="col-lg-12">

                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <a href="javascript:;" onclick="cargare('reportes.php'); return false;">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </div>

                    <h5>Resumen de caja</h5>
                  </header>

                  <div id="div-2" class="body">
                    <div class="form-group" style="margin-bottom: 4px;">

                      <div class="row">
                        <label for="text2" class="control-label col-lg-1">Desde:</label>

                        <div class="col-lg-2">
                          <div class="input-group input-append date" id="dp3" data-date="<?=dma_shora($fecNac)?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" id="fecDesde" name="fecDesde" value="<?=dma_shora($fecNac)?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                          
                        </div>

                        <label for="text2" class="control-label col-lg-1">Hasta:</label>

                        <div class="col-lg-2">
                          <div class="input-group input-append date" id="dp4" data-date="<?=dma_shora($fecNac)?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" id="fecHasta" name="fecHasta" value="<?=dma_shora($fecNac)?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                          
                        </div>

                        <div class="col-lg-3">
                          <select name="codConcepto" id="opcConcepto" data-placeholder="Seleccione Concepto..." class="form-control chzn-select" tabindex='2'>  
                            <option value="0">Todos</option>
                            <?php
                              $rs=@mysql_query("set names utf8",$link);
                              $fila=@mysql_fetch_array($rs);
                              $sql1 = "SELECT * FROM conceptos WHERE estado_concepto=1 ORDER BY 1";
                              
                              $res1=@mysql_query($sql1,$link);

                              $i=0;
                             while($row1=@mysql_fetch_array($res1)) { $i++; ?>
                                
                                <option value="<?php echo $row1['idConcepto']; ?>"> <?php echo $row1['nom_concepto']; ?>  </option>

                            <?php  }  ?>                            
                          </select>

                          <?php
                            // $consult = ' WHERE estado_concepto=1 ORDER BY 1';
                            // llenarcombo('conceptos','idConcepto, nom_concepto', $consult, '', '','codConcepto id=opcConcepto')
                          ?>
                        </div>

                        <div class="col-lg-2">
                          <input type="button" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Enviar">
                        </div>

                      
                      </div>  


                  
                    </div>  
                  </div>



                  
                </div>
              </div>

            
            </div>

<style type="text/css" media="screen">
	th, td {
		padding: 5px 7px;
	}
</style>

<?php

// $query="SELECT f.caja_concepto, c.nom_concepto, count(caja_concepto) as total, sum(caja_monto) as suma 
//  FROM flujos_caja f, conceptos c 
//  WHERE f.caja_concepto = c.idConcepto 
//  GROUP BY caja_concepto";

$query="SELECT c.idConcepto, c.nom_concepto, count(caja_concepto) AS total, sum(caja_monto) AS suma 
 FROM conceptos c LEFT JOIN flujos_caja f ON c.idConcepto = f.caja_concepto GROUP by 1";
 $resulta = hannquery($query,$link);
 // $row2=@mysql_fetch_array($resulta);
 // $fila =mysql_fetch_object($resulta);


 echo $totales[0]['caja_concepto'];

	$i=0;
	while ($row=@mysql_fetch_array($resulta)) {
		$totales[$i] = array('idConcepto'=>$row["idConcepto"],
			                   'nom_concepto'=>$row["nom_concepto"], 
			                   'total'=>$row["total"], 
			                   'suma'=> $retVal = ($row["suma"]==NULL) ? 0 : floatval($row["suma"])); 
		$i++;
	}



// var_dump($totales);
// echo "<br>";


// echo $totales[0]["idConcepto"]." - ".$totales[0]["nom_concepto"]." - ".$totales[0]["total"]." - ".$totales[0]["suma"]."<br>";
// echo $totales[1]["idConcepto"]." - ".$totales[1]["nom_concepto"]." - ".$totales[1]["total"]." - ".$totales[1]["suma"]."<br>";
// echo $totales[2]["idConcepto"]." - ".$totales[2]["nom_concepto"]." - ".$totales[2]["total"]." - ".$totales[2]["suma"]."<br>";
// echo $totales[3]["idConcepto"]." - ".$totales[3]["nom_concepto"]." - ".$totales[3]["total"]." - ".$totales[3]["suma"]."<br>";
// echo $totales[4]["idConcepto"]." - ".$totales[4]["nom_concepto"]." - ".$totales[4]["total"]." - ".$totales[4]["suma"]."<br>";
// echo $totales[5]["idConcepto"]." - ".$totales[5]["nom_concepto"]." - ".$totales[5]["total"]." - ".$totales[5]["suma"]."<br>";
// echo $totales[6]["idConcepto"]." - ".$totales[6]["nom_concepto"]." - ".$totales[6]["total"]." - ".$totales[6]["suma"]."<br>";
// echo $totales[7]["idConcepto"]." - ".$totales[7]["nom_concepto"]." - ".$totales[7]["total"]." - ".$totales[7]["suma"]."<br>";
// echo $totales[8]["idConcepto"]." - ".$totales[8]["nom_concepto"]." - ".$totales[8]["total"]." - ".$totales[8]["suma"]."<br>";
// echo $totales[9]["idConcepto"]." - ".$totales[9]["nom_concepto"]." - ".$totales[9]["total"]." - ".$totales[9]["suma"]."<br>";
// echo $totales[10]["idConcepto"]." - ".$totales[10]["nom_concepto"]." - ".$totales[10]["total"]." - ".$totales[10]["suma"]."<br>";
// echo $totales[11]["idConcepto"]." - ".$totales[11]["nom_concepto"]." - ".$totales[11]["total"]." - ".$totales[11]["suma"]."<br>";
// echo $totales[12]["idConcepto"]." - ".$totales[12]["nom_concepto"]." - ".$totales[12]["total"]." - ".$totales[12]["suma"]."<br>";
// echo $totales[13]["idConcepto"]." - ".$totales[13]["nom_concepto"]." - ".$totales[13]["total"]." - ".$totales[13]["suma"]."<br>";
// echo $totales[14]["idConcepto"]." - ".$totales[14]["nom_concepto"]." - ".$totales[14]["total"]." - ".$totales[14]["suma"]."<br>";


 // echo "<br>";
 
 // exit();
$suma_salidas = $totales[0]["suma"]+$totales[1]["suma"]+$totales[2]["suma"]+$totales[3]["suma"]+$totales[4]["suma"]; 
$total_salidas = $totales[0]["total"]+$totales[1]["total"]+$totales[2]["total"]+$totales[3]["total"]+$totales[4]["total"];

?>
<!-- 
0  1 - Préstamos - 0 - 0
1  2 - Compras - 0 - 0
2  3 - Ventas canceladas - 0 - 0
3  4 - Retiros - 2 - 125
4  5 - Gastos - 1 - 220

5  6 - Pago de interés extemporáneo - 0 - 0
6  7 - Pago de intereses - 0 - 0
7  8 - Abonos a capital - 0 - 0
8  9 - Pago de recargos - 0 - 0
9  10 - Ventas - 0 - 0
10  11 - Apartados - 0 - 0
11  12 - Préstamos cancelados - 0 - 0
12  13 - Compras canceladas - 0 - 0
13  14 - Depósitos - 4 - 727.8
14  15 - Reposición de boletas - 0 - 0 
-->


            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  
                  <div id="content_verbusca">
                  	
                  	<table width="100%" style="border-bottom: 1px solid #DEDEDE;" cellspacing="3" cellpadding="3">
                  		<thead style="border-bottom: 1px solid #DEDEDE;">
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<th colspan="3" style="background-color: #F4F4F4;">Fondo inicial</th>
                  				<th width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</th>
                  				<th colspan="3" style="text-align: right; background-color: #F4F4F4;">S/. 320.00</th>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<th colspan="3" style="text-align: center;">Entradas</th>
                  				<th width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</th>
                  				<th colspan="3" style="text-align: center;">Salidas</th>
                  			</tr>
                  			<tr>
                  				<th>Concepto</th>
                  				<th style="text-align: center;">Cantidad</th>
                  				<th style="text-align: right;">Monto</th>
                  				<th width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</th>
                  				<th>Concepto</th>
                  				<th style="text-align: center;">Cantidad</th>
                  				<th style="text-align: right;">Monto</th>
                  			</tr>                   			              			
                  		</thead>
                  		<tbody>
                  			<tr style="border-bottom: 1px solid #DEDEDE; padding: 50px;">
                  				<td><?php echo $totales[6]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[6]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[6]["suma"], 2, '.', '');?></td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td><?php echo $totales[0]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[0]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[0]["suma"], 2, '.', '');?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Abonos a capital</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td><?php echo $totales[1]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[1]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[1]["suma"], 2, '.', '');?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Pago de recargos</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td><?php echo $totales[2]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[2]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[2]["suma"], 2, '.', '');?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Ventas</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td><?php echo $totales[3]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[3]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[3]["suma"], 2, '.', '');?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Apartados</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td><?php echo $totales[4]["nom_concepto"];?></td>
                  				<td align="center"><?php echo $totales[4]["total"];?></td>
                  				<td align="right">S/. <?php echo number_format($totales[4]["suma"], 2, '.', '');?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Préstamos cancelados</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td></td>
                  				<td align="center"></td>
                  				<td align="right"></td>
                  			</tr>                  			               			                			                  			
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Compras canceladas</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td></td>
                  				<td align="center"></td>
                  				<td align="right"></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Depósitos</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td></td>
                  				<td align="center"></td>
                  				<td align="right"></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #000;">
                  				<td>Reposición de boletas</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td></td>
                  				<td align="center"></td>
                  				<td align="right"></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<td>Total de Entradas</td>
                  				<td align="center">0</td>
                  				<td align="right">S/. 0.00</td>
                  				<td width="1" style="background-color: #F4F4F4; border-bottom: 1px solid #F4F4F4;">&nbsp;</td>
                  				<td>Total de Salidas</td>
                  				<td align="center"><?php echo $total_salidas; ?></td>
                  				<td align="right">S/. <?php echo number_format($suma_salidas, 2, '.', ''); ?></td>
                  			</tr>
                  			<tr style="border-bottom: 1px solid #DEDEDE;">
                  				<th colspan="3" style="background-color: #fff;">Disponible en caja</th>
                  				<th width="1" style="background-color: #fff; border-bottom: 1px solid #F4F4F4;">&nbsp;</th>
                  				<th colspan="3" style="text-align: right; background-color: #fff;">S/. 320.00</th>
                  			</tr>                  			
                  		</tbody>
                  	</table>

<!--                   	<div class="row" style="padding: 2px;">
                  		<div class="col-lg-6" style="padding: 0px 5px 0px 15px; margin: 0px;">
                  			<div class="block" style="border: 1px solid #ff0000;">
                  				hanntronico	
                  			</div>
                  		</div>
                  		<div class="col-lg-6" style="padding: 0px 15px 0px 1px; margin: 0px;">
                  			<div class="block" style="border: 1px solid #00ff00;">
                  				hanntronico	
                  			</div>	
                  		</div>                  		
                  	</div> -->


                  </div>
                
                </div>
              </div>
            </div>


            <div style="height: 300px;"></div>
          </div>
        </div> 

    <script>
      $(function() {
        Metis.formValidation();
        Metis.formGeneral();
      });
    </script>