<?php
  include 'inc_seguridad.php';
  include("conectar.php");
  $link=Conectarse();
  include 'funciones.php';
  
  include 'limpia_prenda.php';

  $pag = "NUEVO PRESTAMO";
  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

  if ( strpos($pag_org, '/') !== FALSE )
  $pag_org = array_pop(explode('/', $pag_org));
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);


  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($res);
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
  $email = $fila->email;
  $nomInbox = $fila->nomInbox;
  $estClie = $fila->estClie;

?>

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  function validaFormPrestamo(frm) {
    var campo = frm.codCateg.value;  
    if (campo=="") { 
      alert("Por Favor, selecciona categoría");
      frm.codCateg.focus(); 
      return false;
    }

    var campo = frm.totprendas.value;  
    if (campo=="") { 
      alert("Por Favor, al menos una prenda");
      frm.totprendas.focus();
      return false;
    }

    return true;
  }
</script>


        <div class="outer">
          <div class="inner bg-light lter">

            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="row">

            	<div class="col-lg-7">
            		<!-- <div class="box"> -->
                  <!-- <h4><?php echo $pag; ?></h4> -->
            		 	<span style="font-size: 15px; font-weight: bolder;"><?php echo $pag; ?></span>
            		<!-- </div> -->
            	</div>	

<!--             	<div class="col-lg-7">
            		<div class="box">
            			<header>
            				<div class="icons">
            					<a href="javascript:;" onclick="cargare('show_cliente.php?id=<?php //echo $id;?>'); return false;">
                      	<i class="fa fa-chevron-left"></i>
            					</a>
                    </div>
            			   <h5></h5>
            			</header>
            		</div>
            	</div> -->

              <div class="col-lg-8">
                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <a href="javascript:;" onclick="cargare('show_cliente.php?id=<?php echo $id;?>'); return false;">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </div>
                    <h4>&nbsp;&nbsp; <?php echo $nomClie." ".$apepatClie." ".$apematClie; ?></h4>


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
                    <!-- <form class="form-horizontal"> -->
										<form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormPrestamo(this)" id="popup-validation">  
										<input type="hidden" name="pag" value="<?=$pag_sext?>">
              			<input type="hidden" name="sw" value="<?=$_GET["sw"]?>">                  	
                    <input type="hidden" name="idCliente" value="<?=$id?>">

                      <div class="form-group">
                        <label class="col-lg-3">Categoría :</label>
                        <div class="col-lg-7"><?php llenarcombo('categorias','idCategoria, cate_descrip',' WHERE categ_estado=1 ORDER BY 2', $categoria, '','codCateg id=opcCateg'); ?></div>
                      </div>

                      <div id="descrip_categoria" class="form-group"></div>

                      <div class="form-group">
                        <label class="col-lg-3">Fecha de Préstamo :</label>
                        <div class="col-lg-5">
                          <?php date_default_timezone_set('America/Lima'); ?>
													<div class="input-group input-append date" id="dp3" data-date="<?=$fecPrest?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="validate[required] form-control" id="fecPrest" name="fecPrest"  value="<?php echo date("d/m/Y"); ?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                        	

                        </div>
                      </div>

                      <input type="hidden" name="idUsu" value="<?=$_SESSION["s_cod"]?>">

                      <div class="form-group">
                        <label class="col-lg-3">Tipo :</label>
                        <div class="col-lg-7">
                          <?php llenarcombo('tipos','idTipo, tipo_descrip',' ORDER BY 2', $tipo, '','codTipo id=opcTipo'); ?>
                        </div>
                      </div>

                      <input type="hidden" name="totprendas" id="totprendas">

                      <div id="ing_prenda" class="form-group"></div>

                      <!-- <a href="javascript:;" id="btnOtraPrenda" class="btn btn-danger btn-round btn-grad"> -->
                        <!-- <i class="fa fa-money"></i> -->
                        <!-- Agregar otra prenda -->
                      <!-- </a> -->

                      <div class="form-group">
                        <div class="col-lg-8">
                      		<input name="grabar" type="submit" value="GRABAR" class="btn btn-danger btn-round btn-grad">
                        </div>
                      </div>

<!--                       <div class="form-group">
                        <label class="col-lg-2">Direccion :</label>
                        <div class="col-lg-10"><?php //echo $direccion; ?></div>
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
                        <!-- <a href="javascript:;" class="btn btn-danger btn-round btn-grad">
                          <i class="fa fa-money"></i>
                          Grabar Préstamo
                        </a> -->

                        <!-- <input name="grabar" type="submit" value="GRABAR" class="btn btn-danger btn-round btn-grad"> -->

<!--                         <a href="javascript:;" class="btn btn-danger btn-round btn-grad">
                          <i class="fa fa-shopping-cart"></i>
                          Nuevo Compra
                        </a> -->
                      </nav>
                    </div>                  
                  </header>

                <!-- </div> -->
              </div>


            </div><!-- /.row -->


            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>  


          </div><!-- /.inner -->
        </div><!-- /.outer -->

    <script>
      $(function() {
        Metis.formValidation();
        Metis.formGeneral();
      });
    </script>        