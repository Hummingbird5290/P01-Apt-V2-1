<div class="col-md-3">
</div>
 <?php 
                   require("controllers/Configcharge.php");  
                   $ConfigC = new config();
                   $Detaildata = $ConfigC->Showdata();
                   if ($Detaildata == ""){
                     $water = null;
                      $eletric = null;
                   }else{
                      $water = $Detaildata->Water;
                   $eletric = $Detaildata->Electricity;
                   }                
                  //  echo "$Detaildata->Water";                
                   if (isset($_REQUEST['submit'])) { 
                     $water = $_POST['numwater'];
                     $eletric = $_POST['numeletric'];                   
                   $Configdetail = $ConfigC->Checktype_config($water,$eletric);
                  //  echo "$Configdetail";
                   if ($Configdetail){
                     echo "<div class=\"alert alert-success alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4>	<i class=\"icon fa fa-check\"></i> Alert!</h4>
                    บันทึก/แก้ไขข้อมูลสำเร็จ.
                  </div>";
                   }else{
                     echo "<div class=\"alert alert-danger  alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4>	<i class=\"icon fa fa-check\"></i> Alert!</h4>
                    กรุณาตรวจสอบการบันทกข้อมูล.
                  </div>";
                   }
                   }
                  ?>
  <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
             <div class="box box-primary">               
                <!-- form start -->
                <form action="" method="post">
                  <div class="box-body">
                  <br>
                  <br>                
      <div class="col-md-6">             
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">เลขมิเตอร์น้ำประปา</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ค่าเลขมิเตอร์น้ำประปา/หน่วย</label>
                      <input type="text" class="form-control" name="numwater"  value="<?php echo "$water" ?>" placeholder="ระบุตัวเลข" required>                    
                    </div>   
                    <br>                
                  </div><!-- /.box-body -->                          
              </div><!-- /.box -->
              </div>

              <div class="col-md-6">             
  <div class="box box-warning ">
                <div class="box-header with-border">
                  <h3 class="box-title">เลขมิเตอร์ไฟฟ้า</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
            
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">ค่าเลขมิเตอร์ไฟฟ้า/หน่วย</label>
                      <input type="text" class="form-control" name="numeletric"  value="<?php echo "$eletric" ?>"  placeholder="ระบุตัวเลข" required>                    
                    </div>   
                    <br>                   
                  </div><!-- /.box-body -->                
              </div><!-- /.box -->
              </div>
<br>
<br>
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                  <center>
                   <button type="submit" name="submit" value="save"  class="btn btn-success btn-block btn-flat">บันทึก</button>
                   
                    </center>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
            </row>
            </section>
  
     
