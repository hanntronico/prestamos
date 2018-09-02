<?php
  session_start();
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);

  $sql="SELECT * FROM prestamos, clientes, categorias 
        WHERE prestamos.codCliente = clientes.codCliente 
        AND prestamos.codCategoria = categorias.idCategoria 
        AND prestamos.codPrestamo ='".$_GET["id"]."'";
  $res=@mysql_query($sql,$link);
  $fila =mysql_fetch_object($res);

  $codPrestamo = $fila->codPrestamo; 
  $codCliente = $fila->codCliente; 
  $codCategoria = $fila->codCategoria; 
  $fecprestamo = $fila->fec_prestamo; 
  $fecvencim = $fila->fec_vencim; 
  $codusuario = $fila->cod_usuario; 
  $prestamoestado = $fila->prestamo_estado; 
  $codCliente = $fila->codCliente; 
  $nomClie = $fila->nomClie; 
  $apepatClie = $fila->apepatClie; 
  $apematClie = $fila->apematClie; 
  $nroDNI = $fila->nroDNI;   
  $fecNac = $fila->fecNac;     
  $nroSec = $fila->nroSec; 
  $telefono = $fila->telefono;  
  $direccion = $fila->direccion;           
  $facebook = $fila->facebook;                              
  $email = $fila->email;                
  $nomInbox = $fila->nomInbox; 
  $estClie = $fila->estClie; 
  $idCategoria = $fila->idCategoria; 
  $catedescrip = $fila->cate_descrip;      
  $categobserv = $fila->categ_observ;               
  $categperiodo = $fila->categ_periodo; 
  $categplazo = $fila->categ_plazo; 
  $categinteres = $fila->categ_interes; 
  $categestado = $fila->categ_estado;

  $res1=hannquery("SELECT * FROM prestamos, detalle_prestamo, prendas 
                   WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
                   AND detalle_prestamo.idPrenda = prendas.idPrenda
                   AND prestamos.codPrestamo =".$_GET["id"],
                  $link);
?>

        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row">
              <div class="col-lg-12">
                <h2>
                  Recibo de Pago - Préstamo
                  <!-- <small></small>  -->
                  <!-- <small>id : <?php //echo $_GET["id"]; ?></small>  -->
                </h2>
                <div class="btn-group" data-toggle="buttons" id="dark-toggle">
                  <a href="javascript:;" class="btn btn-default" onclick="cargare('show_prestamo.php?id=<?php echo $codPrestamo ?>'); return false;">Volver</a>
                  <!-- <a href="javacript:;" class="btn btn-success" onclick="verprint('div-2')">Imprimir</a> -->
                  

                  <iframe src="print_boleta_pago.php?id=<?php echo $codPrestamo ?>" style="display:none;" name="frame"></iframe>

                  <input type="button" class="btn btn-success" onclick="frames['frame'].print()" value="PRINT">

                </div>
                <ul class="pricing-table light" contenteditable>
                  <li class="col-lg-2" style="padding: 0px">
                    <div style="background-color: #fff;">
                      <div style="height: 5px;"></div>
                    </div>                    
                  
                  <!-- <div style="height: 350px;"></div>   -->
                    <!-- <h3>Starter</h3> -->
<!--                     <div class="price-body">
                      <div class="price">
                        Free
                      </div>
                    </div> -->
<!--                     <div class="features">
                      <ul>
                        <li>Premium Profile Listing</li>
                        <li>Unlimited File Access</li>
                        <li>Free Appointments</li>
                        <li><strong>5 Bonus Points</strong>  every month</li>
                        <li>Customizable Profile Page</li>
                        <li><strong>2 months</strong>  support</li>
                      </ul>
                    </div>
                    <div class="footer">
                      <a href="#" class="btn btn-info btn-rect">Get Started</a> 
                    </div> -->
                  </li>

                  <!-- Active/Hover styles -->
                  <li class="active col-lg-8" style="padding: 0px; color: #000;">
                    <div style="background-color: #fff; text-align: left;">

                      <div class="col-lg-12" style="background-color: #fff; border: none; padding: 25px 35px;">
                        <div class="box" style="border: 0px solid #fff;">
