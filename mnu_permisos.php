<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>

<div class="outer">
  <div class="inner bg-light lter">

<?php 

  include("conectar.php");
  $link=Conectarse();
  $pag = "CONTROL DE ACCESO";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

  if ( strpos($pag_org, '/') !== FALSE )

  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);


  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("nivel","cod_nivel",6); 
    // $ing = 0;
    // $ing2 = 0;
  }elseif($_GET["sw"]==2){  // EDITAR

// cod_nivel desc_menu est_menu
    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM mnu_permisos WHERE cod_nivel='".$_GET["id"]."'"; 
    $res1=@mysql_query($sql,$link);
    // $fila =mysql_fetch_object($res);

    $id = $_GET["id"];

  }else{
	

?>
		
  	<div class="row">
  		<div class="col-lg-12">
  			<div class="box">
  				<header>
  					<div class="icons"><i class="fa fa-table"></i></div>
  					<h5><?php echo strtoupper($pag); ?></h5>
	    		</header>

				    <div i="collapse4" class="body">
<!-- 			        <div id="botonera" style="margin-bottom: 10px;">
			          <button class="btn btn-danger btn-grad btn-circle" onclick="cargare('<?php //echo $pag_org;?>?sw=1'); return false;" style="font-size: 18px; font-weight: bolder; " >
			                 <i class="fa fa-plus"></i>
			          </button>
			        </div> -->


          <?php 
            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
            $sql="SELECT *
                  FROM nivel where cod_nivel <> 1 ORDER BY 1 DESC";          
            $res=@mysql_query($sql,$link);
          ?>


<script type="text/javascript">
    $('#dataTable_cat').dataTable({
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
    <table id="dataTable_cat" class="table table-bordered table-condensed table-hover table-striped">
			<colgroup>
			  <col class="con1" style="width: 45%" />
			  <col class="con2" style="width: 10%" />
			  <!-- <col class="con3" style="width: 8%" /> -->
			  <col class="con3" style="width: 8%" />
			</colgroup>          
      <thead>
        <tr>
          <th class="head1">Descrip</th>
          <!-- <th class="head1">Nivel</th> -->
          <th class="head1">EDITAR</th>
        </tr>
      </thead>

      <tbody>
          <?php 
          	while($row1=@mysql_fetch_array($res))
                     {$i++;
          ?>  
        <tr class="gradeX" <?php echo $colorfil;?> >
        	<?php $cod=$row1["cod_nivel"];
        				$url=$pag_org."?id=".$cod."&sw=2";
        	?>
          <td align="left">
            <a href="javascript:;" onclick="cargare('<?php echo $url; ?>')">
                <?php echo $row1["nivel_descrip"]; ?>
            </a>
          </td>

          <!-- <td class="center"><?php //echo $row1["categ_interes"]; ?></td> -->

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

<div style="height: 200px;"></div>


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
        <h5><?php 
              if($_GET["sw"]==1){ echo "NUEVO REGISTRO";}
              else { echo "EDITAR REGISTRO";}
            ?>
        </h5>
      </header>

      <div id="div-1" class="body">
        <form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)" id="popup-validation">

          <input type="hidden" name="pag" value="<?php echo $pag_sext; ?>">
          <input type="hidden" name="sw" value="<?php echo $_GET["sw"]; ?>">

          <div class="form-group">
            <label for="text2" class="control-label col-lg-4">CÓDIGO :</label>
            <div class="col-lg-8">
              <b><?php echo $id;?></b> <input type='hidden' name='id' class='Text' value='<?php echo $id;?>'>
            </div>
          </div>

<?php 
    while($fila1=@mysql_fetch_array($res1))
      {$i++;
        // echo $fila1["cod_nivel"]." - ".$fila1["desc_menu"]." - ".$fila1["est_menu"]."<br>"; 
        $hannfil[$i][0]=$fila1["codMnuPrestamo"];
        $hannfil[$i][1]=$fila1["cod_nivel"];
        $hannfil[$i][2]=$fila1["desc_menu"];
        $hannfil[$i][3]=$fila1["est_menu"];
      } 

      // print_r($hannfil);
?>
        <?php 
          if ($hannfil[1][3]==1) { $estpanel = "checked";}else{$estpanel = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Panel de control :</label>
      <div class="col-lg-4">
        <input type="hidden" name="panelh" value="<?php echo $hannfil[1][0];?>">
        <input type="checkbox" name="panel" id="<?php echo $hannfil[1][1];?>" class="form-control" <?php echo $estpanel;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[2][3]==1) { $estclie = "checked";}else{$estclie = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Clientes :</label>
      <div class="col-lg-4">
        <input type="hidden" name="clientesh" value="<?php echo $hannfil[2][0];?>">
        <input type="checkbox" name="clientes" id="<?php echo $hannfil[2][1];?>" class="form-control" <?php echo $estclie;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[3][3]==1) { $estpresta = "checked";}else{$estpresta = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Préstamos :</label>
      <div class="col-lg-4">
        <input type="hidden" name="prestamosh" value="<?php echo $hannfil[3][0];?>">
        <input type="checkbox" name="prestamos" id="<?php echo $hannfil[3][1];?>" class="form-control" <?php echo $estpresta;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[4][3]==1) { $estprenda = "checked";}else{$estprenda = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Prendas :</label>
      <div class="col-lg-4">
        <input type="hidden" name="prendash" value="<?php echo $hannfil[4][0];?>">
        <input type="checkbox" name="prendas" id="<?php echo $hannfil[4][1];?>" class="form-control" <?php echo $estprenda;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[5][3]==1) { $esthistorial = "checked";}else{$esthistorial = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Historial :</label>
      <div class="col-lg-4">
        <input type="hidden" name="historialh" value="<?php echo $hannfil[5][0];?>">
        <input type="checkbox" name="historial" id="<?php echo $hannfil[5][1];?>" class="form-control" <?php echo $esthistorial;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[6][3]==1) { $estreportes = "checked";}else{$estreportes = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Reportes :</label>
      <div class="col-lg-4">
        <input type="hidden" name="reportesh" value="<?php echo $hannfil[6][0];?>">
        <input type="checkbox" name="reportes" id="<?php echo $hannfil[6][1];?>" class="form-control" <?php echo $estreportes;?> >
      </div>
    </div>

        <?php 
          if ($hannfil[7][3]==1) { $estayuda = "checked";}else{$estayuda = "";}
        ?>
    <div class="form-group">
      <label for="text2" class="control-label col-lg-4">Ayuda :</label>
      <div class="col-lg-4">
        <input type="hidden" name="ayudah" value="<?php echo $hannfil[7][0];?>">
        <input type="checkbox" name="ayuda" id="<?php echo $hannfil[7][1];?>" class="form-control" <?php echo $estayuda;?> >
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
      </div>


      </div>
  </div>
</div>

<div style="height: 160px;"></div>

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
    Metis.formValidation();
    Metis.formGeneral();
  });
</script> 