<?php include 'inc_seguridad.php';?>
<!doctype html>
<html class="no-js">

  <?php include 'head.php'; ?>
  
  <!-- <body class="  menu-affix"> -->
  <!-- <body class="  menu-affix"> -->
  <body class="bg-green lter">
  <!-- <body class="bg-light dker"> -->
  <!-- <body> -->
    <div class="bg-dark dk" id="wrap">
    <!-- <div class="bg-light lter" id="wrap"> -->
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top bg-green lter">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include 'navbar_header.php'; ?>
            <?php include 'top_nav.php'; ?>
            <?php 
              if ($_SESSION["s_tipo"]==1 && $_SESSION["s_estado"]==1) {
                include 'navbarmenu_horizontal.php'; 
              }
            ?>

          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->


        <header class="head">
        <!-- <header> -->
          <?php include 'search_bar.php'; ?>
          <div class="main-bar">
            <h3 style="color: #fff;"><i class="fa fa-cogs"></i>&nbsp; Panel de Control</h3>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->

      </div><!-- /#top -->

      <?php include 'left_menu.php'; ?>

      <div id="content">

          <?php //include 'content_general_orig.php'; ?>
          <?php //include 'content_validation_orig.php'; ?>
          <?php //include 'dashboard.php'; ?>
          <?php //include 'clientes.php'; ?>
          <?php //include 'boleta.php'; ?>


          <?php
// switch ($_GET["mnu"]) {

//     case '1':
//           include 'content_general_orig.php';
//     break;

//     case '2':
//           include 'clientes.php';
//     break;


// }          
          ?>




          <div class="outer">
            <div class="inner bg-light lter">


            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <h5>Panel Principal</h5>


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
                  <div class="body">
                    <form action="" class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-lg-4">
                        <h2>Bienvenido a Prestacix</h2>
                        </label>
                        <br><br><br><br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br>


                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            </div>
          </div>  


      </div><!-- /#content -->

      <?php include 'derecha_slide.php'; ?>

      



        <!-- .well well-small -->

    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
    <!-- <footer class="Footer bg-green lter"> -->
      <p>2018 &copy; Prestacix Software Online</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- <div class="modal-header"> -->
            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            <!-- <h4 class="modal-title">Modal title</h4> -->
          <!-- </div> -->

          
          <div class="modal-body">
<!--             <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p> -->


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

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <!--jQuery -->




    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>     -->
    
    <!-- <script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script> -->
    <!-- <script src="assets/js/config.js"></script> -->

    <!-- <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.10.0/standard-all/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.10.0/basic/ckeditor.js"></script> -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/jquery.uniform.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.min.js"></script>


 


    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/autosize.js/1.18.17/jquery.autosize.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.1/js/bootstrap-switch.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.0.1/js/bootstrap-colorpicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- MetisMenu -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>

    <!-- Screenfull -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>

    <script src="assets/lib/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    
<!-- ********************************************** -->

<!--     <script src="assets/lib/jQuery.validVal/js/jquery.validVal.min.js"></script> -->

<!-- ********************************************** -->

    <script src="assets/lib/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    
    <script src="assets/lib/validVal/js/jquery.validVal.min.js"></script>    
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>

    <script src="assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Metis core scripts -->
    <script src="assets/js/core.min.js"></script>

    <!-- Metis demo scripts -->
    <script src="assets/js/app.js"></script>
    <script>
      $(function() {
        Metis.formGeneral();
        Metis.formValidation();
        // Metis.MetisTable();
        // Metis.metisSortable();
      });
    </script>
    <!-- <script src="assets/js/style-switcher.min.js"></script> -->









<!--     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> -->

    <!--Bootstrap -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->

    <!-- MetisMenu -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script> -->

    <!-- Screenfull -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script> -->

    <!-- <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script> -->

    <!-- Metis core scripts -->
    <!-- <script src="assets/js/core.min.js"></script> -->

    <!-- Metis demo scripts -->
    <!-- <script src="assets/js/app.js"></script> -->
<!--     <script>
      $(function() {
        // Metis.MetisTable();
        // Metis.metisSortable();
      });
    </script> -->
    <!-- <script src="assets/js/style-switcher.min.js"></script>      -->
  
  </body>
