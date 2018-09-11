<?php 
	include 'funciones.php';
  $sql="SELECT pago_cargo FROM pagos WHERE codprestamo = ".$_POST["idPrestamo"]." ORDER BY codPago DESC LIMIT 1";
  $res=hannquery2($sql);
  $row=@mysql_fetch_array($res);
?>
  <div class="row">
    <div class="col-lg-10">
      <div class="form-group">
        <label for="text2" class="control-label col-lg-2" style="padding-left: 0px">Interés :</label>
        <div class="col-lg-8" style="padding-left: 0px">
        	<input type="text" name="montointeres" id="montointeres" width="100%" disabled="disabled" value="<?php echo $row[0]; ?>">
        </div>	
      </div>
    </div>
  </div> 