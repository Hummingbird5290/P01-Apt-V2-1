<!--<script language="javascript" type="text/javascript"> 
            
            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}	 
			}
		</script>-->
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login</b><small>Apartment</small></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">กรอกชื่อและรหัสผ่าน</p>
    <form action="" method="post">
      <!--//controllers/logincls.php-->
      <div class="form-group has-feedback">
        <input type="input" class="form-control" placeholder="ชื่อ" name="emailusername" Required />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" Required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <center>
        <?php
            require("controllers/UserCls.php");
            $user = new User();
            if (isset($_REQUEST['submit'])) { 
              extract($_REQUEST);   
                $login = $user->check_login($emailusername, $password);
                if ($login) {
                  //session_start();
                  // Registration Success 
                  $result = $user->GetUser($emailusername, $password);                         
                  $_SESSION['Login'] = true;
                  $_SESSION['Uid'] = $result->uid;
                  $_SESSION['Username'] = $result->uname;
                  $_SESSION['UserEmail'] = $result->uemail;
                  $_SESSION['UserFullname'] = $result->fullname;
                  $_SESSION['CardId'] = $result->ucardid;
                  $_SESSION['UserGroup'] = $result->ugroup;
                  //echo"$Username";
                  header("location:Backend.php");                  
                } else {
                    // Registration Failed 
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                    รหัสผ่านหรือชื่อไม่ถูกต้อง.
                  </div>";
                }
            }
          ?>
      </center>
      <div class="row">
        <div class="col-xs-8">
          <!--<div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="Login" onclick="return(submitlogin());" class="btn btn-primary btn-block btn-flat">เข้าสู่ระบบ</button>
          <!--<input type="submit" name="submit" value="Login" onclick="return(submitlogin());">-->
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
          </div> /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>
          <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->