<!--                           <header id="header">
                            hanntronic
                          </header> -->
                          <?php 
                            while($row1=@mysql_fetch_array($res1))
                              {
                                $totmonto = $totmonto + $row1["monto"];
                                $list_prendas = $list_prendas.$row1["prenda_descrip"]."<br>";
                              }
                          ?>

                  <div id="div-2" style="padding: 0px;">
                    <form class="form-horizontal">
                      <span style="font-size: 22px; color: grey;"><strong>PRÉSTAMOS</strong></span><br>
                      <?php 
                        date_default_timezone_set('America/Lima');
                       echo fechas_espanol_2(1,date("N")).", ".date("d")." de ".fechas_espanol_2(2,date('n'))." de ".date("Y");
                      ?>
                      <hr>

                      <div class="form-group" style="margin-bottom: 1px;">
                        <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
                        <label class="col-lg-4">Contrato No. :</label>
                        <div class="col-lg-8">
                          <?php echo $codPrestamo; ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4">Cliente :</label>
                        <div class="col-lg-8">
                          <?php echo $nomClie." ".$apepatClie." ".$apematClie; ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4">Fecha del préstamo :</label>
                        <div class="col-lg-8"><?php echo $fecprestamo; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4">Fecha de vencimiento :</label>
                        <div class="col-lg-8"><?php echo $fecvencim; ?></div>
                      </div>                      
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4">Comercializacion :</label>
                        <div class="col-lg-8"><?php echo " "; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4">Prendas :</label>
                        <div class="col-lg-8"> <?php echo $list_prendas; ?> </div>
                      </div>
                   </form>
                  </div>
                        </div>



<?php $res3=hannquery("SELECT pago_descrip, fec_pago, pago_abono FROM pagos WHERE codPrestamo = ".$_GET["id"]." ORDER BY codPago DESC LIMIT 1", $link);
      $fila=@mysql_fetch_object($res3);
      $pagodescrip = $fila->pago_descrip;
      $fecpago = $fila->fec_pago;
      $pagoabono = $fila->pago_abono;

?>                

                <div class="box" style="overflow-x: auto;">
                  <table class="table table-striped responsive-table" style="font-size: 12px;">
                      <thead>
                        <tr>
                          <th width="15%">Fecha</th>
                          <th width="60%">Operación</th>
                          <th style="text-align: right;">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php if ($pagoabono>0): ?>
	                        <tr>
	                          <td><?php echo $fecpago ?></td>
	                          <td><strong><?php echo $pagodescrip; ?></strong></td>
	                          <td align="right"><?php echo "S/ ".$pagoabono; ?></td>
	                        </tr>                      		
                      	<?php endif ?>
                        <tr style="font-size: 15px;">
                          <td>&nbsp;</td>
                          <td><strong>Total</strong></td>
                          <td align="right"><strong><?php echo "S/ ".$pagoabono; ?></strong></td>
                        </tr>                        

                      </tbody>
                    </table>
                </div>



                      </div>



                    </div>
                  </li>
<!--              <li class="col-lg-4">
                    <h3>Premium</h3>
                    <div class="price-body">
                      <div class="price">
                        <span class="price-figure"><sup>$</sup>49<small>.99</small> </span> 
                        <span class="price-term">per month</span> 
                      </div>
                    </div>
                    <div class="features">
                      <ul>
                        <li>Premium Profile Listing</li>
                        <li>Unlimited File Access</li>
                        <li>Free Appointments</li>
                        <li><strong>50 Bonus Points</strong>  every month</li>
                        <li>Customizable Profile Page</li>
                        <li><strong>Lifetime</strong>  support</li>
                      </ul>
                    </div>
                    <div class="footer">
                      <a href="#" class="btn btn-info btn-rect">Get Started</a> 
                    </div>
                  </li> -->
                  <div class="clearfix"></div>
                </ul>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
             
            <div style="height: 150px;"></div>

          </div><!-- /.inner -->
        </div><!-- /.outer -->