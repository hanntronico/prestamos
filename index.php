<!doctype html>
<html class="no-js">

<?php include 'head.php'; ?>

<body class="login">

          <div class="form-signin" style="background-color: #E1E1E1 ;">
    <div class="text-center">
        <!-- <img src="assets/img/logo.png" alt="Metis Logo"> -->
        <div style="font-size:30px;">
            PRESTACIX
        </div>
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="login.php" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center">
                    Ingrese su Usuario y password
                </p>
                <input type="text" name="login" placeholder="Usuario" class="form-control top">
                <input type="password" name="password" placeholder="Password" class="form-control bottom">
                <div class="checkbox">
                    <br>
<!-- 		  <label>
		    <input type="checkbox"> Remember Me
		  </label> -->
		        </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div>
    </div><br>
<!--     <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div> -->
  </div>


    <!--jQuery -->
    <script src="assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>

</html>
