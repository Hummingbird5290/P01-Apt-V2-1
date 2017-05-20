<div class="row">
<?php
echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกห้องพัก !!!</h4>
                          คือ การสร้างห้องพัก แก้ไข ลบ </div></div><br>"; 
?>
 <!--table all-->
    <div class="col-md-7">
        <!-- general form elements -->
      <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">ห้องพักทั้งหมด</h3>
              </div>   
              <!-- form start -->
              <br>    
          <div class="box-body"> 
              <!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
              <div class="col-md-12">        
                <div class="box-body table-responsive no-padding">
                  <table id="myTableRoom" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>
                          <div align="center">ห้อง</div>
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
                        <!--<th>
                          <div align="center">สถานะการจ่าย</div>
                        </th>-->
                        <th>
                          <div align="center">เลือก</div>
                        </th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>
                          <div align="center">ห้อง</div>
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
                        <!--<th>
                          <div align="center">สถานะการจ่าย</div>
                        </th>-->
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
require("controllers/RoomCls.php");            
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
//Edit room            
  if ($flag=="Edit")
   {  
    //echo $flag;
     if (isset($_GET['id'] ))
            {
               $Id = $_GET['id'];                               
            }   
      $obj = $Room->GetRoom($Id); 
      $Room_No=$obj->Room_No;
            
      echo "
      <form role=\"form\" name=\"UpdateRoom\" action=\"\" method=\"post\" >     
      <div class=\"box box-warning \">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">  แก้ไขห้องพัก</h3>               
                <div class=\"box-tools pull-right\">
                      <div class=\"btn-group\">                  
                        <a href = 'CreateRoom.php?flag=Create' data-toggle=\"tooltip\" title=\"สร้างห้อง เพื่อทำการเพิ่มห้องพัก\" class=\"btn btn-xs btn-success\">สร้างห้องพัก</a>
                        <a href = 'CreateRoom.php?flag=RoomType' data-toggle=\"tooltip\" title=\"สร้างประเภทห้อง เพื่อทำการเพิ่มประเภทห้องห้องพัก\" class=\"btn btn-xs btn-info\">สร้างประเภทห้อง</a>
                      </div>                    
                        <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                        <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                </div>
        </div>";   
        //Update       
              if (isset($_REQUEST['UpdateRoom'])) { 
                extract($_REQUEST);              
                $user =$_SESSION['Username'];
                if($RoomTypeU =="0"){
                    echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกการแก้ไขไม่สำเร็จ!!!</h4>
                        กรุณาเลือกประเภทห้อง</div></div><br>";
                }else { $result = $Room->UpdateRoom($Id,$RoomNOU,$RoomTypeU);
                    if ($result) {    
                      echo "<br><div class='col-md-12'>
                      <div class='alert callout callout-success'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกการแก้ไขสำเร็จ!</h4>                    
                      </div></div><br>";
                      
                    } else {                   
                        echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                        กรุณาตรวจสอบข้อมูล</div></div><br>";
                    }
                  }
                } 
        //Delete
                if (isset($_REQUEST['DelRoom'])) { 
                extract($_REQUEST);              
                $user =$_SESSION['Username'];             
                $result = $Room->DelRoom($Id);
                    if ($result) {    
                      echo "<br><div class='col-md-12'>
                      <div class='alert callout callout-success'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกการแก้ไขสำเร็จ!</h4>                    
                      </div></div><br>";
                      
                    } else {                   
                        echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                        กรุณาตรวจสอบข้อมูล</div></div><br>";
                    }
                  }
                
          //Result                             
          echo "<div class=\"box-body\">  
              <div class=\"col-md-5\">                              
                <label for=\"คำนำ\">เลขที่ห้อง</label>
                    <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                        <input type=\"input\" class=\"form-control\" name=\"RoomNOU\" placeholder=\"เลขที่ห้อง\" 
                        value='";if (isset($flag))
                          { 
                            if ($flag="Edit")
                              {  
                              echo  $Room_No;
                              }
                          }
                      echo "' required> 
                    </div>                
              </div>
            <div class=\"col-md-7\">              
                  <label for=\"คำนำ\">ประเภทห้อง</label>
                  <div class=\"input-group\">
                        <select class=\"form-control\" name=\"RoomTypeU\"  required>
                            <option value='0'>กรุณาเลือกประเภทห้อง</option>";                            
                            if ($flag="Refresh") {                      
                              $Room_Data = $Room->GetRoomType();
                              $count_row = $Room_Data->num_rows; 
                              if($count_row){ 
                                $int =0;                            
                                foreach($Room_Data as $row)
                                { 
                                  $int = $int + 1;
                                  echo "<option value=$row[Id] > $int - $row[RoomType] ( $row[RoomDetail] ) - $row[Room_Rates]฿</option>";
                                }
                                } else 
                                {echo "<option value='0'>ไม่มีข้อมูลประเภทห้อง</option>";} }  
                              
                      echo " </select>                
                </div>
              </div>             
              </div>
          <div class=\"box-footer\">";        
            if (isset($flag))
              { 
                if ($flag="Edit")
                {  
                  echo "<center><button type=\"UpdateRoom\" name=\"UpdateRoom\" value=\"UpdateRoom\" class=\"btn btn-success  btn-flat\" onclick=\"return  confirm('!!!ต้องการแก้ไขห้องพักหรือไม่')\">แก้ไขห้อง</button>
                  <button type=\"DelRoom\" name=\"DelRoom\" value=\"DelRoom\" class=\"btn btn-danger btn-flat\" onclick=\"return  confirm('!!!ต้องการลบห้องพักหรือไม่')\">ลบ</button>
                  </center>"; 
                }            
              } 
          echo "</div>
        </div> </form>" ;
   }
