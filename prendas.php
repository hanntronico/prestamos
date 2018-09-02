<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>
                    <div class="outer">
                        <div class="inner bg-light lter">

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "GESTION DE PRENDAS";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("prendas","idPrenda",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM prendas WHERE idPrenda='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

   // idPrenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, idTipo, prenda_estado

    $idPrenda = $fila->idPrenda;
    $prendadescrip = $fila->prenda_descrip;
    $prendamarca = $fila->prenda_marca;
    $prendamodelo = $fila->prenda_modelo;
    $prendaserie = $fila->prenda_serie;
    $prendaobserv = $fila->prenda_observ;
    $prendaavaluo = $fila->prenda_avaluo;
    $prendaprest = $fila->prenda_prest;
    $idTipo = $fila->idTipo;
    $prendaestado = $fila->prenda_estado;
  
    @mysql_free_result($res);

  }else{ //   LISTA

/*************************************  LISTA  *****************************************************/  
  ?>


<div class="row">
  <div class="col-lg-12">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-table"></i></div>
                <h5><?php echo strtoupper($pag); ?></h5>
            </header>

            
            <div id="collapse4" class="body">

            <div id="botonera">



            </div> 

            <br> 

          <?php 

            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
              

            $sql="SELECT idPrenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, idTipo, prenda_estado
                  FROM prendas ORDER BY 1 DESC";          

            $res=@mysql_query($sql,$link);
          ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>"> 

      <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">          
      
          <colgroup>
            <col class="con0" style="width: 5%" />
            <col class="con1" style="width: 1%" />
<!--             <col class="con0" style="width: 4%" />
            <col class="con0" style="width: 4%" /> -->
<!--             <col class="con2" style="width: 5%" />
            <col class="con2" style="width: 5%" /> -->
            <!-- <col class="con3" style="width: 5%" /> -->
          </colgroup>

          <thead>
            <tr>

              <th class="head1">Prenda</th>

              <th class="head1">EDITAR</th>
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;

          ?>  
              <tr class="gradeX" <?=$colorfil?> >


                  <td align="left">
<!--                     <a href="#" onclick="cargare('show_cliente.php?id=<?=$row1[0]?>')">
                      <?php //echo $row1["prenda_descrip"]; ?>
                    </a> -->
                    <?php echo $row1["prenda_descrip"];?>
                  </td>

                <!-- <td class="left"><?php //echo $row1["prenda_marca"]; ?></td> -->
                <!-- <td class="left"><?php //echo $row1["prenda_modelo"]; ?></td> -->

                <td class="center">
                  <a href="#" onclick="cargare('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2'); return false;">
                    <img src="images/icons/editor.png" alt="">
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
<!-- /.row -->
<!--End Datatables-->

<br><br><br><br><br><br><br><br><br><br><br>




                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <!-- /#right -->
            </div>
            <!-- /#wrap -->



    <script>
      $(function() {
        Metis.MetisTable();
        Metis.metisSortable();
      });
    </script>
<!-- <script src="assets/js/style-switcher.min.js"></script> -->


<?php  
    exit();
    } 
 ?>


<div class="row">
  <div class="col-lg-8">
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
              <!-- .toolbar -->
<!--               <div class="toolbar">
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
              </div>  -->           <!-- /.toolbar -->
          </header>

          <div id="div-1" class="body">

            <form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)" id="popup-validation">

              <input type="hidden" name="pag" value="<?=$pag_sext?>">
              <input type="hidden" name="sw" value="<?=$_GET["sw"]?>">

<!--     $idPrenda = $fila->idPrenda;
    $prendadescrip = $fila->prenda_descrip;
    $prendamarca = $fila->prenda_marca;
    $prendamodelo = $fila->prenda_modelo;
    $prendaserie = $fila->prenda_serie;
    $prendaobserv = $fila->prenda_observ;
    $prendaavaluo = $fila->prenda_avaluo;
    $prendaprest = $fila->prenda_prest;
    $idTipo = $fila->idTipo;
    $prendaestado = $fila->prenda_estado; -->

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">CÓDIGO :</label>
                      <div class="col-lg-8">
                        <b><?=$idPrenda?></b> <input type='hidden' name='id' class='Text' value='<?=$idPrenda?>'>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Descripción :</label>
                      <div class="col-lg-8">
                        <input type="text" name="descrp" id="descrip" value="<?=$prendadescrip?>" placeholder="Descripción" class="validate[required] form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Marca :</label>
                      <div class="col-lg-8">
                          <input type="text" name="prendamarca" id="prendamarca" value="<?=$prendamarca?>" placeholder="Marca" class="validate[required] form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Modelo :</label>
                      <div class="col-lg-8">
                          <input type="text" name="prendamodelo" id="prendamodelo" value="<?=$prendamodelo?>" placeholder="Modelo" class="validate[required] form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Serie :</label>
                      <div class="col-lg-8">
                        <input type="text" name="prendaserie" id="prendaserie" value="<?=$prendaserie?>" class="validate[required] form-control" placeholder="Serie">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Observacion :</label>
                      <div class="col-lg-8">
                          <input type="text" name="prendaobserv" id="prendaobserv" value="<?=$prendaobserv?>" class="validate[required] form-control" placeholder="Observacion">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Avalúo :</label>
                      <div class="col-lg-8">
                          <input type="text" name="telefono" id="telefono" value="<?=$telefono?>" class="validate[required] form-control">
                      </div>
                  </div>                                                                                         
                  <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Tipo :</label>
                    <div class="col-lg-5"><?php llenarcombo('tipos','idTipo, tipo_descrip',' WHERE tipo_estado=1 ORDER BY 2', $idTipo, '','codTipo id=opcTipo'); ?></div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8">
                      <input name="grabar" type="submit" value="GRABAR" class="btn btn-primary btn-grad" style="padding: 6px 15px; font-size: 12px;">
                      &nbsp;
                      <input type="reset" class="btn btn-primary btn-grad" value="CANCELAR" style="font-size: 12px;">
                      &nbsp;
                      <input type="button" value="SALIR" class="btn btn-primary btn-grad" style="padding: 6px 14px; font-size: 12px;"" onclick="cargare('<?=$pag_org?>');">
                    </div>    
                  </div>  
            </form>
            <!-- end form -->
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



            

