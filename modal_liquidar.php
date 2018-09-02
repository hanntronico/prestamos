<?php 
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);

  $sql="SELECT pago_saldo FROM pagos WHERE codPrestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";
  // echo $sql; 
  $res=@mysql_query($sql,$link);
  $row1=@mysql_fetch_array($res);
?>

  <div class="row">
    <div class="col-lg-10">
        <div class="form-group">
          <label class="control-label col-lg-4">Cantidad a pagar :</label>
          <div class="col-lg-6">
            <input type="number" class="form-control" name="montoliquidar" id="montoliquidar" disabled="disabled" value="<?php echo $row1[0]; ?>" width="10%">
          </div>
        </div>
    </div>
  </div>