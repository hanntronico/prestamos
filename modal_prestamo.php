<?php 
	include 'funciones.php';
  // $sql="SELECT pago_cargo FROM pagos WHERE codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";

  // $sql="SELECT pago_cargo FROM pagos 
  //       WHERE pago_estado=1 AND codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";

  $sql = "SELECT count(*) FROM pagos WHERE codPrestamo = ".$_POST["idPrestamo"]." and pago_estado=2";
  $res=hannquery2($sql);
  $row=@mysql_fetch_array($res);

  $extemporaneo = $row[0];

  // if ($extemporaneo>0) {
  //   $sql2="SELECT pago_cargo FROM pagos 
  //          WHERE pago_estado=1 AND codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";
  //   echo $sql2; 

  // }else{
  //   $sql2="SELECT pago_cargo FROM pagos 
  //          WHERE pago_estado=1 AND codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";
  //   // echo "esta a tiempo";
  // }

    $sql2="SELECT pago_cargo FROM pagos 
           WHERE pago_estado=1 AND codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";

  $link2 = Conectarse();
  $resu=hannquery($sql2, $link2);
  $row2=@mysql_fetch_array($resu);

?>
  <div class="row">
    <div class="col-lg-10">
      <div class="form-group">
        <label for="text2" class="control-label col-lg-2" style="padding-left: 0px">Interés :</label>
        <div class="col-lg-8" style="padding-left: 0px">
        	<input type="text" name="montointeres" id="montointeres" width="100%" disabled="disabled" value="<?php echo $row2[0]; ?>">
        </div>	
      </div>
    </div>
  </div> 