//Create room type 
  elseif($flag=="RoomType")
   {  
    echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > 
        <!-- general form elements -->
        <div class=\"box box-info\">
          <div class=\"box-header with-border\">
            <h3 class=\"box-title\">สร้างประเภทห้องพัก</h3>
                    <div class=\"box-tools pull-right\">
                      <div class=\"btn-group\">                  
                        <a href = 'CreateRoom.php?flag=Create' data-toggle=\"tooltip\" title=\"สร้างห้อง เพื่อทำการเพิ่มห้องพัก\" class=\"btn btn-xs btn-success\">สร้างห้องพัก</a>
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
//Create room new
  else
   {            
     echo "
     <form role=\"form\" name=\"CreateRoom\" action=\"\" method=\"post\" > 
        <div class=\"box box-success\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">สร้างห้องพัก</h3>
                <div class=\"box-tools pull-right\">
                    <div class=\"btn-group\">                  
                      <a href = 'CreateRoom.php?flag=RoomType' data-toggle=\"tooltip\" title=\"สร้างประเภทห้อง เพื่อเพิ่มประเภทของห้องพัก\" class=\"btn btn-xs btn-info\">สร้างประเภทห้อง</a>
                    </div>                    
                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                    <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                  </div>
        </div>"; 
                  
              if (isset($_REQUEST['SubmitSaveRoom'])) { 
                extract($_REQUEST); 
                // if(!isset($_SESSION)) 
                //       { 
                //           session_start(); 
                //       } 
                $user =$_SESSION['Username'];
                if($RoomType =="0"){
                    echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                        กรุณาเลือกประเภทห้อง</div></div><br>";
                }else { $result = $Room->InsertRoom($RoomNO,$RoomType);
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
                }
              
          echo "<div class=\"box-body\">  
              <div class=\"col-md-5\">                              
                <label for=\"คำนำ\">เลขที่ห้อง</label>
                    <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                        <input type=\"input\" class=\"form-control\" name=\"RoomNO\" placeholder=\"เลขที่ห้อง\" value='' required> 
                    </div>                
              </div>
            <div class=\"col-md-7\">              
                  <label for=\"คำนำ\">ประเภทห้อง</label>
                  <div class=\"input-group\">
                        <select class=\"form-control\" name=\"RoomType\"  required>
                            <option value='0'>กรุณาเลือกประเภทห้อง</option>";
                                                                            
                              $Room_Data = $Room->GetRoomType();
                              $count_row = $Room_Data->num_rows; 
                              if($count_row){ 
                                $int =0;                            
                                foreach($Room_Data as $row)
                                { 
                                  $int = $int+1;
                                  echo "<option value=$row[Id] > $int - $row[RoomType] ( $row[RoomDetail] ) - $row[Room_Rates]฿</option>";
                                }
                                } else 
                                {echo "<option value='0'>ไม่มีข้อมูลประเภทห้อง</option>";}   
                              
                        echo "</select>                
                </div>
              </div>             
              </div>  
          <!-- /.box-body -->
          <div class=\"box-footer\"> ";       
                  echo "<center><button type=\"submit\" name=\"SubmitSaveRoom\" value=\"CreateRoom\" class=\"btn btn-success btn-block btn-flat\">สร้างห้อง</button></center>";
            
                    
          echo "</div>
        </div>
      </form>";
   }
}
//Create first page room new
  else
   {            
     echo "
     <form role=\"form\" name=\"CreateRoom\" action=\"\" method=\"post\" > 
        <div class=\"box box-success \">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">สร้างห้องพัก</h3>                
                 <div class=\"box-tools pull-right\">
                    <div class=\"btn-group\">                  
                      <a href = 'CreateRoom.php?flag=RoomType' data-toggle=\"tooltip\" title=\"สร้างประเภทห้อง เพื่อเพิ่มประเภทของห้องพัก\" class=\"btn btn-xs btn-info\">สร้างประเภทห้อง</a>
                    </div>                    
                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                    <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                  </div>
        </div>"; 
                  
              if (isset($_REQUEST['SubmitSaveRoom'])) { 
                extract($_REQUEST); 
                // if(!isset($_SESSION)) 
                //       { 
                //           session_start(); 
                //       } 
                $user =$_SESSION['Username'];
                if($RoomType =="0"){
                    echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                        กรุณาเลือกประเภทห้อง</div></div><br>";
                }else { $result = $Room->InsertRoom($RoomNO,$RoomType);
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
                }
              
          echo "<div class=\"box-body\">  
              <div class=\"col-md-5\">                              
                <label for=\"คำนำ\">เลขที่ห้อง</label>
                    <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                        <input type=\"input\" class=\"form-control\" name=\"RoomNO\" placeholder=\"เลขที่ห้อง\" value='' required> 
                    </div>                
               </div>
              <div class=\"col-md-7\">              
                  <label for=\"คำนำ\">ประเภทห้อง</label>
                    <div class=\"input-group\">
                        <select class=\"form-control\" name=\"RoomType\"  required>
                            <option value='0'>กรุณาเลือกประเภทห้อง</option>"; 
                              $Room_Data = $Room->GetRoomType();
                              $count_row = $Room_Data->num_rows; 
                              if($count_row){ 
                                $int =0;                            
                                foreach($Room_Data as $row)
                                { 
                                  $int = $int+1;
                                  echo "<option value=$row[Id] > $int - $row[RoomType] ( $row[RoomDetail] ) - $row[Room_Rates]฿</option>";
                                }
                                } else 
                                {echo "<option value='0'>ไม่มีข้อมูลประเภทห้อง</option>";} 
                        echo "</select>                
                      </div>
               </div>                       
           </div><!-- /.box-body -->          
          <div class=\"box-footer\"> ";       
                  echo "<center><button type=\"submit\" name=\"SubmitSaveRoom\" value=\"CreateRoom\" class=\"btn btn-success btn-block btn-flat\">สร้างห้อง</button></center>";
           echo "</div>
        </div>
      </form>";
   }
?>
</div>
<!--<div class="row">-->


 <!--</div>row-->
  

  