<div class="row">
<?php
 echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> สร้างประเภทห้อง !!!</h4>
                          คือ การสร้างประเภทห้อง เพื่อให้กำหนดค่าห้อง</div></div><br>"; 
?> 
 <!--table all-->
    <div class="col-md-7">
        <!-- general form elements -->
      <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">ประเภทห้องทั้งหมด</h3>
              </div>   
              <!-- form start -->
              <br>    
          <div class="box-body">
              <div class="col-md-12">        
                <div class="box-body table-responsive no-padding">
                  <table id="myTableRoomType" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>
                          <div align="center">รหัส</div>
                        </th>
                        <!--<th>
                          <div align="center">ชื่อ-นามสกุล</div>
                        </th>-->
                        <th>
                          <div align="center">ประเภทห้อง</div>
                        </th>
                        <th>
                          <div align="center">สถานะห้องพัก</div>
                        </th>
                        <th>
                          <div align="center">ราคา</div>
                        </th>
                        <th>
                          <div align="center">เลือก</div>
                        </th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>
                          <div align="center">รหัส</div>
                        </th>
                        <!--<th>
                          <div align="center">ชื่อ-นามสกุล</div>
                        </th>-->
                        <th>
                          <div align="center">ประเภทห้อง</div>
                        </th>
                        <th>
                          <div align="center">สถานะห้องพัก</div>
                        </th>
                        <th>
                          <div align="center">ราคา</div>
                        </th>
                        <th>
                          <div align="center">เลือก</div>
                        </th>
                      </tr>
                    </tfoot>
                  </table>   
                </div> 
              </div> 
              <!--<div class="col-md-2"></div>-->
            <div class="box-footer">        
              <!--<center><button type="submit" name="submit" value="CreateBook" class="btn btn-primary">บันทึก</button></center>-->
              </div>
            </div>
        </div>
    </div>

