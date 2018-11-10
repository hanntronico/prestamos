<?php 
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  // $sql="SELECT * FROM prestamos WHERE codPrestamo ='".$_GET["id"]."'"; 
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


  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  // $sql="SELECT * FROM prestamos WHERE codCliente = ".$_GET["id"]; 

  $sql1 = "SELECT * FROM prestamos, detalle_prestamo, prendas 
           WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
           AND detalle_prestamo.idPrenda = prendas.idPrenda
           AND prestamos.codPrestamo =".$_GET["id"];

  $res1=@mysql_query($sql1,$link); 
  // $fila1 = mysql_fetch_object($res1);
  // $row1=@mysql_fetch_array($res1);

?>        
<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>

<style>
  .popover-content {
      color: black;
      font-size: 12px;
  }
</style>

  <div class="outer">
    <div class="inner bg-light lter">

            <!--BEGIN INPUT TEXT FIELDS-->
      <div class="row">

        <div class="col-lg-8">
          <div class="box inverse">
            <header>
              <div class="icons">
                <a href="javascript:;" onclick="cargare('show_cliente.php?id=<?php echo $codCliente;?>'); return false;">
                        <i class="fa fa-chevron-left"></i>
                </a>
              </div>
                    <!-- <h5><?php //echo $nomClie." ".$apepatClie." ".$apematClie;?></h5> -->
              <h5><?php echo "CP: ".$codPrestamo." - ".$nomClie." ".$apepatClie." ".$apematClie ;?></h5>


                <div class="toolbar">
                  <nav style="padding: 8px;">
                    <?php if ($prestamoestado == 1) { ?>
                      <a id="aplicadescuento" class="btn btn-info btn-circle btn-sm" data-content="Aplicar Descuento" data-toggle="modal" data-placement="bottom" href="#aplicardscto">
                        <i class="fa fa-minus"></i>
                      </a>
                      <a id="enlCancelaPrestamo" class="btn btn-default btn-circle btn-sm" data-content="Cancelar Préstamo" data-toggle="modal" data-placement="bottom" href="#modCancelPres">
                        <i class="fa fa-times"></i>
                      </a>
                      <a id="enlMarcarExpirado" class="btn btn-primary btn-circle btn-sm" data-content="Marcar como expirado" data-toggle="modal" data-placement="bottom" href="#modMarcaExpira">
                        <i class="fa fa-tag"></i>
                      </a>
                    <?php } ?> 
                    <a href="javascript:;" class="btn btn-metis-3 btn-circle btn-sm" data-content="Estado de cuenta" onclick="cargare('estado_cuenta.php?id=<?php echo $codPrestamo; ?>'); return false;">
                      <i class="fa fa-print"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-metis-5 btn-circle btn-sm" data-content="Recibo de pago" onclick="cargare('recibo_pago.php?id=<?php echo $codPrestamo; ?>'); return false;">
                      <i class="fa fa-file-o"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-metis-6 btn-circle btn-sm" data-content="Boleta" onclick="cargare('boleta.php?id=<?php echo $codPrestamo; ?>'); return false;">
                      <i class="fa fa-file-text-o"></i>
                    </a>            

<!--                 <a data-toggle="modal" data-placement="bottom" class="btn btn-metis-6 btn-circle btn-sm" data-content="Boleta" href="#helpModal">
                  <i class="fa fa-file-text-o"></i>
                </a> -->

                  </nav>
                </div>
            </header>

    <div id="aplicardscto" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Aplicar Descuento</h4>
          </div>
          <div class="modal-body">
            <div id="content_modal_dscto"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnPagarDscto" class="btn btn-primary btn-grad" data-dismiss="modal">Pagar</button>
          </div>
        </div>
      </div>
    </div>

    <div id="modCancelPres" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Cancelar Préstamo</h4>
          </div>
          <div class="modal-body">
            <!-- <div id="content_modal_dscto"></div> -->
            El préstamo se marcará como cancelado. Los registros de caja y las prendas asociadas se eliminarán permanentemente.<br>
            ¿Deseas continuar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            <button type="button" id="btnCancelarPrest" class="btn btn-primary btn-grad" data-dismiss="modal">SI</button>
          </div>
        </div>
      </div>
    </div>                     

    <div id="modMarcaExpira" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Marcar préstamo expirado</h4>
          </div>
          <div class="modal-body">
            <!-- <div id="content_modal_dscto"></div> -->
            El préstamo se marcará como expirado y las prendas pasarán a venta.<br>
            ¿Deseas continuar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            <button type="button" id="btnMarcarExpirado" class="btn btn-primary btn-grad" data-dismiss="modal">SI</button>
          </div>
        </div>
      </div>
    </div>  


                  <div id="div-2" class="body">
                    <form class="form-horizontal">
                      <div class="form-group" style="margin-bottom: 4px;">
                        <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
                        <label class="col-lg-3">Prendas :</label>
                        <div class="col-lg-9">
                          <?php 
                            while($row1=@mysql_fetch_array($res1))
                              {
                                $totmonto = $totmonto + $row1["monto"];
                                echo $row1["prenda_descrip"]." ".$row1["prenda_marca"]." ".$row1["prenda_modelo"]."<br>";
                              }
                          ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3" style="font-size: 13px;">Monto del préstamo :</label>
                        <div class="col-lg-9">
                          <?php echo "S/ ".number_format($totmonto, 2, '.', ''); ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Fecha del Préstamo :</label>
                        <div class="col-lg-9"><?php echo dma_shora($fecprestamo); ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Fecha Vencimiento :</label>
                        <div class="col-lg-9"><?php echo dma_shora($fecvencim); ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Comercialización :</label>
                        <div class="col-lg-9"><?php //echo $facebook; ?></div>
                      </div>                      
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Interés :</label>
                        <div class="col-lg-9"><?php echo $categinteres."%"; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Período :</label>
                        <div class="col-lg-9"><?php echo $categperiodo; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Plazo :</label>
                        <div class="col-lg-9"><?php echo $categplazo; ?></div>
                      </div>                                               
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Categoría :</label>
                        <div class="col-lg-9"><?php echo $catedescrip; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Estado :</label>
                        <div class="col-lg-9">
                          <?php 
                            if ($prestamoestado == 0) {
                              echo "Cancelado";
                            }elseif ($prestamoestado == 1) {
                              echo "Activo";
                            }elseif ($prestamoestado == 2) {
                              echo "Expirado";
                            }elseif ($prestamoestado == 3) {
                              echo "Liquidado";
                            }
                          ?>
                        </div>
                      </div>

