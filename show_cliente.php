<?php

  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $sql="SELECT * FROM clientes WHERE codCliente='".$_GET["id"]."'"; 
  $res=@mysql_query($sql,$link);
  $fila =mysql_fetch_object($res);

  $id = $fila->codCliente;
  $nomClie = $fila->nomClie;
  $apepatClie = $fila->apepatClie;
  $apematClie = $fila->apematClie;
  $nroDNI = $fila->nroDNI;
  $fecNac = $fila->fecNac;
  $nroSec  = $fila->nroSec ;
  $telefono = $fila->telefono;
  $direccion = $fila->direccion;
  $facebook = $fila->facebook;
  $email = $fila->email;
  $nomInbox = $fila->nomInbox;
  $estClie = $fila->estClie;

?>        
<style type="text/css" media="screen">
  .am {
    /*width: 35%;*/
    border: 1px solid #ff0000;
  } 

  .bm {
    /*width: 25%;*/
    border: 1px solid #00ff00;
  }

  .am, .bm {
    display: inline-block;
    vertical-align: top;
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
                      <a href="javascript:;" onclick="cargare('clientes.php'); return false;">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </div>
                    <h5><?php echo $nomClie." ".$apepatClie." ".$apematClie;?></h5>


<!--                     <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a>
                      </nav>
                    </div> -->

                  </header>

                  <div id="div-2" class="body">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-lg-2">Nro DNI :</label>
                        <div class="col-lg-10"><?php echo $nroDNI; ?></div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Teléfono :</label>
                        <div class="col-lg-10"><?php echo $telefono; ?></div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Direccion :</label>
                        <div class="col-lg-10"><?php echo $direccion; ?></div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Fecha Nac. :</label>
                        <div class="col-lg-10"><?php echo dma_shora($fecNac); ?></div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Facebook :</label>
                        <div class="col-lg-10">
                          <a href="<?php echo $facebook;?>" target="_blank" title="enlace a cuenta de facebook">
                            <?php echo $facebook; ?>
                          </a>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="col-lg-2">Email :</label>
                        <div class="col-lg-10"><?php echo $email; ?></div>
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


              <div class="col-lg-4">
                <!-- <div class="box dark"> -->
                  
                  <header>
                    <div class="toolbar">
                      <nav style="padding: 15px;">
                        <a href="javascript:;" class="btn btn-danger btn-round btn-grad" onclick="cargare('new_prestamo.php?id=<?php echo $id ?>&sw=1'); return false;" style="font-size: 12px;" >
                          <i class="fa fa-money"></i>
                          Nuevo Préstamo
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-round btn-grad" style="font-size: 12px;">
                          <i class="fa fa-shopping-cart"></i>
                          Nueva Compra
                        </a>
                      </nav>
                    </div>                  
                  </header>

                <!-- </div> -->
              </div>
            </div><!-- /.row -->



<?php
  
  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($res);
  // $sql="SELECT * FROM prestamos WHERE codCliente = ".$_GET["id"]; 
  // $sql="SELECT prendas.prenda_descrip, 
  //              prestamos.fec_prestamo, 
  //              detalle_prestamo.monto, 
  //              detalle_prestamo.interes, 
  //              detalle_prestamo.monto+detalle_prestamo.interes as subtotal
  //       FROM prestamos, detalle_prestamo, prendas
  //       WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
  //       and detalle_prestamo.idPrenda = prendas.idPrenda
  //       and codCliente = ".$_GET["id"]; 
  // $sql = "SELECT * FROM prestamos WHERE codCliente = ".$_GET["id"];

  // $sql="SELECT count(prestamos.codPrestamo) as conteo FROM prestamos, detalle_prestamo
  //       WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
  //       AND prestamos.codCliente = ".$_GET["id"];

  $sql="SELECT count(codPrestamo) as conteo 
        FROM prestamos 
        WHERE codPrestamo 
        IN (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=".$_GET["id"]." GROUP BY 1)";
  $resu=@mysql_query($sql,$link);
  $numfilas = @mysql_fetch_assoc($resu);

  $sql="SELECT count(codPrestamo) as conteo 
        FROM prestamos 
        WHERE codPrestamo 
        IN (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=".$_GET["id"]." AND prestamo_estado = 2 GROUP BY 1)";
  $resu=@mysql_query($sql,$link);
  $prestamos_expirados = @mysql_fetch_assoc($resu);

  $sql="SELECT count(codPrestamo) as conteo 
        FROM prestamos 
        WHERE codPrestamo 
        IN (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=".$_GET["id"]." AND prestamo_estado = 1 GROUP BY 1)";
  $resu=@mysql_query($sql,$link);
  $prestamos_activos = @mysql_fetch_assoc($resu);

  $sql="SELECT count(codPrestamo) as conteo 
        FROM prestamos 
        WHERE codPrestamo 
        IN (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=".$_GET["id"]." AND prestamo_estado = 3 GROUP BY 1)";
  $resu=@mysql_query($sql,$link);
  $prestamos_liquidados = @mysql_fetch_assoc($resu);  


$prestamos_total= $prestamos_liquidados['conteo'] + $prestamos_expirados['conteo'];

if ($prestamos_total != 0) {
  $porcentaje_liquidacion = ($prestamos_liquidados['conteo']/$prestamos_total)*100;
}


  // echo $numfilas;

  $sql = "SELECT prestamos.*, sum(monto) AS total FROM prestamos, detalle_prestamo
          WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
          AND prestamos.codCliente ='".$_GET["id"]."' GROUP BY 1";
  $res=@mysql_query($sql,$link);
  
  
  // $fila =mysql_fetch_object($res);
  // $row1=@mysql_fetch_array($res)
?>

<!-- codPrestamo codCliente codCategoria fec_prestamo cod_usuario prestamo_estado -->


    <div class="row">
      <div class="col-lg-7">
        <h5> PRESTAMOS </h5>
        <div class="box">
          <div class="text-center">
                <div class="quick-btn">
                  <!-- <i class="fa fa-bolt fa-2x"></i> -->
                  <h4><?php echo $prestamos_activos['conteo']; ?></h4>
                  <span>ACTIVOS</span> 
                  <span class="label label-info">&nbsp;</span> 
                </div> 
                <div class="quick-btn" href="#">
                  <!-- <i class="fa fa-check fa-2x"></i> -->
                  <h4><?php echo $prestamos_expirados['conteo']; ?></h4>
                  <span>EXPIRADOS</span> 
                  <span class="label label-danger">&nbsp;</span> 
                </div> 
                <div class="quick-btn" href="#">
                  <!-- <i class="fa fa-building-o fa-2x"></i> -->
                  <h4><?php echo $prestamos_liquidados['conteo']; ?></h4>
                  <span>LIQUIDADOS</span> 
                  <span class="label label-warning">&nbsp;</span>
                </div> 
                <div class="quick-btn" href="#">
                  <!-- <i class="fa fa-envelope fa-2x"></i> -->
                  <h4><?php echo $porcentaje_liquidacion; ?>%</h4>
                  <span>% DE LIQUID.</span> 
                  <span class="label label-success">&nbsp;</span> 
                </div> 
                
 <!--                <a class="quick-btn" href="#">
                  <i class="fa fa-signal fa-2x"></i>
                  <span>warning</span> 
                  <span class="label label-warning">+25</span> 
                </a> 
                <a class="quick-btn" href="#">
                  <i class="fa fa-external-link fa-2x"></i>
                  <span>π</span> 
                  <span class="label btn-metis-2">3.14159265</span> 
                </a>  -->
<!--                 <a class="quick-btn" href="#">
                  <i class="fa fa-lemon-o fa-2x"></i>
                  <span>é</span> 
                  <span class="label btn-metis-4">2.71828</span> 
                </a> 
                <a class="quick-btn" href="#">
                  <i class="fa fa-glass fa-2x"></i>
                  <span>φ</span> 
                  <span class="label btn-metis-3">1.618</span> 
                </a>  -->
          </div>   
          
        </div>
      </div>          
    </div>        

<!--     <div class="row">
      <div class="col-lg-7">
        <div class="box" style="padding: 0px; margin: 0px;">
          <div class="block">

            <ul class="stats_box" style="width: 100%">
              <li style="width: 100%; margin: 10px 0px; padding: 0px;">
                <a href="#" style="text-decoration: none; color: #444;">
                <div class="sparkline bar_week" style="border: 0px solid #ff0000; text-align: center; margin: 0px auto; padding: 10px 7px; width: 8%;">23628</div>
                
                <div class="stat_text" style="border: 0px solid #00ff00; width: 60%; line-height: 22px; padding: 14px 12px;">
                  <strong style="padding-bottom: 2px;">TV SMART LG</strong>
                  07/06/2018 - 06/07/2018
                </div>
                <div style="border: 0px solid #0000ff; width: 100%; position: absolute; padding: 5px 8px; color: #C52F61; font-size: 20px; text-align: right; line-height: 4px;">
                  <h4><strong>S/ 1500.00</strong></h4>
                  <strong style="color: #555555; font-size: 15px">Activo</strong>
                </div>                
                </a>
              </li>

              <li style="width: 100%; margin: 0px;">
                <div class="sparkline bar_week">gg</div>
                <div class="stat_text">
                  <strong style="padding-bottom: 8px; margin-right: 150px;">2.345</strong> Weekly Visit
                  <span class="percent down">S/ 1500.00</span> 
                </div>
              </li>              
            </ul>

          </div>        
        </div>
      </div>
    </div> -->

<?php if ($numfilas['conteo']!=0) {  ?>



           <div class="row">
              <div class="col-lg-7">
                <div class="box" style="padding: 0px; margin: 0px;">
                  <div class="block">
                  <ul class="stats_box" style="width: 100%;">

                  <?php while($row1=@mysql_fetch_array($res))
                             {$i++;
                  ?>
<?php
  $resulty=hannquery("SELECT detalle_prestamo.codPrestamo, prendas.idPrenda, prendas.prenda_descrip, prendas.prenda_marca, 
                      prendas.prenda_modelo
                      FROM detalle_prestamo, prendas 
                      WHERE detalle_prestamo.idPrenda = prendas.idPrenda 
                      AND codPrestamo = ".$row1["codPrestamo"]." ORDER BY prendas.idPrenda ASC LIMIT 1",$link);
  // echo $row1["codPrestamo"];
  $fila_c=@mysql_fetch_object($resulty);
  $prenda_desc = $fila_c->prenda_descrip;
  $prenda_marca = $fila_c->prenda_marca;
  $prenda_modelo = $fila_c->prenda_modelo;


  if ($row1["prestamo_estado"] ==1) {
    $msj_estado="Activo";
    $color_estado="btn-success";
  }elseif ($row1["prestamo_estado"] ==2) {
    $msj_estado="Expirado";
    $color_estado="btn-danger";
  }elseif ($row1["prestamo_estado"] ==3) {
    $msj_estado="Liquidado";
    $color_estado="btn-default";
  }elseif ($row1["prestamo_estado"] ==0) {
    $msj_estado="Cancelado";
    $color_estado="btn-metis-5";
  }  
?>

                    <li style="width: 100%; margin: 0px 0px 10px 0px; padding: 0px;">
                      <a href="javascript:;" onclick="cargare('show_prestamo.php?id=<?php echo $row1["codPrestamo"] ?>'); return false;" style="text-decoration: none; color: #444;">
                      <div class="sparkline bar_week <?php echo $color_estado; ?>" style="text-align: center; margin: 0px auto; padding: 12px 16px; width: 10%; font-size: 15px;"><?php echo $row1["codPrestamo"]; ?></div>
                      
                      <div class="stat_text" style="width: 60%; line-height: 22px; padding: 14px 12px;">
                        <strong style="padding-bottom: 2px;"><?php echo $prenda_desc." ".$prenda_marca." ".$prenda_modelo; ?></strong>
                        <?php echo dma_shora($row1["fec_prestamo"])." - ".dma_shora($row1["fec_vencim"]); ?>
                      </div>
                      <div style="width: 100%; position: absolute; padding: 5px 8px; color: #C52F61; font-size: 20px; text-align: right; line-height: 4px;">
                        <h4><strong>S/ <?php echo $row1["total"];?></strong></h4>
                        <strong style="color: #555555; font-size: 15px">
                          <?php echo $msj_estado;?>
                        </strong>
                      </div>                
                      </a>
                    </li>                    


                    <!-- <li style="width: 90%;"> -->
                      <!-- <div class="sparkline">hann</div> -->
<!--                       <div class="stat_text" style="width: 75%;">
                        <strong style="padding-bottom: 8px;"> <?php //echo $row1["prenda_descrip"];?></strong>
                        <?php //echo dma_shora($row1["fec_prestamo"]);?>
                        <span class="percent down"> S/ <?php // echo $row1["subtotal"];?> </span>
                      </div>
                    </li> -->



<!--                    </div> 
                </div>
              </div>
            </div>  --> 
          
          <?php } ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>

<?php } else {?>
  <div class="row">
    <div class="col-lg-8">
      <div class="box" style="padding: 10px;">
        No hay Préstamos registrados
      </div>
    </div>
  </div>

<?php } ?>

            <div style="height: 300px;"></div>  


          </div><!-- /.inner -->
        </div><!-- /.outer -->

    <!-- Metis core scripts -->
    <!-- <script src="assets/js/core.min.js"></script> -->

    <!-- Metis demo scripts -->
    <!-- <script src="assets/js/app.js"></script> -->

