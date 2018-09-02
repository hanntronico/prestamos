<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>

      <div class="outer">
        <div class="inner bg-light lter">

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "GESTION DE USUARIOS";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("usuario","cod_usuario",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM usuario WHERE cod_usuario='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

// cod_usuario, login, clave, nombre, apellidos, dni, direccion, telefono, correo, cod_nivel, estado 

		$id = $fila->cod_usuario; 
		$login = $fila->login;      
		$clave = $fila->clave;                            
		$nombre = $fila->nombre;         
		$apellidos = $fila->apellidos;       
		$dni = $fila->dni;      
		$direccion = $fila->direccion;                                     
		$telefono = $fila->telefono;     
		$correo = $fila->correo;               
		$codnivel = $fila->cod_nivel; 
		$estado = $fila->estado; 

  
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

            <div id="botonera">
                 
                <button class="btn btn-danger btn-grad btn-circle" onclick="cargare('<?php echo $pag_org;?>?sw=1'); return false;" style="font-size: 18px; font-weight: bolder; " >
                 <i class="fa fa-plus"></i>
                </button>
            </div> 

            <br> 

          <?php 

            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
              

            $sql="SELECT cod_usuario, login, clave, nombre, apellidos, dni, direccion, telefono, correo, cod_nivel, estado
                  FROM usuario where cod_usuario <> 1 ORDER BY 1 DESC";          

            $res=@mysql_query($sql,$link);
          ?>

<script type="text/javascript">
    $('#dataTable_usu').dataTable({
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
      <input type="hidden" name="pag" value="<?php echo $pag_sext; ?>"> 

	<div style="overflow-x: auto;">
      <table id="dataTable_usu" class="table table-bordered table-condensed table-hover table-striped">
					<colgroup>
			      <col class="con1" style="width: 8%" />
			      <col class="con2" style="width: 50%" />
			      <col class="con3" style="width: 8%" />
			      <col class="con3" style="width: 8%" />
			    </colgroup>          
          <thead>
            <tr>
              <th class="head1">Usuario</th>
              <th class="head1">Nombre</th>
              <th class="head1">DNI</th>
              <th class="head1">EDITAR</th>
            </tr>
          </thead>

          <tbody>

          <?php 
          	while($row1=@mysql_fetch_array($res))
                     {$i++;
          ?>  
              <tr class="gradeX" <?php echo $colorfil;?> >

               	<?php $cod=$row1["cod_usuario"];
               				$url=$pag_org."?id=".$cod."&sw=2";
               	?>
                <td align="left">
                  <a href="javascript:;" onclick="cargare('<?php echo $url; ?>')">
                      <?php echo $row1["login"]; ?>
                  </a>
                </td>

                <td class="center"><?php echo $row1["nombre"]."  ".$row1["apellidos"]; ?></td>
                <td class="center"><?php echo $row1["dni"]; ?></td>

                <td class="center">
                  <a href="javascrip:;" onclick="cargare('<?php echo $url; ?>'); return false;">
                    <i class="fa fa-edit"></i>&nbsp;Editar
                  </a>  
                </td>
              </tr>
             
          <?php } ?>    
          </tbody>
        </table>
			</div>        
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
            </div>
            <!-- /#wrap -->

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
              </div>  -->           
              <!-- /.toolbar -->
          </header>

          <div id="div-1" class="body">

            <form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)" id="popup-validation">

              <input type="hidden" name="pag" value="<?php echo $pag_sext; ?>">
              <input type="hidden" name="sw" value="<?php echo $_GET["sw"]; ?>">

<!-- 		$id = $fila->cod_usuario; 
		$login = $fila->login;      
		$clave = $fila->clave;                            
		$nombre = $fila->nombre;         
		$apellidos = $fila->apellidos;       
		$dni = $fila->dni;      
		$direccion = $fila->direccion;                                     
		$telefono = $fila->telefono;     
		$correo = $fila->correo;               
		$codnivel = $fila->cod_nivel; 
		$estado = $fila->estado;  -->

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">CÓDIGO :</label>
                      <div class="col-lg-8">
                        <b><?php echo $id;?></b> <input type='hidden' name='id' class='Text' value='<?php echo $id;?>'>
                      </div>
                  </div> 

                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Nombres :</label>

                      <div class="col-lg-8">
                          <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Nombres" class="validate[required] form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Apellidos :</label>

                      <div class="col-lg-8">
                          <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" placeholder="Apellidos" class="validate[required] form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">DNI :</label>

                      <div class="col-lg-8">
                          <input type="text" name="dni" id="dni" value="<?php echo $dni;?>" class="validate[required,minSize[8],custom[number]] form-control" maxlength="8">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Teléfono :</label>

                      <div class="col-lg-8">
                          <input type="text" name="telefono" id="telefono" value="<?php echo $telefono;?>" class="validate[required,minSize[9],custom[number]] form-control" maxlength="9">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Dirección :</label>

                      <div class="col-lg-8">
                          <input type="text" name="direccion" id="direccion" value="<?php echo $direccion;?>" class="form-control">
                      </div>
                  </div>                  
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Email :</label>

                      <div class="col-lg-8">
                          <input type="text" name="correo" id="correo" value="<?php echo $correo;?>" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Login :</label>

                      <div class="col-lg-8">
                          <input type="text" name="login" id="login" value="<?php echo $login;?>" class="form-control">
                      </div>
                  </div> 
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Contraseña :</label>

                      <div class="col-lg-8">
                          <input type="password" name="clave" id="clave" value="<?php echo $clave;?>" class="form-control">
                          <input type="hidden" name="ant_clave" id="ant_clave" value="<?php echo $clave;?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="text2" class="control-label col-lg-4">Nivel : <?php echo $_SESSION["s_cod"]; ?></label>
                      <?php 
                      	if ($_SESSION["s_cod"] == 1) {
                      		$consult = ' ORDER BY 1';
                      	}else{
                      		$consult = ' WHERE cod_nivel <> 1 ORDER BY 1';
                      	}
                      ?>
                      <div class="col-lg-8">
                          <?php llenarcombo('nivel','cod_nivel, nivel_descrip', $consult, $codnivel, '','codnivel id=opcNivel'); ?>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-4">Estado :</label>
                    <div class="col-lg-4">
                    	<?php if ($estado==1) {
                    			$check="checked='checked'";
                    		}else{
                    			$check=" ";
                    		} 
                    	?>
                      <input type="checkbox" id="estado" name="estado" class="form-control" <?php echo $check; ?> >
                    </div>
                  </div>                                                                        
                  <div class="form-group">
                    <div class="col-lg-8">
                      <input name="grabar" type="submit" value="GRABAR" class="btn btn-primary btn-grad" style="padding: 6px 15px;">
                      &nbsp;&nbsp;
                      <input type="reset" class="btn btn-primary btn-grad" value="CANCELAR" />
                      &nbsp;&nbsp;
                      <input type="button" value="SALIR" class="btn btn-primary btn-grad" style="padding: 6px 14px;" onclick="cargare('<?php echo $pag_org; ?>');">
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