<!--                       <div class="form-group">
                        <div class="col-lg-8">
                          hanntronic
                        </div> 
                      </div> -->

                    </form>
                  </div>
                </div>
              </div>

<?php
  $rs=@mysql_query("set names utf8",$link);
  @mysql_fetch_array($rs);

  $sql="SELECT prestamo_estado FROM prestamos WHERE codPrestamo=".$_GET["id"];
  // echo $sql;

  $resul=@mysql_query($sql,$link);
  $row3=@mysql_fetch_array($resul);

  // echo $row3["prestamo_estado"];
?>
    <?php if ($row3["prestamo_estado"]==1) { ?>

              <div class="col-lg-4">
                <!-- <div class="box dark"> -->
                  
                  <header>
                    <div class="toolbar">
                      <nav style="padding: 15px;">

                        <?php 
                          // $sql="SELECT pago_cargo FROM pagos WHERE codprestamo = ".$_GET["id"]." ORDER BY codPago DESC LIMIT 1";
                          // echo $sql;
                          // $res=hannquery($sql,$link);
                          // $filita=@mysql_fetch_array($res);
                          // if ($filita[0]>0.00) { 
                          $sql = "SELECT count(*) FROM pagos WHERE codPrestamo = ".$_GET["id"]." and pago_estado=2" ;
                          echo $sql; 


                        ?>
                       
                          <a id='pagointeres' data-toggle='modal' data-content='Pagar interés' data-placement='bottom' class='btn btn-danger btn-round btn-grad' href='#pagarinteres' style='font-size: 12px;'>
                            <i class="fa fa-money"></i>
                            Pagar Interés
                          </a>  
                        <?php //} ?>
                        
                        <!-- <a href="javascript:;" class="btn btn-danger btn-round btn-grad" style="font-size: 12px;"> -->
                        <a id="pagarliquidar" data-toggle="modal" data-content="Liquidar" data-placement="bottom" class="btn btn-danger btn-round btn-grad" href="#liquidar" style="font-size: 12px;">  
                          <i class="fa fa-shopping-cart"></i>
                          Liquidar 
                        </a>
                      </nav>
                    </div>                  
                  </header>

                <!-- </div> -->
              </div>
    <?php } ?>          
    
            </div><!-- /.row -->

    <script type="text/javascript">
      ;(function ($, Metis) {
          var $button = $('.inner a.btn');
          Metis.metisButton = function () {
              $.each($button, function () {
                  $(this).popover({
                      placement: 'bottom',
                      // title: this.innerHTML,
                      // content: this.outerHTML,
                      content: this.data-content,
                      trigger: Metis.isTouchDevice ? 'touchstart' : 'hover'
                  });
              });
          };
          return Metis;
      })(jQuery, Metis || {});
    </script>
    <script>
      $(function() {
        Metis.metisButton();
      });
    </script>    

    <div id="pagarinteres" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Registrar Pago</h4>
          </div>
          <div class="modal-body">
            <div id="content_modal"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnPagarInteres" class="btn btn-primary btn-grad" data-dismiss="modal">Pagar</button>

          </div>
        </div>
      </div>
    </div>


    <div id="liquidar" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Registrar Pago Liquidar</h4>
          </div>
          <div class="modal-body">

            <div id="content_modal_liquidar"></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnLiquidar" class="btn btn-primary btn-grad" data-dismiss="modal">Pagar</button>

          </div>
        </div>
      </div>
    </div>