<div class="col-md-5">
<?php
require_once("controllers/RoomCls.php");           
$Room = new Room();
$Id=0;
$flag = null;
if(!isset($_SESSION)) 
{ 
  session_start(); 
}           
if (isset($_GET['flag']))
{ 
  $flag = $_GET['flag'];
  if (isset($_GET['id'])){$Id = $_GET['id']; }  
  //Create room type 
  
  if($flag=="Create" )
    {  
      echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > 
          <!-- general form elements -->
          <div class=\"box box-info\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">สร้างประเภทห้องพัก</h3>
                      <div class=\"box-tools pull-right\">
                        <div class=\"btn-group\">                 
                         
                        </div>                    
                          <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                          <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                      </div>                    
            </div>";        
                  if (isset($_REQUEST['SubmitSaveRoomType'])) { 
                    extract($_REQUEST); 
                    //session_start();
                    $user =$_SESSION['Username']; 
                      $result = $Room->InsertRoomType($RoomType,$RoomDetail,$RoomRates);
                      if ($result) {                   
                        echo "<br><div class='col-md-12'>
                        <div class='alert callout callout-success'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>                    
                        </div></div><br>";
                      } else {                   
                          echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                          กรุณาตรวจสอบข้อมูล</div></div><br>";
                      }
                  }
                  
              echo "<div class=\"box-body\">   
              <div class=\"col-md-12\">                              
                    <label for=\"คำนำ\">ประเภทห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                          <input type=\"input\" class=\"form-control\" name=\"RoomType\" placeholder=\"ตัวอย่าง ห้องพิเศษ\" required> 
                      </div>                
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">คำอธิบาย</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa  fa-clipboard\"></i></div>
                            <input type=\"input\" class=\"form-control\" name=\"RoomDetail\" placeholder=\"ตัวอย่าง แอร์ ขนาด 25Q\" required> 
                      </div>   
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">ค่าห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bitcoin\"></i></div>
                            <input type=\"number\" class=\"form-control\" name=\"RoomRates\" placeholder=\"ตัวอย่าง 5000\" required> 
                      </div>   
                </div>              
              </div>  
              <!-- /.box-body -->
              <div class=\"box-footer\"> 
                <center><button type=\"submit\" name=\"SubmitSaveRoomType\" value=\"CreateRoomType\" class=\"btn btn-success btn-block btn-flat\" onclick=\"return  confirm('!!!ต้องการสร้างประเภทห้องพักหรือไม่')\" >สร้างประเภทห้องพัก</button></center>
              </div>
            </div>
            <!--table-->
      </form>";
    }
  //Edit Roomtype 
    else
    {  
      $result = $Room->GetRoomTypeBy($Id);      
      $RoTy = $result->RoomType;
      $RoDe = $result->RoomDetail;
      $RoRa = $result->Room_Rates;
     
      echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > 
          <!-- general form elements -->
          <div class=\"box box-info\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">แก้ไขประเภทห้องพัก</h3>
                      <div class=\"box-tools pull-right\">
                        <div class=\"btn-group\">                  
                          <a href = 'CreateRoomType.php?flag=Create' data-toggle=\"tooltip\" title=\"สร้างห้อง เพื่อทำการเพิ่มห้องพัก\" class=\"btn btn-xs btn-success\">สร้างประเภทห้อง</a>
                        </div>                    
                          <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                          <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                      </div>                    
            </div>";        
                  if (isset($_REQUEST['UpdateRoomType'])) { 
                    extract($_REQUEST); 
                    //session_start();
                    $user =$_SESSION['Username']; 
                    $result = $Room->UpdateRoomtype($Id,$RoomType,$RoomDetail,$RoomRates);
                      if ($result) {                   
                        echo "<br><div class='col-md-12'>
                        <div class='alert callout callout-success'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>                    
                        </div></div><br>";
                      } else {                   
                          echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                          กรุณาตรวจสอบข้อมูล</div></div><br>";
                      }
                  }
                  if (isset($_REQUEST['DelRoomTye'])) { 
                    extract($_REQUEST); 
                    //session_start();
                    $user =$_SESSION['Username']; 
                      $result = $Room->DeleteRoomtype($Id);
                      if ($result) {                   
                        echo "<br><div class='col-md-12'>
                        <div class='alert callout callout-success'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> ลบสำเร็จ!</h4>                    
                        </div></div><br>";
                      } else {                   
                          echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> ลบไม่สำเร็จ!!!</h4>
                          กรุณาตรวจสอบข้อมูล</div></div><br>";
                      }
                  }
                  
              echo "<div class=\"box-body\">   
              <div class=\"col-md-12\">                              
                    <label for=\"คำนำ\">ประเภทห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                          <input type=\"input\" class=\"form-control\" name=\"RoomType\" value=\"$RoTy\" placeholder=\"ตัวอย่าง ห้องพิเศษ\" required > 
                      </div>                
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">คำอธิบาย</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa  fa-clipboard\"></i></div>
                            <input type=\"input\" class=\"form-control\" name=\"RoomDetail\" value=\"$RoDe\" placeholder=\"ตัวอย่าง แอร์ ขนาด 25Q\" required > 
                      </div>   
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">ค่าห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bitcoin\"></i></div>
                            <input type=\"number\" class=\"form-control\" name=\"RoomRates\" value=\"$RoRa\" placeholder=\"ตัวอย่าง 5000\" required > 
                      </div>   
                </div>              
              </div>  
              <!-- /.box-body -->
              <div class=\"box-footer\"> 
                <center><button type=\"UpdateRoom\" name=\"UpdateRoomType\" value=\"UpdateRoomTye\" class=\"btn btn-success  btn-flat\" onclick=\"return  confirm('!!!ต้องการแก้ไขใช่หรือไม่')\">แก้ไขห้อง</button>
                  <button type=\"DelRoom\" name=\"DelRoomTye\" value=\"DelRoomTye\" class=\"btn btn-danger btn-flat\" onclick=\"return  confirm('!!!ต้องการลบใช่หรือไม่')\">ลบ</button>
                  </center>
              </div>
            </div>
            <!--table-->
      </form>"; }

    }
  //Create first page
  else
    {            
      echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > 
          <!-- general form elements -->
          <div class=\"box box-info\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">สร้างประเภทห้องพัก</h3>
                      <div class=\"box-tools pull-right\">
                        <div class=\"btn-group\"> 
                        </div>                    
                          <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                          <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                      </div>                    
            </div>";        
                  if (isset($_REQUEST['SubmitSaveRoomType'])) { 
                    extract($_REQUEST); 
                    //session_start();
                    $user =$_SESSION['Username']; 
                      $result = $Room->InsertRoomType($RoomType,$RoomDetail,$RoomRates);
                      if ($result) {                   
                        echo "<br><div class='col-md-12'>
                        <div class='alert callout callout-success'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>                    
                        </div></div><br>";
                      } else {                   
                          echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                          กรุณาตรวจสอบข้อมูล</div></div><br>";
                      }
                  }
                  
              echo "<div class=\"box-body\">   
              <div class=\"col-md-12\">                              
                    <label for=\"คำนำ\">ประเภทห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                          <input type=\"input\" class=\"form-control\" name=\"RoomType\" placeholder=\"ตัวอย่าง ห้องพิเศษ\" required> 
                      </div>                
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">คำอธิบาย</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa  fa-clipboard\"></i></div>
                            <input type=\"input\" class=\"form-control\" name=\"RoomDetail\" placeholder=\"ตัวอย่าง แอร์ ขนาด 25Q\" required> 
                      </div>   
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">ค่าห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bitcoin\"></i></div>
                            <input type=\"number\" class=\"form-control\" name=\"RoomRates\" placeholder=\"ตัวอย่าง 5000\" required> 
                      </div>   
                </div>              
              </div>  
              <!-- /.box-body -->
              <div class=\"box-footer\"> 
                <center><button type=\"submit\" name=\"SubmitSaveRoomType\" value=\"CreateRoomType\" class=\"btn btn-success btn-block btn-flat\" onclick=\"return  confirm('!!!ต้องการสร้างประเภทห้องพักหรือไม่')\" >สร้างประเภทห้องพัก</button></center>
              </div>
            </div>
            <!--table-->
      </form>"; 
    }
?>
</div>

</div>
 <!--</div>row-->
  

  