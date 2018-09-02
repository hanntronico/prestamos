<?php
  include "conectar.php";
  $link=Conectarse();
  include "funciones.php";
?>

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8" async></script>

        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row">
              <div class="col-lg-12">
                <h2>
                  CONTRATOS
                  <!-- <small>id : <?php //echo $_GET["id"]; ?></small>  -->
                  <input type="hidden" name="codPrest" id="codPrest" value="<?php echo $_GET["id"];?>">
                </h2>
                <div class="btn-group" data-toggle="buttons" id="dark-toggle">
                  <a href="javascript:;" class="btn btn-default" onclick="cargare('show_prestamo.php?id=<?php echo $_GET["id"]; ?>'); return false;">Volver</a>
                 
                  <iframe src="print_boleta_pago.php?id=<?php echo $codPrestamo ?>" style="display:none;" name="frame"></iframe>

                  <input type="button" class="btn btn-success" onclick="frames['frame'].print()" value="PRINT">
                 <?php 
                  $consult = ' WHERE estado_contrato=1 ORDER BY 2';
                  llenarcombo('contratos','idContrato, file_contrato', $consult, $codnivel, '','codContrato id=opcContrato'); 
                 ?>

                </div>
                <ul class="pricing-table light" contenteditable>
                  <li class="col-lg-2" style="padding: 0px">
                    <div style="background-color: #fff;">
                      <div style="height: 5px;"></div>
                    </div>                    
                  
                  </li>

                  <li class="active col-lg-8" style="padding: 0px; color: #000;">
                    <div style="background-color: #fff; text-align: left;">

                      <div class="col-lg-12" style="background-color: #fff; border: none; padding: 25px 35px;">
                        <div class="box" style="border: 0px solid #fff;">

                          <div id="div-2" style="padding: 0px;">

                            <?php
                              //$filecontrato = "hola3.txt";
                              // if (file_exists("contratos/".$filecontrato)) {
                              //     $gestor=fopen("contratos/".$filecontrato,"r"); 
                              //     $i=0; 
                              //     while(!feof($gestor)){ 
                              //         $linea[$i]=rtrim(fgets($gestor)); 
                              //         echo $linea[$i]; 
                              //         $i++; 
                              //     } 
                              //     fclose($gestor);
                              // } else {
                              //     echo "El fichero no existe";
                              // }


                              // $cadena =file_get_contents("contratos/".$filecontrato);
                              // $res = explode("{{NOMBRE}}", $cadena);
                              // $cadena = $res[0]." ".$nomclie." ".$apepatclie." ".$apematclie." ".$res[1];
                              
                              // $res = explode("{{DNI}}", $cadena);
                              // $cadena = $res[0]." ".$nrodni." ".$res[1];
                              // echo $cadena;

                            ?>  

                          </div>
                        
                        </div>



<?php 
  // $res3=hannquery("SELECT pago_descrip, fec_pago, pago_abono FROM pagos WHERE codPrestamo = ".$_GET["id"]." ORDER BY codPago DESC LIMIT 1", $link);
  // $fila=@mysql_fetch_object($res3);
  // $pagodescrip = $fila->pago_descrip;
  // $fecpago = $fila->fec_pago;
  // $pagoabono = $fila->pago_abono;
?>                



                      </div>

                    </div>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
            </div>
             
            <div style="height: 150px;"></div>

          </div>
        </div>









<!--   <div class="outer">
    <div class="inner bg-light lter">
      <style>
        ul.wysihtml5-toolbar > li {
          position: relative;
        }
      </style>
			<div class="row">
				<div class="col-lg-10">
					<div class="box">
						
	  				<header>
              <div class="icons">
                <a href="javascript:;" onclick="cargare('show_prestamo.php?id=<?php //echo $codPrestamo;?>'); return false;">
                  <i class="fa fa-chevron-left"></i>
                </a>
              </div>
              <h5><?php //echo "hann "; ?></h5>
	   				</header>

            <div class="body">
              <form>
                <textarea id="editor2" class="ckeditor"></textarea>
                <div class="form-actions no-margin-bottom" id="cleditorForm">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
              </form>
              <script>
                CKEDITOR.replace( 'editor2', {
                    customConfig: 'assets/js/config.js'
                });
              </script>
            </div>

					</div>
				</div>
			</div>

			<div style="height: 300px;"></div>

  	</div>
  </div> -->