<?php
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");

  date_default_timezone_set('America/Lima');
  $fecNac = date('Y-m-d');

?>
<script src="assets/js/hann.js" type="text/javascript" charset="utf-8" async></script>

        <div class="outer">
          <div class="inner bg-light lter">
            
            <div class="row">
              <div class="col-lg-12">

                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <a href="javascript:;" onclick="cargare('reportes.php'); return false;">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </div>

                    <h5>Flujo de Caja</h5>
                  </header>

                  <div id="div-2" class="body">
                    <div class="form-group" style="margin-bottom: 4px;">

                      <div class="row">
                        <label for="text2" class="control-label col-lg-1">Desde:</label>

                        <div class="col-lg-2">
                          <div class="input-group input-append date" id="dp3" data-date="<?=dma_shora($fecNac)?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" id="fecDesde" name="fecDesde" value="<?=dma_shora($fecNac)?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                          
                        </div>

                        <label for="text2" class="control-label col-lg-1">Hasta:</label>

                        <div class="col-lg-2">
                          <div class="input-group input-append date" id="dp4" data-date="<?=dma_shora($fecNac)?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" id="fecHasta" name="fecHasta" value="<?=dma_shora($fecNac)?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                          
                        </div>

                        <div class="col-lg-3">
                          <select name="codConcepto" id="opcConcepto" data-placeholder="Seleccione Concepto..." class="form-control chzn-select" tabindex='2'>  
                            <option value="0">Todos</option>
                            <?php
                              $rs=@mysql_query("set names utf8",$link);
                              $fila=@mysql_fetch_array($rs);
                              $sql1 = "SELECT * FROM conceptos WHERE estado_concepto=1 ORDER BY 1";
                              
                              $res1=@mysql_query($sql1,$link);

                              $i=0;
                             while($row1=@mysql_fetch_array($res1)) { $i++; ?>
                                
                                <option value="<?php echo $row1['idConcepto']; ?>"> <?php echo $row1['nom_concepto']; ?>  </option>

                            <?php  }  ?>                            
                          </select>

                          <?php
                            // $consult = ' WHERE estado_concepto=1 ORDER BY 1';
                            // llenarcombo('conceptos','idConcepto, nom_concepto', $consult, '', '','codConcepto id=opcConcepto')
                          ?>
                        </div>

                        <div class="col-lg-2">
                          <input type="button" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Enviar">
                        </div>

                      
                      </div>  


                  
                    </div>  
                  </div>



                  
                </div>
              </div>

            
            </div>




            <div class="row">
              <div class="col-lg-12">
                <div class="box" style="padding: 10px;">
                  
                  <div id="content_verbusca"></div>
                
                </div>
              </div>
            </div>


            <div style="height: 300px;"></div>
          </div>
        </div> 

    <script>
      $(function() {
        Metis.formValidation();
        Metis.formGeneral();
      });
    </script>