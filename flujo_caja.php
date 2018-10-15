<?php
	include("conectar.php");
  $link=Conectarse();
  include ("funciones.php");
?>

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
                        <label for="text2" class="control-label col-lg-2">Fecha de Nacimiento:</label>

                        <div class="col-lg-2">
                          <div class="input-group input-append date" id="dp3" data-date="<?=dma_shora($fecNac)?>" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" name="fecnac"  value="<?=dma_shora($fecNac)?>">
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                          </div>                          
                        </div>
                      
                      </div>  


                  
                    </div>  
                  </div>

                  
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