<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Buttons</title>

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
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="assets/img/logo.png" alt="">
              </a> 
            </header>
            <div class="topnav">
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-envelope"></i>
                  <span class="label label-warning">5</span> 
                </a> 
                <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-comments"></i>
                  <span class="label label-danger">4</span> 
                </a> 
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                  <i class="fa fa-question"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a href="login.html" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a> 
                <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> <span class="glyphicon glyphicon-comment"></span>  </a> 
              </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
              <ul class="nav navbar-nav">
                <li> <a href="dashboard.html">Dashboard</a>  </li>
                <li> <a href="table.html">Tables</a>  </li>
                <li> <a href="file.html">File Manager</a>  </li>
                <li class='dropdown '>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Form Elements
                    <b class="caret"></b>
                  </a> 
                  <ul class="dropdown-menu">
                    <li> <a href="form-general.html">General</a>  </li>
                    <li> <a href="form-validation.html">Validation</a>  </li>
                    <li> <a href="form-wysiwyg.html">WYSIWYG</a>  </li>
                    <li> <a href="form-wizard.html">Wizard &amp; File Upload</a>  </li>
                  </ul>
                </li>
              </ul><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="search-bar">
            <form class="main-search" action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Live Search ...">
                <span class="input-group-btn">
            <button class="btn btn-primary btn-sm text-muted" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span> 
              </div>
            </form><!-- /.main-search -->
          </div><!-- /.search-bar -->
          <div class="main-bar">
            <h3>
              <i class="fa fa-gamepad"></i>&nbsp; Buttons</h3>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->
      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif">
              <span class="label label-danger user-label">16</span> 
            </a> 
            <div class="media-body">
              <h5 class="media-heading">Archie</h5>
              <ul class="list-unstyled user-info">
                <li> <a href="">Administrator</a>  </li>
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small> 
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="">
            <a href="dashboard.html">
              <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span> 
            </a> 
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-building "></i>
              <span class="link-title">Layouts</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Boxed Layout </a> 
              </li>
              <li>
                <a href="fixed-header-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Boxed Layout &amp; Fixed Header </a> 
              </li>
              <li>
                <a href="fixed-header-fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header and Fixed Mini Menu </a> 
              </li>
              <li>
                <a href="fixed-header-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header &amp; Menu </a> 
              </li>
              <li>
                <a href="fixed-header-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header &amp; Mini Menu </a> 
              </li>
              <li>
                <a href="fixed-header.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header </a> 
              </li>
              <li>
                <a href="fixed-menu-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Boxed Layout &amp; Fixed Menu </a> 
              </li>
              <li>
                <a href="fixed-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Menu </a> 
              </li>
              <li>
                <a href="fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed &amp; Mini Menu </a> 
              </li>
              <li>
                <a href="fxhmoxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Boxed and Fixed Header &amp; Nav </a> 
              </li>
              <li>
                <a href="no-header-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Header &amp; Sidebars </a> 
              </li>
              <li>
                <a href="no-header.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Header </a> 
              </li>
              <li>
                <a href="no-left-right-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Left &amp; Right Sidebar </a> 
              </li>
              <li>
                <a href="no-left-sidebar-main-search.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Left Sidebar &amp; Main Search </a> 
              </li>
              <li>
                <a href="no-left-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Left Sidebar </a> 
              </li>
              <li>
                <a href="no-main-search.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Main Search </a> 
              </li>
              <li>
                <a href="no-right-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Right Sidebar </a> 
              </li>
              <li>
                <a href="sm.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Mini Sidebar </a> 
              </li>
            </ul>
          </li>
          <!-- <li class="active"> -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span class="link-title">Components</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="bgcolor.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Bg Color </a> 
              </li>
              <li>
                <a href="bgimage.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Bg Image </a> 
              </li>
              <li>
                <a href="button.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Buttons </a> 
              </li>
              <li>
                <a href="icon.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Icon </a> 
              </li>
              <li>
                <a href="pricing.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Pricing Table </a> 
              </li>
              <li>
                <a href="progress.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Progress </a> 
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-pencil"></i>
              <span class="link-title">
            Forms
	  </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="form-general.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form General </a> 
              </li>
              <li>
                <a href="form-validation.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form Validation </a> 
              </li>
              <li>
                <a href="form-wizard.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form Wizard </a> 
              </li>
              <li>
                <a href="form-wysiwyg.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form WYSIWYG </a> 
              </li>
            </ul>
          </li>
          <li>
            <a href="table.html">
              <i class="fa fa-table"></i>
              <span class="link-title">Tables</span> 
            </a> 
          </li>
          <li>
            <a href="file.html">
              <i class="fa fa-file"></i>
              <span class="link-title">
      File Manager
          </span> 
            </a> 
          </li>
          <li>
            <a href="typography.html">
              <i class="fa fa-font"></i>
              <span class="link-title">
            Typography
          </span>  </a> 
          </li>
          <li>
            <a href="maps.html">
              <i class="fa fa-map-marker"></i><span class="link-title">
            Maps
          </span> 
            </a> 
          </li>
          <li>
            <a href="chart.html">
              <i class="fa fa fa-bar-chart-o"></i>
              <span class="link-title">
            Charts
          </span> 
            </a> 
          </li>
          <li>
            <a href="calendar.html">
              <i class="fa fa-calendar"></i>
              <span class="link-title">
            Calendar
          </span> 
            </a> 
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-exclamation-triangle"></i>
              <span class="link-title">
              Error Pages
            </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="403.html">
                  <i class="fa fa-angle-right"></i>&nbsp;403</a> 
              </li>
              <li>
                <a href="404.html">
                  <i class="fa fa-angle-right"></i>&nbsp;404</a> 
              </li>
              <li>
                <a href="405.html">
                  <i class="fa fa-angle-right"></i>&nbsp;405</a> 
              </li>
              <li>
                <a href="500.html">
                  <i class="fa fa-angle-right"></i>&nbsp;500</a> 
              </li>
              <li>
                <a href="503.html">
                  <i class="fa fa-angle-right"></i>&nbsp;503</a> 
              </li>
              <li>
                <a href="offline.html">
                  <i class="fa fa-angle-right"></i>&nbsp;offline</a> 
              </li>
              <li>
                <a href="countdown.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a> 
              </li>
            </ul>
          </li>
          <li>
            <a href="grid.html">
              <i class="fa fa-columns"></i>
              <span class="link-title">
    Grid
    </span> 
            </a> 
          </li>
          <li>
            <a href="blank.html">
              <i class="fa fa-square-o"></i>
              <span class="link-title">
    Blank Page
    </span> 
            </a> 
          </li>
          <li class="nav-divider"></li>
          <li>
            <a href="login.html">
              <i class="fa fa-sign-in"></i>
              <span class="link-title">
    Login Page
    </span> 
            </a> 
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-code"></i>
              <span class="link-title">Unlimited Level Menu</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a> 
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li>
                    <a href="javascript:;">Level 2  <span class="fa arrow"></span>  </a> 
                    <ul>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li>
                        <a href="javascript:;">Level 3  <span class="fa arrow"></span>  </a> 
                        <ul>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li>
                            <a href="javascript:;">Level 4  <span class="fa arrow"></span>  </a> 
                            <ul>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li> <a href="javascript:;">Level 4</a>  </li>
                    </ul>
                  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
              <li> <a href="javascript:;">Level 1</a>  </li>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a> 
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul><!-- /#menu -->
      </div><!-- /#left -->
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row">
              <div class="col-lg-12">
                <div class="box danger">
                  <header>
                    <div class="icons">
                      <i class="fa fa-building-o"></i>
                    </div>
                    <h5>Default Button</h5>
                    <div class="toolbar">
                      <button class="btn btn-default btn-sm" data-toggle="collapse" data-target="#div1">default</button>
                    </div>
                  </header>
                  <div class="body collapse in" id="div1">
                    <h3>Default Button</h3>
                    <a href="#" class="btn btn-default" name="hannsito" >pedrito</a> 
                    <a href="#" class="btn btn-primary">primary</a> 
                    <a href="#" class="btn btn-danger">danger</a> 
                    <a href="#" class="btn btn-success">success</a> 
                    <a href="#" class="btn btn-info">info</a> 
                    <a href="#" class="btn btn-warning">warning</a> 
                    <a href="#" class="btn btn-metis-1">metis-1</a> 
                    <a href="#" class="btn btn-metis-2">metis-2</a> 
                    <a href="#" class="btn btn-metis-3">metis-3</a> 
                    <a href="#" class="btn btn-metis-4">metis-4</a> 
                    <a href="#" class="btn btn-metis-5">metis-5</a> 
                    <a href="#" class="btn btn-metis-6">metis-6</a> 
                    <hr>
                    <h4>Mini Button</h4>
                    <a href="#" class="btn btn-default btn-xs">default</a> 
                    <a href="#" class="btn btn-primary btn-xs">primary</a> 
                    <a href="#" class="btn btn-danger btn-xs">danger</a> 
                    <a href="#" class="btn btn-success btn-xs">success</a> 
                    <a href="#" class="btn btn-info btn-xs">info</a> 
                    <a href="#" class="btn btn-warning btn-xs">warning</a> 
                    <a href="#" class="btn btn-metis-1 btn-xs">metis-1</a> 
                    <a href="#" class="btn btn-metis-2 btn-xs">metis-2</a> 
                    <a href="#" class="btn btn-metis-3 btn-xs">metis-3</a> 
                    <a href="#" class="btn btn-metis-4 btn-xs">metis-4</a> 
                    <a href="#" class="btn btn-metis-5 btn-xs">metis-5</a> 
                    <a href="#" class="btn btn-metis-6 btn-xs">metis-6</a> 
                    <hr>
                    <h4>Small Button</h4>
                    <a href="#" class="btn btn-default btn-sm">default</a> 
                    <a href="#" class="btn btn-primary btn-sm">primary</a> 
                    <a href="#" class="btn btn-danger btn-sm">danger</a> 
                    <a href="#" class="btn btn-success btn-sm">success</a> 
                    <a href="#" class="btn btn-info btn-sm">info</a> 
                    <a href="#" class="btn btn-warning btn-sm">warning</a> 
                    <a href="#" class="btn btn-metis-1 btn-sm">metis-1</a> 
                    <a href="#" class="btn btn-metis-2 btn-sm">metis-2</a> 
                    <a href="#" class="btn btn-metis-3 btn-sm">metis-3</a> 
                    <a href="#" class="btn btn-metis-4 btn-sm">metis-4</a> 
                    <a href="#" class="btn btn-metis-5 btn-sm">metis-5</a> 
                    <a href="#" class="btn btn-metis-6 btn-sm">metis-6</a> 
                    <hr>
                    <h4>Large Button</h4>
                    <a href="#" class="btn btn-default btn-lg">default</a> 
                    <a href="#" class="btn btn-primary btn-lg">primary</a> 
                    <a href="#" class="btn btn-danger btn-lg">danger</a> 
                    <a href="#" class="btn btn-success btn-lg">success</a> 
                    <a href="#" class="btn btn-info btn-lg">info</a> 
                    <a href="#" class="btn btn-warning btn-lg">warning</a> 
                    <a href="#" class="btn btn-metis-1 btn-lg">metis-1</a> 
                    <a href="#" class="btn btn-metis-2 btn-lg">metis-2</a> 
                    <a href="#" class="btn btn-metis-3 btn-lg">metis-3</a> 
                    <a href="#" class="btn btn-metis-4 btn-lg">metis-4</a> 
                    <a href="#" class="btn btn-metis-5 btn-lg">metis-5</a> 
                    <a href="#" class="btn btn-metis-6 btn-lg">metis-6</a> 
                  </div><!-- /.body -->
                </div><!-- /.box -->
              </div><!-- /.col-lg-12 -->


            </div><!-- /.row -->
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->

    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p>2014 &copy; Metis Bootstrap Admin Template</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- MetisMenu -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <!-- Screenfull -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>

    <!-- Metis core scripts -->
    <script src="assets/js/core.min.js"></script>

    <!-- Metis demo scripts -->
    <!-- <script src="assets/js/app.js"></script> -->
    <script type="text/javascript">
      ;(function ($, Metis) {
          var $button = $('.inner a.btn');
          Metis.metisButton = function () {
              $.each($button, function () {
                  $(this).popover({
                      placement: 'bottom',
                      // title: this.innerHTML,
                      // content: this.outerHTML,
                      content: this.name,
                      trigger: Metis.isTouchDevice ? 'touchstart' : 'hover'
                  });
              });
          };
          return Metis;
      })(jQuery, Metis || {});
    </script>
    <script>
      $(function() {
        Metis.metisButton();
      });
    </script>
    <script src="assets/js/style-switcher.min.js"></script>
  </body>