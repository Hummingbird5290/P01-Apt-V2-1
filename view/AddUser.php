<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">สร้าง User Name</h3>
      </div>   
      <!-- form start -->
      <form role="form" name="AddUser" action="" method="post" >
       <br>
      
      <?php
            require("controllers/UserCls.php");
            
            $User = new User();
            
            if (isset($_REQUEST['submit'])) { 
              extract($_REQUEST); 
              if(!isset($_SESSION)) 
                  { 
                      session_start(); 
                  } 
                $user =$_SESSION['Username'];     
                $result = $User->reg_user( $Name, $FullName,$Password ,$Email,$CardId);
                if ($result) {
                  // Registration Success
                  //  header("location:oop_log_tuts/home.php");
                  echo "<div class='col-md-2'></div><div class='col-md-8'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    การบันทึกผู้เข้าใช้สำเร็จ
                  </div></div><div class='col-md-2'></div><br>";
                  
                } else {
                    // Registration Failed 
                    echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><div class='col-md-2'></div><br>";
                }
            }
            //session_destroy();
            //session_unset();
          ?>         
        <div class="box-body">       
          <div class="col-md-2">
          </div>
          <div class="col-md-8">          
            
            <div class="col-md-12">
              <div class="form-group">
                <label for="ชื่อผู้ใช้">ชื่อผู้ใช้</label>
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user-plus"></i></div>
                <input type="input" class="form-control" name="Name" placeholder="ชื่อผู้ใช้" required>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Password</label>
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" class="form-control" name="Password" placeholder="Password" required>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="ชื่อ-นามสกุล">ชื่อ-นามสกุลชื่อ</label> 
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>               
                <input type="input" class="form-control" name="FullName" placeholder="ชื่อ-นามสกุล" required>  
                </div>            
              </div>
            </div>            
            <div class="col-md-12">
              <div class="form-group">
                <label for="อีเมลล์">อีเมลล์</label>
                 <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                <input type="Email" class="form-control" name="Email" placeholder="อีเมลล์" required>
                </div>
              </div>
            </div> 
            <div class="col-md-12">
              <div class="form-group">
                <label for="รหัสบัตรประชาชน">รหัสบัตรประชาชน</label>
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                <input type="input" class="form-control" name="CardId" placeholder="รหัสบัตรประชาชน" data-inputmask='"mask": "9-9999-99-999-99-9"' data-mask required>
                </div>
              </div>
            </div>

            </div>               
            <div class="col-md-2">
          </div>
                    
        </div>       
        <!-- /.box-body -->
        <div class="box-footer">        
          <center><button type="submit" name="submit" value="AddUser" class="btn btn-primary">บันทึก</button></center>
        </div>
      </form>
    </div>
    <!-- /.box -->
  
    
