<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>
      
  <div class="outer">
    <div class="inner bg-light lter">

<?php 
  include("conectar.php");
  $link=Conectarse();
  $pag = "GESTION DE CATEGORIAS";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

  if ( strpos($pag_org, '/') !== FALSE )

  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);
 

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("categorias","idCategoria",6); 
    // $ing = 0;
    // $ing2 = 0;
  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM categorias WHERE idCategoria='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

		$id = $fila->idCategoria; 
		$catedescrip = $fila->cate_descrip;      
		$categobserv = $fila->categ_observ;               
		$categperiodo = $fila->categ_periodo; 
		$categplazo = $fila->categ_plazo; 
		$categinteres = $fila->categ_interes; 
		$categestado = $fila->categ_estado; 

    mysql_free_result($res);

  }else{
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
            $sql="SELECT idCategoria, cate_descrip, categ_observ, categ_periodo, categ_plazo, categ_interes,categ_estado
                  FROM categorias where idCategoria ORDER BY 1 DESC";          
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
			  <col class="con1" style="width: 25%" />
			  <col class="con2" style="width: 25%" />
			  <col class="con3" style="width: 8%" />
			  <col class="con3" style="width: 8%" />
			</colgroup>          
      <thead>
        <tr>
          <th class="head1">Descrip</th>
          <th class="head1">Nombre</th>
          <th class="head1">EDITAR</th>
        </tr>
      </thead>

      <tbody>
          <?php 
          	while($row1=@mysql_fetch_array($res))
                     {$i++;
          ?>  
        <tr class="gradeX" <?php echo $colorfil;?> >
        	<?php $cod=$row1["idCategoria"];
        				$url=$pag_org."?id=".$cod."&sw=2";
        	?>
          <td align="left">
            <a href="javascript:;" onclick="cargare('<?php echo $url; ?>')">
                <?php echo $row1["cate_descrip"]; ?>
            </a>
          </td>

          <td class="center"><?php echo $row1["categ_interes"]; ?></td>

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

            <form name="frm" class="form-horizontal" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormCliente(this)" id="popup-validation">

              <input type="hidden" name="pag" value="<?php echo $pag_sext; ?>">
              <input type="hidden" name="sw" value="<?php echo $_GET["sw"]; ?>">

                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">CÓDIGO :</label>
                  <div class="col-lg-8">
                    <b><?php echo $id;?></b> <input type='hidden' name='id' class='Text' value='<?php echo $id;?>'>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Descripción :</label>
                  <div class="col-lg-8">
                    <input type="text" name="catedescrip" id="catedescrip" value="<?php echo $catedescrip; ?>" placeholder="Descripcion" class="validate[required] form-control">
                  </div>
                </div>
                  <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Periodo :</label>
                  <div class="col-lg-8">
                    <input type="text" name="categperiodo" id="categperiodo" value="<?php echo $categperiodo; ?>" placeholder="Periodo" class="validate[required] form-control" onKeyPress="return numeros(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Plazo :</label>
                    <div class="col-lg-8">
                      <input type="text" name="categplazo" id="categplazo" value="<?php echo $categplazo;?>" placeholder="Plazo" class="validate[required] form-control" onKeyPress="return numeros(event)">
                    </div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Interés :</label>
                  <div class="col-lg-8">
                    <input type="text" name="categinteres" id="categinteres" value="<?php echo $categinteres;?>" placeholder="Interés" class="validate[required] form-control" onKeyPress="return numeros(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Observacion :</label>
                  <div class="col-lg-8">
                    <input type="text" name="categobserv" id="categobserv" value="<?php echo $categobserv; ?>" placeholder="Interés" class="validate[required] form-control">
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