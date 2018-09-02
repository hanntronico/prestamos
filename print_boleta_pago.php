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
		<div class="box">
			<div id="div-2">
        <form class="form-horizontal">

          <span style="font-size: 22px; color: grey;"><strong>PRÉSTAMOS</strong></span><br>
            <?php 
              date_default_timezone_set('America/Lima');
              echo fechas_espanol_2(1,date("N")).", ".date("d")." de ".fechas_espanol_2(2,date('n'))." de ".date("Y");
            ?>
          <hr>

                          <?php 
                            while($row1=@mysql_fetch_array($res1))
                              {
                                $totmonto = $totmonto + $row1["monto"];
                                $list_prendas = $list_prendas.$row1["prenda_descrip"]."<br>";
                              }
                          ?>


                      <div class="form-group" style="margin-bottom: 1px;">
                        <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
                        <label class="col-lg-4 am">Contrato No. :</label>
                        <div class="col-lg-8 bm">
                          <?php echo $codPrestamo; ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Cliente :</label>
                        <div class="col-lg-8 bm">
                          <?php echo $nomClie." ".$apepatClie." ".$apematClie; ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Fecha del préstamo :</label>
                        <div class="col-lg-8 bm"><?php echo dma_shora($fecprestamo); ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Fecha de vencimiento :</label>
                        <div class="col-lg-8 bm"><?php echo ($fecvencim); ?></div>
                      </div>                      
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Comercializacion :</label>
                        <div class="col-lg-8 bm"><?php echo " "; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Prendas :</label>
                        <div class="col-lg-8 bm"> <?php echo $list_prendas; ?> </div>
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