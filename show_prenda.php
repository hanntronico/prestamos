<?php 
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($rs);
  $sql="SELECT prendas.idprenda as codprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie, prestamos.codprestamo, prenda_img
				FROM prendas, detalle_prestamo, prestamos, clientes
				WHERE prendas.idprenda = detalle_prestamo.idprenda 
				AND detalle_prestamo.codprestamo = prestamos.codprestamo 
				AND prestamos.codcliente = clientes.codcliente
				AND prendas.idprenda =".$_GET["id"];
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

?>        
<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>

        <div class="outer">
          <div class="inner bg-light lter">

            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="row">

              <div class="col-lg-8">
                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <a href="javascript:;" onclick="cargare('show_prestamo.php?id=<?php echo $codprestamo ?>'); return false;">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </div>
                    <h5><?php echo $prendadescrip; ?></h5>


<!--                     <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-info btn-circle btn-sm">
                          <i class="fa fa-minus"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-default btn-circle btn-sm">
                          <i class="fa fa-times"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-primary btn-circle btn-sm">
                          <i class="fa fa-tag"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-metis-3 btn-circle btn-sm">
                          <i class="fa fa-print"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-metis-5 btn-circle btn-sm">
                          <i class="fa fa-file-o"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-metis-6 btn-circle btn-sm">
                          <i class="fa fa-file-text-o"></i>
                        </a>                        
                      </nav>
                    </div> -->

                  </header>

                  <div id="div-2" class="body">
                    <form class="form-horizontal">
                      <div class="form-group" style="margin-bottom: 4px;">
                        <input type="hidden" name="codPrestamo" id="codPrestamo" value="<?php echo $codPrestamo; ?>">
                        <label class="col-lg-3">Stock :</label>
                        <div class="col-lg-9">---</div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Dueño original :</label>
                        <div class="col-lg-9"><?php echo $cliente; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Descripción :</label>
                        <div class="col-lg-9"><?php echo $prendadescrip; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Marca :</label>
                        <div class="col-lg-9"><?php echo $prendamarca; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Modelo :</label>
                        <div class="col-lg-9"><?php echo $prendamodelo; ?></div>
                      </div>                      
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Serie :</label>
                        <div class="col-lg-9"><?php echo $prendaserie; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Observación :</label>
                        <div class="col-lg-9"><?php echo $prendaobserv; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Avalúo :</label>
                        <div class="col-lg-9"><?php echo $prendaavaluo; ?></div>
                      </div>                                               
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Préstamo :</label>
                        <div class="col-lg-9"><?php echo $prendaprest; ?></div>
                      </div>
                      <div class="form-group" style="margin-bottom: 4px;">
                        <label class="col-lg-3">Estado :</label>
                        <div class="col-lg-9"><?php echo $prendaestado; ?></div>
                      </div>

                   </form>
                  </div>
                </div>
              </div>
    
            </div><!-- /.row -->

<!--     <div class="row">
    	<div class="col-lg-7">
				<div class="form-group">
          <label class="control-label col-lg-3">Subir Imagen</label>
          <div class="col-lg-9">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
	          	<div>
		            <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona imagen</span> <span class="fileinput-exists">Cambiar</span> 
		            <input type="file" name="...">
		          	</span> 
		            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Borrar</a> 
	            </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->  	

  <div class="row">
    <div class="col-lg-7">
    	
    	<form id="form" action="grabar_imagen.php" method="post" enctype="multipart/form-data">	
      
      <div class="form-group">
        <label class="control-label col-lg-3">Subir Imagen</label>
        <div class="col-lg-9">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
              <img src="assets/img/img_upload.jpg" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
	          <div>
	            <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona imagen</span> <span class="fileinput-exists">Cambiar</span> 
	            <input type="file" name="imgprenda" id="imgprenda">
	            </span> 
	            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Borrar</a> 
	          </div>
        	</div>
        </div>
      </div>

<!--       <a id="btnGuardarImagen" data-original-title="Pagar interés" data-placement="bottom" class="btn btn-danger btn-round btn-grad" style="font-size: 12px;">
        <i class="fa fa-money"></i>
     		Guardar Imagen
      </a>  -->
      		<input type="hidden" name="idprenda" id="idprenda" value="<?php echo $idPrenda; ?>">
      		<input type="submit" class="btn btn-danger btn-round btn-grad" name="guardar" value="GUARDAR">
      	</form>
      <br>	
      <div id="preview"><img src="prendas/<?php echo $prendaimagen; ?> " width="25%"/></div><br>

    </div>
  </div>  

<!--             <div class="row">
              <div class="col-lg-7">

                <div class="block">
                  <ul class="stats_box" style="width: 100%">
                    <li style="width: 90%; margin: 4px 0px;">
                      <div class="stat_text" style="width: 98%;">
                        <strong style="padding-bottom: 8px;"> 
                          <a href="#">
                            <?php //echo "otra prenda"."<br>"; ?>    
                          </a>  
                        </strong>
                        <span class="percent down"> S/ <?php //echo "120.00";?> </span>
                      </div>
                    </li>
          
                  </ul>
                </div>
              </div>
            </div>
 -->
               


            <div style="height: 300px;"></div>  


          </div><!-- /.inner -->
        </div><!-- /.outer -->

