<div class="row">

<?php
 echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> การเปลี่ยนแปลงสถานะห้อง !!!</h4>
                          คือการเปลี่ยนแปลงเพื่อให้สถานะบิล เพื่อให้สามารถพิมพ์ได้อีกครั้งหรือแก้ไขค่าต่างๆ ที่ต้องการหลังจากที่ยืนยันไปแล้ว หรือยกเลิกการออกบิล</div></div><br>";

    echo "<div class=\"col-md-8\">        
        <div class=\"box box-primary\">
            <div class=\"box-header with-border\">
                <h3 class=\"box-title\">เลือกห้องที่ต้องการ</h3>
            </div>  
        <div class=\"box-body\">   
            <div class=\"col-md-12\">        
                <div class=\"box-body table-responsive no-padding\">
                    <table id=\"myTableRoomStatusOut\" class=\"table table-bordered table-striped table-hover\">
                        <thead>
                            <tr>
                            <th>
                                <div align=\"center\">ห้อง</div>
                            </th>
                            <th>
                                <div align=\"center\">ชื่อ-นามสกุล</div>
                            </th>
                            <th>
                                <div align=\"center\">ประเภทห้อง</div>
                            </th>
                            <th>
                                <div align=\"center\">สถานะห้องพัก</div>
                            </th>
                            <!--<th>
                                <div align=\"center\">สถานะการจ่าย</div>
                            </th>-->
                            <th>
                                <div align=\"center\">เลือก</div>
                            </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>
                                <div align=\"center\">ห้อง</div>
                            </th>
                            <th>
                                <div align=\"center\">ชื่อ-นามสกุล</div>
                            </th>
                            <th>
                                <div align=\"center\">ประเภทห้อง</div>
                            </th>
                            <th>
                                <div align=\"center\">สถานะห้องพัก</div>
                            </th>
                            <!--<th>
                                <div align=\"center\">สถานะการจ่าย</div>
                            </th>-->
                            <th>
                                <div align=\"center\">เลือก</div>
                            </th>
                            </tr>
                        </tfoot>
                    </table>   
                </div> 
            </div>
        </div>     
        <div class=\"box-footer\"> 
        </div></div></div>";

 ?>

<div class="col-md-4">
<?php
require_once("controllers/RoomCls.php"); 
require_once("controllers/ContractCls.php"); 
require_once("controllers/CreateCustomerCls.php");           
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
  if (isset($_GET['brid'])){$brid = $_GET['brid']; }
  if (isset($_SESSION['Uid']  )){$User = $_SESSION['Uid']  ; } 
  
 echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > ";
  //Edit status 
  if($flag=="Save" )
    {  
      $Room = new Room();
      $Contract = new Contract();
      $Customer = new Customer();
      $ObjRom = $Room->GetRoom($Id);
      $RoId = $ObjRom->Id; 
      $RoNo = $ObjRom->Room_No;
      $RoTy = $ObjRom->RoomType_Id;
      $RoSt = $ObjRom->Status_Room;
      $ObjCoT = $Contract->GetContractByRoomId($RoId);
      $CusId = $ObjCoT->Customer_id;
      $FullName = $Customer->GetCustomerFullName($CusId);

      $ObjRoTy = $Room->GetRoomTypeBy($RoTy);     
      $RoTy = $ObjRoTy->RoomType;
      $RoTyDe = $ObjRoTy->RoomDetail;
      $RoTyRa = $ObjRoTy->Room_Rates;
      echo "<form role=\"form\" name=\"CreateRoomType\" action=\"\" method=\"post\" > 
          <!-- general form elements -->
          <div class=\"box box-info\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">เปลี่ยนแปลงสถานะ</h3>
                      <div class=\"box-tools pull-right\">
                        <div class=\"btn-group\">                  
                          
                        </div>                    
                          <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                          <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                      </div>                    
            </div>";      
            //echo $Id;  
                  if (isset($_REQUEST['UpdateRoomType'])) { 
                    extract($_REQUEST); 
                    //session_start();
                    //$ids=4;
                    $user =$_SESSION['Username']; 
                    if($RoomStatus==0 or $RoomStatus == null)
                    {
                        echo "<br><div class='col-md-12'><div class='alert callout callout-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                          กรุณาเลือกสถานะห้อง</div></div><br>";
                    }else 
                    {
                    $result = $Room->UpdateBillStatus($brid,$RoomStatus);                    
                      if ($result) 
                      {                   
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
              <div class=\"col-md-12\">                              
                    <label for=\"เลขที่ห้อง\">เลือกสถานะ</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-qrcode\"></i></div>                          
                          <select class=\"form-control\" name = \"RoomStatus\" required >";
                              echo "<option value='0'>กรุณาเลือกห้อง</option>";
                              $Obj = $Room->GetBillStatus();
                              $count_row = $Obj->num_rows; 
                              if($count_row){                          
                                foreach($Obj as $row)
                                  { 
                                    echo "<option value=$row[Id]> $row[RoomStatusDetail]</option>";
                                  }
                                } 
                              else {echo "<option value='0'>ไม่มีข้อมูลห้องพัก</option>";}
                            
                   echo "</select> 
                      </div>                
                </div>
                <div class=\"col-md-12\">                              
                    <label for=\"เลขที่ห้อง\">เลขที่ห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-qrcode\"></i></div>              <input type=\"input\" class=\"form-control\" name=\"RoomType\" value=\"$RoNo\" placeholder=\"ตัวอย่าง mr. nametest lasttest\" required Disabled> 
                      </div>                
                </div>
                <div class=\"col-md-12\">                              
                    <label for=\"ชื่อ-นามสกุล\">ชื่อ-นามสกุล</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-user\"></i></div>
                          <input type=\"input\" class=\"form-control\" name=\"RoomType\" value=\"$FullName\" placeholder=\"ตัวอย่าง mr. nametest lasttest\" required Disabled> 
                      </div>                
                </div>   
              <div class=\"col-md-12\">                              
                    <label for=\"คำนำ\">ประเภทห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bed\"></i></div>
                          <input type=\"input\" class=\"form-control\" name=\"RoomType\" value=\"$RoTy\" placeholder=\"ตัวอย่าง ห้องพิเศษ\" required Disabled> 
                      </div>                
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">คำอธิบาย</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa  fa-clipboard\"></i></div>
                            <input type=\"input\" class=\"form-control\" name=\"RoomDetail\" value=\"$RoTyDe\" placeholder=\"ตัวอย่าง แอร์ ขนาด 25Q\" required Disabled> 
                      </div>   
                </div>
                <div class=\"col-md-12\">              
                      <label for=\"คำนำ\">ค่าห้อง</label>
                      <div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"fa fa-bitcoin\"></i></div>
                            <input type=\"number\" class=\"form-control\" name=\"RoomRates\" value=\"$RoTyRa\" placeholder=\"ตัวอย่าง 5000\" required Disabled> 
                      </div>   
                </div>              
              </div>  
              <!-- /.box-body -->
              <div class=\"box-footer\"> 
                <center><button type=\"UpdateRoom\" name=\"UpdateRoomType\" value=\"UpdateRoomTye\" class=\"btn btn-success  btn-flat\" onclick=\"return  confirm('!!!ต้องการเปลี่ยนแปลงสถานะห้องหรือไม่')\">เปลี่ยนแปลงสถานะห้อง</button>
                 
                  </center>
              </div>
            </div>
            <!--table-->
      </form>"; }

    }
  
   echo "</form>"; 
    
?>
</div>


 </div>
 <!--row-->
  

  