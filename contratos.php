<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>
                    <div class="outer">
                        <div class="inner bg-light lter">

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "GESTION DE CLIENTES";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  // idContrato | desc_contrato | file_contrato | estado_contrato |

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("contratos","idContrato",6); 

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM contratos WHERE idContrato='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

// idContrato | desc_contrato | file_contrato | estado_contrato |

   $id = $fila->idContrato;
   $descripcontra = $fila->desc_contrato;
   $filecontrato = $fila->file_contrato;
   $estadocontrato = $fila->estado_contrato;

    mysql_free_result($res);

  }else{ //   LISTA

/*************************************  LISTA  *****************************************************/  
  ?>


      <style>
        ul.wysihtml5-toolbar > li {
          position: relative;
        }
      </style>
			<div class="row">
				<div class="col-lg-12">
					<div class="box">
						
	  				<header>
              <div class="icons">
<!--                 <a href="javascript:;" onclick="cargare('show_prestamo.php?id=<?php //echo $codPrestamo;?>'); return false;">
                  <i class="fa fa-chevron-left"></i>
                </a> -->
                <a href="javascript:;">
                  <i class="fa fa-chevron-left"></i>
                </a>
              </div>
              <h5>MANTENIMIENTO DE CONTRATOS</h5>
	   				</header>

            <div class="body">

<!--               <form>
                <textarea id="editor2" class="ckeditor"></textarea>
                <div class="form-actions no-margin-bottom" id="cleditorForm">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
              </form>
              <script>
                CKEDITOR.replace( 'editor2', {
                  customConfig: 'assets/js/config.js'
                });
              </script> -->
              <div id="botonera">
                <button class="btn btn-danger btn-grad btn-circle" onclick="cargare('<?=$pag_org?>?sw=1'); return false;" style="font-size: 18px; font-weight: bolder; " >
                  <i class="fa fa-plus"></i>
                </button>
              </div>

          <?php 
            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
            $sql="SELECT idContrato, desc_contrato, file_contrato, estado_contrato FROM contratos ORDER BY 1 DESC";          
            $res=@mysql_query($sql,$link);
          ?>
            

<script type="text/javascript">
    $('#dtbContratos').dataTable({
              "oLanguage": {
                  "sLengthMenu": "Mostrar _MENU_ registros",
                  "sZeroRecords": "No existen registros",
                  "sEmptyTable": "No existen registros",
                  "sInfo":        "Mostrando _START_ al _END_ de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando 0 al 0 de 0 registros",
                  "sInfoFiltered":   "(filtered from _MAX_ total entries)",
                  "sInfoPostFix":    "",
                  "thousands":      ",",
                  "loadingRecords": "Loading...",
                  "sProcessing":     "Procesando...",
                  "sSearch":         "Buscar:",
                  "Paginate": {
                      "First":      "Primero",
                      "Last":       "Ultimo",
                      "Next":       "Siguiente",
                      "Previous":   "Anterior"
                  },                   
              }
    });
</script>  


    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>"> 

      <table id="dtbContratos" class="table table-bordered table-condensed table-hover table-striped">
          <colgroup>
            <col class="con0" style="width: 5%" />
            <col class="con1" style="width: 8%" />
            <col class="con2" style="width: 5%" />
            <col class="con3" style="width: 8%" />
          </colgroup>

          <thead>
            <tr>
              <th class="head1" style="display: none;"></th>
              <th class="head1">Descrip. Contrato</th>
              <th class="head1">Archivo</th>
              <th class="head1">EDITAR</th>
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;
          ?>  
              <tr class="gradeX" <?=$colorfil?> >
                <td align="left" style="display: none;"></td>

                <?php $cod=$row1["idContrato"];
                      $url=$pag_org."?id=".$cod."&sw=2";
                ?>
                <td align="left">
                  <a href="javascript:;" onclick="cargare('<?php echo $url; ?>')">
                      <?php echo $row1["desc_contrato"]; ?>
                  </a>
                </td>
                <td class="left"><?php echo $row1["file_contrato"]; ?></td>

                <td class="center">
                  <a href="#" onclick="cargare('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2'); return false;">
                    <i class="fa fa-edit"></i>&nbsp;Editar
                  </a>  
                </td>
              </tr>
             
          <?php } ?>    
          </tbody>
        </table>
      </form>

  



            </div>
        </div>
    </div>
