<?php 
	// echo "id prestamo es ".$_GET["id"];

  session_start();
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

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);

  $sql1 = "SELECT * FROM prestamos, detalle_prestamo, prendas 
           WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
           AND detalle_prestamo.idPrenda = prendas.idPrenda
           AND prestamos.codPrestamo =".$_GET["id"];

  $res1=@mysql_query($sql1,$link);  


  //include 'head.php';
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

<!--           <div class="form-group" style="margin-bottom: 1px;">
            <label class="control-label col-lg-4">Normal Input Field</label>
              <div class="col-lg-8">
                hanntronico
              </div>
          </div>
          <div class="form-group" style="margin-bottom: 1px;">
            <label class="control-label col-lg-4">Normal Input Field</label>
              <div class="col-lg-8">
                hanntronico
              </div>
          </div> -->

<!--           <table border="0">
              <tr style="padding: 25px;">
                <td><label class="control-label">Contrato No.</label></td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php //echo $codPrestamo; ?></td>
              </tr>
              <tr style="padding: 25px;">
                <td><label class="control-label">Monto del préstamo</label></td>
                <td>&nbsp;:&nbsp;</td>                
                <td><?php //echo "S/ ".number_format($totmonto, 2, '.', ''); ?></td>
              </tr>
          </table> -->

                      <div class="form-group" style="margin-bottom: 1px;">
                        <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
                        <label class="col-lg-4 am">Contrato No. :</label>
                        <div class="col-lg-8 bm">
                          <?php echo $codPrestamo; ?>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="control-label col-lg-4 am">Monto del préstamo :</label>
                        <div class="col-lg-8 bm"><?php echo "S/ ".number_format($totmonto, 2, '.', ''); ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="control-label col-lg-4 am">Cliente :</label>
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
                        <label class="col-lg-4 am">Interés :</label>
                        <div class="col-lg-8 bm"><?php echo number_format($categinteres, 2, '.', '')."%"; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Periodo :</label>
                        <div class="col-lg-8 bm"><?php echo $categperiodo; ?></div>
                      </div>                                               
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Plazo :</label>
                        <div class="col-lg-8 bm"><?php echo $categplazo; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 1px;">
                        <label class="col-lg-4 am">Prendas :</label>
                        <div class="col-lg-8 bm"> <?php echo $list_prendas; ?> </div>
                      </div>

        </form>
      </div>  
		</div>

<?php $res2=hannquery("SELECT * FROM pagos WHERE codPrestamo =".$_GET["id"],$link);?>

<?php $res3=hannquery("SELECT sum(pago_abono) as total_abono FROM pagos WHERE codPrestamo =".$_GET["id"],$link);
      $fila=@mysql_fetch_object($res3);
      $totalabono = $fila->total_abono;

      $res3=hannquery("SELECT pago_saldo FROM pagos WHERE codPrestamo = ".$_GET["id"]." ORDER BY codPago DESC LIMIT 1", $link);
      $fila=@mysql_fetch_object($res3);
      $pagosaldo = $fila->pago_saldo;

?>                

                <div class="box" style="overflow-x: auto; border: none; ">
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
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td colspan="2"><strong>Total pagado</strong></td>
                          <td align="right"><?php echo $totalabono; ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td colspan="2"><strong>Total Restante</strong></td>
                          <td>&nbsp;</td>
                          <td align="right"><?php echo $pagosaldo; ?></td>
                        </tr>
                      </tbody>
                    </table>
                </div>

            <?php if ($prestamoestado==3) { ?>
              <h4 style="text-align: right;">Liquidado</h4>
            <?php }elseif ($prestamoestado==0) { ?>
              <h4 style="text-align: right;">Cancelado</h4>
            <?php }elseif ($prestamoestado==2) { ?>
              <h4 style="text-align: right;">Expirado</h4>
            <?php } ?>  


	</div>
</div>