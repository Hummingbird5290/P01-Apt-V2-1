<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>   
  </head>
  <body class="login-page" style="background-image: url('dist/img/boxed-bg.jpg')"><!---->
    <?php
    session_start();
    require('view/login.php');
    require('Appstart/buldle.php');
    ?> 
     <!--jQuery 2.1.4 
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <!--<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <!--<script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
    <!--<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>-->
  </body>
</html>