</div>


<div style="height: 200px;"></div>




                        </div>
                    </div>
                </div>


            </div>




    <script>
      $(function() {
        Metis.MetisTable();
        Metis.metisSortable();
      });
    </script>


<?php  
    exit();
    } 
 ?>


<div class="row">
  <div class="col-lg-10">
      <div class="box dark">
          <header>
              <div class="icons"><i class="fa fa-edit"></i></div>
              <h5>
                <?php 
                  if($_GET["sw"]==1){
                    echo "NUEVO REGISTRO";
                  }else {
                    echo "EDITAR REGISTRO";
                  }
                ?>
              </h5>
          </header>

          <div id="div-1" class="body">

            <form name="frm" class="form-horizontal" method="post" action="grabar_contrato.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)" id="popup-validation">

              <input type="hidden" name="pag" value="<?=$pag_sext?>">
              <input type="hidden" name="sw" value="<?=$_GET["sw"]?>">

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-2">CÓDIGO :</label>
                      <div class="col-lg-10">
                        <b><?=$id?></b> <input type='hidden' name='id' class='Text' value='<?=$id?>'>
                      </div>
                  </div> 

<!-- $id
$descripcontra
$filecontrato
$estadocontrato -->
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-2">Descrip.:</label>
                      <?php 
                        if($_GET["sw"]==2){
                          $desactivar = "des";
                        }
                      ?>  
                      <div class="col-lg-10">
                          <input type="text" name="descripcontra" id="descripcontra" value="<?php echo $descripcontra;?>" placeholder="Descripción del nombre" class="validate[required] form-control" readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-2">Archivo :</label>

                      <div class="col-lg-10">
                          <!-- <input type="text" name="filecontrato" id="filecontrato" value="<?=$filecontrato?>" placeholder="Apellido Paterno" class="validate[required] form-control"> -->
                          
                          <textarea id="editor2" name="editor2" class="ckeditor">
                            <?php 

                              if($_GET["sw"]==2){

                                if (file_exists("contratos/".$filecontrato)) {
                                    $gestor=fopen("contratos/".$filecontrato,"r"); 
                                    $i=0; 
                                    while(!feof($gestor)){ 
                                        $linea[$i]=rtrim(fgets($gestor)); 
                                        #comprobar que linea es y mandar dato a la bd 
                                        echo $linea[$i]; 
                                        $i++; 
                                    } 
                                    fclose($gestor);
                                } else {
                                    echo "El fichero no existe";
                                }      

                              }

                              // $filas=file("contratos/".$filecontrato); 
                              // foreach($filas as $value){ 
                              //   echo $value;
                              // }

                            ?>
                          </textarea>
                          <?php //print_r($filas); ?>
<!--                           <div class="form-actions no-margin-bottom" id="cleditorForm">
                            <input type="submit" value="Submit" class="btn btn-primary">
                          </div> -->

                          <script>
                            CKEDITOR.replace( 'editor2', {
                              customConfig: 'assets/js/config.js'
                            });
                          </script>
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8">
                      <input name="grabar" type="submit" value="GRABAR" class="btn btn-primary btn-grad" style="padding: 6px 15px;">
                      &nbsp;&nbsp;
                      <input type="reset" class="btn btn-primary btn-grad" value="CANCELAR" />
                      &nbsp;&nbsp;
                      <input type="button" value="SALIR" class="btn btn-primary btn-grad" style="padding: 6px 14px;" onclick="cargare('<?=$pag_org?>');">
                    </div>    
                  </div>  
            </form>

          </div>
      </div>
  </div>
</div>


</div>
</div>
</div>

</div>

    <script>
      $(function() {
        Metis.formValidation();
        Metis.formGeneral();
      });
    </script>