<?php
  
  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  // $sql="SELECT * FROM prestamos WHERE codCliente = ".$_GET["id"]; 

  $sql1 = "SELECT * FROM prestamos, detalle_prestamo, prendas 
           WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
           AND detalle_prestamo.idPrenda = prendas.idPrenda
           AND prestamos.codPrestamo =".$_GET["id"];

  $res2=@mysql_query($sql1,$link);

?>

<div id="content_modal_query"></div>

            <div class="row">
              <div class="col-lg-7">

                <div class="block">
                  <ul class="stats_box" style="width: 100%">

          <?php while($row1=@mysql_fetch_array($res2))
                     {$i++;
          ?>

<!--             <div class="row">
              <div class="col-lg-8" style="border: 1px solid ">
                <div class="box">
                   <div id="div-2" class="body">
                      <div class="form-group"> -->
                        <!-- <h4><?php //echo $row1[0]; ?></h4> -->
                        <?php //echo $row1[1]; ?>
                      <!-- </div>  -->


                    <li style="width: 90%; margin: 4px 0px;">
<!--                       <div class="sparkline" style="padding: 0px;">
                        <strong> <?php //echo $row1["codPrestamo"]; ?> </strong></div> -->
                      <div class="stat_text" style="width: 98%;">
                        <strong style="padding-bottom: 8px;"> 
                          <a href="#" onclick="cargare('show_prenda.php?id=<?php echo $row1["idPrenda"]; ?>')">
                            <?php echo $row1["prenda_descrip"]." ".$row1["prenda_marca"]." ".$row1["prenda_modelo"]."<br>"; ?>    
                          </a>  
                        </strong>
                        <?php //echo dma_shora($row1["fec_prestamo"]);?>
                        <span class="percent down"> S/ <?php echo $row1["monto"];?> </span>
                      </div>
                    </li>


                    <!-- <li style="width: 90%;"> -->
                      <!-- <div class="sparkline">hann</div> -->
<!--                       <div class="stat_text" style="width: 75%;">
                        <strong style="padding-bottom: 8px;"> <?php //echo $row1["prenda_descrip"];?></strong>
                        <?php //echo dma_shora($row1["fec_prestamo"]);?>
                        <span class="percent down"> S/ <?php // echo $row1["subtotal"];?> </span>
                      </div>
                    </li> -->



                      <?php   
                        //echo $row1[0]."<br>".$row1[1]." | ".$row1[2]." | ".$row1[3]." | ".$row1[4]." | ".$row1[5]."<br>";             
                      
                      ?>
<!--                    </div> 
                </div>
              </div>
            </div>  --> 
          
          <?php } ?>

                  </ul>
                </div>
              </div>

<?php
  
  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  // $sql="SELECT * FROM prestamos WHERE codCliente = ".$_GET["id"]; 

  $sql1 = "SELECT * FROM pagos WHERE pago_estado <> 0 and codPrestamo =".$_GET["id"]." ORDER BY 1";

  $res2=@mysql_query($sql1,$link);

?>
              <div class="col-lg-7">
                <div class="box" style="overflow-x: auto;">
                  <h5>HISTORIAL</h5>

                  <table class="table table-striped responsive-table" style="font-size: 12px;">
                      <thead>
                        <tr>
                          <th width="2%">#</th>
                          <th width="8%">Fecha</th>
                          <th width="50%">Operación</th>
                          <th width="10%">Cargo</th>
                          <th width="10%">Abono</th>
                          <th width="10%">Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            while($row1=@mysql_fetch_array($res2))
                              {$j++;
                        ?>      
                          <tr>
                            <td><?php echo $j; ?> </td>
                            <td><?php echo dma_shora($row1["fec_pago"]); ?></td>
                            <td><?php echo $row1["pago_descrip"]; ?> </td>
                            <td align="right"><?php echo $row1["pago_cargo"]; ?></td>
                            <td align="right"><?php echo $row1["pago_abono"]; ?></td>
                            <td align="right"><?php echo $row1["pago_saldo"]; ?></td>
                          </tr>                        
                        <?php  }  ?>
                      </tbody>
                    </table>
                </div>

            <?php if ($row3["prestamo_estado"]==3) { ?>
              <h4 style="text-align: right;">Liquidado</h4>
            <?php }elseif ($row3["prestamo_estado"]==0) { ?>
              <h4 style="text-align: right;">Cancelado</h4>
            <?php }elseif ($row3["prestamo_estado"]==2) { ?>
              <h4 style="text-align: right;">Expirado</h4>
            <?php } ?>  
              </div>            


            </div>

            <div class="row">
            </div>
                  


            <div style="height: 300px;"></div>  


          </div><!-- /.inner -->
        </div><!-- /.outer -->

