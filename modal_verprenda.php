<?php
	// echo "modal de ver prenda ".$_POST["idPrenda"];

  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $sql="SELECT prendas.idprenda as codprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie, prestamos.codprestamo, prenda_img, prestamos.prestamo_estado
				FROM prendas, detalle_prestamo, prestamos, clientes
				WHERE prendas.idprenda = detalle_prestamo.idprenda 
				AND detalle_prestamo.codprestamo = prestamos.codprestamo 
				AND prestamos.codcliente = clientes.codcliente
				AND prendas.idprenda =".$_POST["idPrenda"];
  // echo $sql;
  $res=@mysql_query($sql,$link);
  $fila =mysql_fetch_object($res);

	$idPrenda = $fila->codprenda;
	$prendadescrip = $fila->prenda_descrip;
	$prendamarca = $fila->prenda_marca;
	$prendamodelo = $fila->prenda_modelo;
	$prendaserie = $fila->prenda_serie;
	$prendaobserv = $fila->prenda_observ;
	$prendaavaluo = $fila->prenda_avaluo;
	$prendaprest = $fila->prenda_prest;
	$prendaestado = $fila->prenda_estado;

	$nomClie = $fila->nomClie;
	$apepatClie = $fila->apepatClie;
	$apematClie = $fila->apematClie;

	$cliente = $nomClie." ".$apepatClie." ".$apematClie;

	$codprestamo = $fila->codprestamo;
	$prendaimagen = $fila->prenda_img;
  $prestamoEstado = $fila->prestamo_estado;


?>

<div class="row">
	<!-- <div class="col-lg-10" style="border: 1px solid #ff0000;"> -->
	<div class="col-lg-12">
    <div id="div-2" class="body">
      <form class="form-horizontal">
        <div class="form-group" style="margin-bottom: 4px;">
          <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
          <label class="col-lg-4">Stock :</label>
          <div class="col-lg-8">---</div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Dueño original :</label>
          <div class="col-lg-8"><?php echo $cliente; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Descripción :</label>
          <div class="col-lg-8"><?php echo $prendadescrip; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Marca :</label>
          <div class="col-lg-8"><?php echo $prendamarca; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Modelo :</label>
          <div class="col-lg-8"><?php echo $prendamodelo; ?></div>
        </div>                      
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Serie :</label>
          <div class="col-lg-8"><?php echo $prendaserie; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Observación :</label>
          <div class="col-lg-8"><?php echo $prendaobserv; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Avalúo :</label>
          <div class="col-lg-8"><?php echo $prendaavaluo; ?></div>
        </div>                                               
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Préstamo :</label>
          <div class="col-lg-8"><?php echo $prendaprest; ?></div>
        </div>
        <div class="form-group" style="margin-bottom: 4px;">
          <label class="col-lg-4">Estado :</label>
          <div class="col-lg-8">
            <?php
              if ($prestamoEstado==1) {
                echo "Empeñado";
              }elseif ($prestamoEstado==2) {
                echo "En venta";
              } 
            ?></div>
        </div>
        <img src="prendas/<?php echo $prendaimagen; ?>" width="25%" >
     </form>
    </div>
	</div>
</div>


