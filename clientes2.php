<?php include 'inc_seguridad.php';?>
<?php include 'head.php'; ?>

        <body class=" ">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">

                            <?php include 'navbar_header.php'; ?>
                            <?php include 'top_nav.php'; ?>
                            <?php include 'navbarmenu_horizontal.php'; ?>                  

                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /.navbar -->
                        <header class="head">

                          <?php include 'search_bar.php'; ?>
                                <!-- /.search-bar -->
                            <div class="main-bar">
                                <h3>
                                  <!-- <i class="fa fa-table"></i> -->
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                  <a href="">&nbsp;1) Listar</a>
                                  <!-- <i class="fa fa-table"></i> -->
<!--                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="">&nbsp;2) Aprobar</a> -->
                                  <!-- <i class="fa fa-table"></i> -->
<!--                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="">&nbsp;3) Concretados</a>
 -->
                                </h3>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <!-- /.head -->
                </div>
                <!-- /#top -->
                   
                <?php include 'left_menu.php'; ?>
                



                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <!--Begin Datatables-->

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "GESTION DE CLIENTES DEL SISTEMA";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("clientes","codCliente",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM clientes WHERE codCliente='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

// cod_usuario login clave nombre  apellidos dni direccion telefono  correo  cod_nivel

   $id = $fila->codCliente;
   $nomClie = $fila->nomClie;
   $apepatClie = $fila->apepatClie;
   $apematClie = $fila->apematClie;
   $nroDNI = $fila->nroDNI;
   $nroSec  = $fila->nroSec ;
   $telefono = $fila->telefono;
   $email = $fila->email;
   $nomInbox = $fila->nomInbox;
   $estClie = $fila->estClie;


   
    mysql_free_result($res);

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

            <br>

            <div id="botonera">
                 <!-- <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" >  -->
                 <button class="stdbtn btn_orange" onclick="cargare('<?=$pag_org?>?sw=1'); return false;" > 
                  &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button>
                  
        <!--           <input type="button" name="Button3" value=" Deshabilitar " onclick="Disable()" class="stdbtn btn_orange"> -->

                  <?php //echo $_SESSION["s_cod"]; 
                    // $sql="SELECT cod_nivel FROM usuario WHERE cod_usuario='".$_SESSION["s_cod"]."'"; 
                    // $res=@mysql_query($sql,$link);
                    // $urg=@mysql_fetch_array($res);
                   
                    // if ($urg[0]==1) {
                  ?>

                   <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange">
                  <?php //} ?>
            </div> 

            <br> 

          <?php 

            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
              

            $sql="SELECT codCliente,
                         nomClie,
                         apepatClie,
                         apematClie,
                         nroDNI,
                         nroSec,
                         telefono,
                         email,
                         nomInbox,
                         estClie
                  FROM clientes ORDER BY 1 DESC";          

            $res=@mysql_query($sql,$link);
          ?>


    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>"> 

      <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">          
      
        <!-- <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2"> -->
          <colgroup>
            <col class="con0" style="width: 2%" />
            <col class="con0" style="width: 2%" />
            <col class="con0" style="width: 12%" />
            <col class="con1" style="width: 12%" />
            <col class="con1" style="width: 12%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <!-- <col class="con1" style="width: 8%" /> -->
            <!-- <col class="con1" style="width: 8%" /> -->
            <col class="con1" style="width: 8%" />
          
            <!-- <col class="con1" style="width: 5%" /> -->
            <col class="con1" style="width: 5%" />
          
          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">Nombre</th>
              <th class="head1">Ape. Pat.</th>
              <th class="head1">Ape. Mat.</th>
              <th class="head1">DNI</th>
              <!-- <th class="head1">Nro SEC</th> -->
              <th class="head1">Teléfono</th>
              <!-- <th class="head1">Email</th> -->
              <th class="head1">Nick</th>

              <th class="head1">EDITAR</th>
              <!-- <th class="head1">PROC</th> -->
              <?php //if ($urg[0]==1) {  ?>            
                  <!-- <th class="head1">Activación</th> -->
              <?php //}  ?>
              
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;

                      // if ($row1['estado']==0) {
                      //   $colorfil = "style='background: #E2C6FF;'";
                      // }else {
                      //   $colorfil = "";
                      // }
          ?>  

              <tr class="gradeX" <?=$colorfil?> >
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="left"><?php echo $row1[1]; ?></td>
                <td align="left"><?php echo $row1[2]; ?></td>
                <td align="left"><?php echo $row1[3]; ?></td>
                <td align="left"><?php echo $row1[4]; ?></td>
                <!-- <td align="left"><?php //echo $row1[5]; ?></td> -->
                <td class="center"><?php echo $row1[6]; ?></td>
                <!-- <td class="center"><?php //echo $row1[7]; ?></td> -->
                <td class="center"><?php echo $row1[8]; ?></td>

                <td class="center">
                  <a href="#" onclick="cargare('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2'); return false;">
                    <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  
                </td>
<!--                 <td class="center">
                  <a href="#" onclick="cargare('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2'); return false;">
                    <img src="images/icons/editor.png" alt="">&nbsp;Procesar</a>  
                </td>   -->              
                <?php 
                    // if ($row1['estado']==1) {
                    //   $fun_str="Disable(); return false;";
                    //   $act_str="<img src='images/sw_on.png'>";
                    // }elseif ($row1['estado']==0) {
                    //   $fun_str="Enable(); return false;";
                    //   $act_str="<img src='images/sw_off.png'>";
                    // }

                  ?>
                <?php //if ($urg[0]==1) {  ?>            
                  <!-- <td><a href="#" onclick="<?=$fun_str?>"><?=$act_str?></a></td> -->
                <?php //}  ?>

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





                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                <?php include 'derecha_slide.php'; ?>


                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
<?php  
    // echo "</body>\n";
    // echo "</html>";
    include 'foot.php';
    exit();
   } 
 ?>


 <!-- <div id="fra_crud"> -->
  <!-- <br> -->

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
              <div class="toolbar">
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
              </div>            <!-- /.toolbar -->
          </header>

          <div id="div-1" class="body">

            <form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)">

              <input type="hidden" name="pag" value="<?=$pag_sext?>">
              <input type="hidden" name="sw" value="<?=$_GET["sw"]?>">

              <!--   $codCliente = $fila->codCliente;
                 $nomClie = $fila->nomClie;
                 $apepatClie = $fila->apepatClie;
                 $apematClie = $fila->apematClie;
                 $nroDNI = $fila->nroDNI;
                 $nroSec  = $fila->nroSec ;
                 $telefono = $fila->telefono;
                 $email = $fila->email;
                 $nomInbox = $fila->nomInbox;
                 $estClie = $fila->estClie; -->

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">CÓDIGO :</label>
                      <div class="col-lg-8">
                        <b><?=$id?></b> <input type='hidden' name='id' class='Text' value='<?=$id?>'>
                      </div>
                  </div>                
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Nombres :</label>

                      <div class="col-lg-8">
                          <input type="text" name="nombre" id="nombre" value="<?=$nomClie?>" placeholder="Nombres" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Apellido Paterno :</label>

                      <div class="col-lg-8">
                          <input type="text" name="apepat" id="apepat" value="<?=$apepatClie?>" placeholder="Apellido Paterno" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Apellido Materno :</label>

                      <div class="col-lg-8">
                          <input type="text" name="apemat" id="apemat" value="<?=$apematClie?>" placeholder="Apellido Materno" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">DNI :</label>

                      <div class="col-lg-8">
                          <input type="text" name="dni" id="dni" value="<?=$nroDNI?>" class="form-control">
                      </div>
                  </div>                                                      
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Teléfono :</label>

                      <div class="col-lg-8">
                          <input type="text" name="telefono" id="telefono" value="<?=$telefono?>" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Email :</label>

                      <div class="col-lg-8">
                          <input type="text" name="email" id="email" value="<?=$email?>" class="form-control">
                      </div>
                  </div>                  
                  <div class="form-group">
                    <div class="col-lg-8">
                      <input name="grabar" type="submit" value="   GRABAR   " class="boton">
                        &nbsp;&nbsp;
                      <input type="reset" class="reset radius2" value="CANCELAR" />
                      &nbsp;&nbsp;&nbsp;
                      <input type="button" value="  SALIR  " class="stdbtn btn_orange" onclick="cargare('<?=$pag_org?>');">
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

<?php include 'right_side_bar.php'; ?>



            
<?php include 'foot.php'; ?>

