<?php


?>        

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>

        <div class="outer">
          <div class="inner bg-light lter">

            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="row">

              <div class="col-lg-12">
                <div class="block">
                  <span id="respuesta" class="label label-success"></span>
                </div>
              </div>
              
              <div class="col-lg-12">
                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <i class="fa fa-list-alt"></i>
                    </div>
                    <h5>PRÉSTAMOS</h5>

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
                    </div>
                  </header>

                  <div id="div-2" class="body">
                    <!-- <form class="form-horizontal"> -->
                      
                      <div class="form-horizontal">
                        <div class="form-group">
                          <div class="col-lg-5">
                            <input type="button" id="btnActivos" name="btnActivos" class="btn btn-success btn-sm btn-grad" value="Activos">
                            <input type="button" id="btnVencidos" name="btnVencidos" class="btn btn-warning btn-sm btn-grad" value="Vencidos">
                            <input type="button" id="btnExpirados" name="btnExpirados" class="btn btn-danger btn-sm btn-grad" value="Expirados">
                            <input type="button" id="btnLiquidados" name="btnLiquidados" class="btn btn-default btn-sm btn-grad" value="Liquidados">
                            <input type="button" id="btnCancelados" name="btnCancelados" class="btn btn-metis-5 btn-sm btn-grad" value="Cancelados">
                          </div>  
                        </div> 
<!--                         <div class="form-group">
                          <div class="col-lg-5">
                            <input type="text" name="bus_prestamo" id="bus_prestamo" placeholder="Buscar" class="form-control">
                          </div>
                          <div class="col-lg-2">
                            <input type="button" id="btnBuscar" name="btnBuscar" class="btn btn-primary btn-sm btn-grad" value="BUSCAR">
                          </div>  
                        </div> -->
                      </div>  
                      
                    <!-- </form> -->
                  </div>
                </div>
              </div>


           </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="box" style="padding: 10px;">
        
        <div id="cont_resultado_buspresta"></div>

      </div>
    </div>
  </div>



            <div style="height: 300px;"></div>  


          </div><!-- /.inner -->
        </div><!-- /.outer -->