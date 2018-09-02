<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Form WYSIWYG</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">
    <!-- <link rel="stylesheet" href="assets/lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css"> -->
    <link rel="stylesheet" href="assets/lib/pagedown-bootstrap/css/jquery.pagedown-bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
      <script src="assets/lib/respond/respond.min.js"></script>
      <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

    <!--Modernizr-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  </head>
  <body class="  ">
    <div class="bg-dark dk" id="wrap">

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
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
                      <i class="fa fa-th-large"></i>
                    </div>
                    <h5>CKEditor</h5>

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
                    </div><!-- /.toolbar -->
                  </header>
                  <div class="body">
                    <form>
                      <textarea id="ckeditor" class="ckeditor"></textarea>
                      <div class="form-actions no-margin-bottom" id="cleditorForm">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->




          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
    </div><!-- /#wrap -->




    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/epiceditor/0.2.2/js/epiceditor.min.js"></script>

    <!--Bootstrap -->
<!--     <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->

    <!-- MetisMenu -->
<!--     <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script> -->

    <!-- Screenfull -->
<!--     <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script> -->
    <!-- <script src="assets/lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script> -->
    <!-- <script src="assets/lib/pagedown-bootstrap/js/jquery.pagedown-bootstrap.combined.min.js"></script> -->

    <!-- Metis core scripts -->
    <!-- <script src="assets/js/core.min.js"></script> -->

    <!-- Metis demo scripts -->
    <!-- <script src="assets/js/app.js"></script> -->
<!--     <script>
      $(function() {
        Metis.formWysiwyg();
      });
    </script> -->
    <!-- <script src="assets/js/style-switcher.min.js"></script> -->
  </body>