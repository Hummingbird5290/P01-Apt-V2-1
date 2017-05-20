<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">สร้าง User Name</h3>
      </div>   
      <?php
      try {
      if(!isset($_SESSION)) 
                  { 
                      session_start(); 
                  } 
                $Uid = $_SESSION['Uid'];
                $Name = $_SESSION['Username']; 
                $Email = $_SESSION['UserEmail']; 
                $Fullname = $_SESSION['UserFullname'];
                $Cardid = $_SESSION['CardId'];
                //echo $user;
      } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
      ?>
      <!-- form start -->
      <form role="form" name="Update" action="" method="post" >
       <br>
      
      <?php
      try {
            require("controllers/UserCls.php");
            
            $User = new User();
            echo "$Uid";
            if (isset($_REQUEST['Update'])) { 
                extract($_REQUEST);                 
                $result = $User->EditProfile( $Name, $FullName,$Password ,$Email,$CardId,$Uid);
                //echo "$result";                
                if ($result) {
                  // update Success
                $_SESSION['Username'] = $Name; 
                $_SESSION['UserEmail'] = $Email; 
                $_SESSION['UserFullname'] = $FullName;
                $_SESSION['CardId'] = $CardId;  
                  echo "<div class='col-md-2'></div><div class='col-md-8'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    กรุณา LogOut เพื่อเข้าใช้งานใหม่
                  </div></div><div class='col-md-2'></div><br>";
                               
                } else {
                    // Registration Failed 
                    echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><div class='col-md-2'></div><br>";
                }
            }
             } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
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
                       <input type="input" class="form-control" name="Name" value="<?php echo $Name;  ?>"  placeholder="ชื่อผู้ใช้" required >  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Password</label>
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" class="form-control" name="Password" value="<?php  echo $Name;  ?>" placeholder="Password" required>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="ชื่อ-นามสกุล">ชื่อ-นามสกุลชื่อ</label> 
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>               
                <input type="input" class="form-control" name="FullName" value="<?php echo $Fullname;  ?>" placeholder="ชื่อ-นามสกุล" required>  
                </div>            
              </div>
            </div>            
            <div class="col-md-12">
              <div class="form-group">
                <label for="อีเมลล์">อีเมลล์</label>
                 <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                <input type="Email" class="form-control" name="Email" value="<?php echo $Email;  ?>" placeholder="อีเมลล์" required>
                </div>
              </div>
            </div> 
            <div class="col-md-12">
              <div class="form-group">
                <label for="รหัสบัตรประชาชน">รหัสบัตรประชาชน</label>
                <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                <input type="input" class="form-control" name="CardId" value="<?php echo $Cardid; ?>" placeholder="รหัสบัตรประชาชน" data-inputmask='"mask": "9-9999-99-999-99-9"' data-mask required>
               
                </div>
              </div>
            </div>

            </div>               
            <div class="col-md-2">
          </div>
                    
        </div>       
        <!-- /.box-body -->
        <div class="box-footer">        
          <center><button type="submit" name="Update" value="EditProfile" class="btn btn-primary">บันทึก</button></center>
        </div>
      </form>
    </div>
    <!-- /.box -->
  
    
