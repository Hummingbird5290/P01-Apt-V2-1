<script language="javascript">
  function fnccheck() {
    var t1;
    var t2;
    var sum;
    t1 = parseInt(document.form1.Water_unit.value);
    t2 = parseInt(document.form1.Water_unitEnd.value);
    if (t2 < t1) {
      alert('เกิดข้อผิดพลาด กรุณาตรวจสอบข้อมูล!!!');
      document.form1.Water_unitEnd.focus();
    }
    return false;
  }

  function fnccheck2() {
    var t1;
    var t2;
    var sum;
    t1 = parseInt(document.form1.Eletric_unit.value);
    t2 = parseInt(document.form1.Eletric_unitEnd.value);
    if (t2 < t1) {
      alert('เกิดข้อผิดพลาด กรุณาตรวจสอบข้อมูล!!!');
      document.form1.Eletric_unitEnd.focus();
    }
    return false;
  }

</script>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">รายการบันทึกค่าใช้จ่ายของแต่ละห้อง</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <div class="col-md-12">
          <table id="myTable2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>
                  <div align="center">ห้อง</div>
                </th>
                <th>
                  <div align="center">ชื่อ-นามสกุล</div>
                </th>
                <th>
                  <div align="center">ประเภทห้อง</div>
                </th>
                <th>
                  <div align="center">สถานะห้อง</div>
                </th>
                <th>
                  <div align="center">จำนวนเงิน</div>
                </th>
                <th>
                  <div align="center">เลือก</div>
                </th>
              </tr>
            </thead>
            <!--footer-->
            <tfoot>
              <tr>
                <th>
                  <div align="center">ห้อง</div>
                </th>
                <th>
                  <div align="center">ชื่อ-นามสกุล</div>
                </th>
                <th>
                  <div align="center">ประเภทห้อง</div>
                </th>
                <th>
                  <div align="center">สถานะห้อง</div>
                </th>
                <th>
                  <div align="center">จำนวนเงิน</div>
                </th>
                <th>
                  <div align="center">เลือก</div>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <br>
    <?php 
      if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
    ?>

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">บันทึกค่าใช้จ่ายประจำห้อง</h3>
      </div>
      <br>
      <?php             
            require("controllers/SumconfigCls.php");
      $Configtype = new sumconfigallHm();      
      $Billid=null;
      $flag=null;
      $Roomid=null;
      if (isset($_GET['flag'])){
      if (isset($_GET['bid']))  {$Billid = $_GET['bid'];}
      if (isset($_GET['flag'])) {$flag = $_GET['flag'];}
      if (isset($_GET['id']))   {$Roomid = $_GET['id'];}
      
      if ($flag != "Save"){
        $Room_Id = $Configtype->GetId_roombillById($Billid);  //get id bill_room
        $Roomid = $Room_Id->Room_Id;
        } 
                               //get id bill_room}
        $getmynow = FALSE;
        $roomnum = $Configtype->Getroom_number($Roomid);
        $Rtype_id = $roomnum->RoomType_Id;  
        $roomlese = $Configtype->Getpriceroom($Rtype_id);
        $waterlese = $Configtype->GetWaterlese($Billid);
        $electriclese = $Configtype->GetElectriclese($Billid);
        $fornlese = $Configtype->GetFornlese($Billid);
        $servlese = $Configtype->GetServlese($Billid);
        $phonelese = $Configtype->GetPhone($Billid); 
        $cmynow = $Configtype->GetMYNow($Roomid);
        $unitW = $Configtype->Showdata()->Water;
        $unitE = $Configtype->Showdata()->Electricity;

        if(!empty($cmynow->Water_Unit_End)){
          $getmynow = TRUE;
        } 
        if (!empty($electriclese->Electricity_Unit) or !empty($waterlese->Water_Unit) ) {
          $checkrow =$Configtype->GetFirstExpen($Roomid); //Check month frist
          if($checkrow > 1){
            $waterunit= $waterunitEnd ;
            $waterunitEnd ="";
            $eletricunit = $eletricunitEnd;
            $eletricunitEnd = "";
          }else{
            $waterunit = $waterlese->Water_Unit;
            $waterunitEnd = $waterlese->Water_Unit_End;
            $eletricunit = $electriclese->Electricity_Unit;
            $eletricunitEnd = $electriclese->Electricity_Unit_End; 
          }
        }

        $Room_num = $roomnum->Room_No;
        $Room_lese = $roomlese->Room_Rates; 

        if(!empty($fornlese->Forniture_Lease)){
          $forn_lese = $fornlese->Forniture_Lease;
          
          }
        if(!empty($servlese->Service_Lease)){
          $serv_lese = $servlese->Service_Lease;
          }
        if(!empty($phonelese->Phone_Lease)){
          $phone_lese = $phonelese->Phone_Lease;
          }
       
               if (isset($_REQUEST['submit'])) {
                  $namelog = $_SESSION['Uid'];
                  $BillNo = $Configtype->Getmaxbill();
                  $Eletric_unit = $_REQUEST['Eletric_unit'];
                  $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
                  $Water_unit = $_REQUEST['Water_unit'];
                  $Water_unitEnd = $_REQUEST['Water_unitEnd'];
                  $fonniture_Lease = $_REQUEST['FornLease'];
                  $sevice_Lease = $_REQUEST['ServLese'];
                  $phone_Lease = $_REQUEST['PhoneLese'];
                  $clicktype = "submit";
                  $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
                  $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
                  $total = $Room_lese + $fonniture_Lease + $sevice_Lease + $sumwater + $sumeletric + $phone_Lease ;
                  $result = $Configtype->Save_expenroom($Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,$Water_unit,
                 $Water_unitEnd,$fonniture_Lease,$sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$total,$namelog,$clicktype);
                  if ($result) {
                     // Insert Success                   
                  echo "<div class='col-md-2'></div><div class='col-md-8'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    การบันทึกค่าใช้จ่ายสำเร็จ
                  </div></div><div class='col-md-2'></div><br>"; 
                  }else{ // Insert Failed 
                    echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><div class='col-md-2'></div><br>";
                    }
               }
if(isset($_REQUEST['edit'])){
               $namelog = $_SESSION['Uid'];
               $BillNo = $Configtype->Getmaxbill();
               $Eletric_unit = $_REQUEST['Eletric_unit'];
               $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
               $Water_unit = $_REQUEST['Water_unit'];
               $Water_unitEnd = $_REQUEST['Water_unitEnd'];
               $fonniture_Lease = $_REQUEST['FornLease'];
               $sevice_Lease = $_REQUEST['ServLese'];
               $phone_Lease = $_REQUEST['PhoneLese'];
               $clicktype = "edit";
               $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
               $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
               $total = $Room_lese + $fonniture_Lease + $sevice_Lease + $sumwater + $sumeletric + $phone_Lease ;
               $result = $Configtype->Save_expenroom($Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,$Water_unit,
                 $Water_unitEnd,$fonniture_Lease,$sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$total,$namelog,$clicktype);
                if ($result) {
                   echo "<div class='col-md-2'></div><div class='col-md-8'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    การบันทึกแก้ไขค่าใช้จ่ายสำเร็จ
                  </div></div><div class='col-md-2'></div><br>";   
                }else{
                   echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><div class='col-md-2'></div><br>";
                }

               }
}                   
?>
      <form class="form-horizontal" method="post" name="form1">
        <div class="box-body">
          <div class="col-md-1"></div>
          <div class="col-md-10">

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">ห้องพักเลขที่</label>
              <div class="col-sm-10">
                <div class="col-xs-4">
                  <input type="text" class="form-control" name="Numroom" value="<?php if (isset($Room_num)){
                echo " $Room_num ";}?>" readonly>
                </div>
                <label for="inputPassword3" class="col-sm-3 control-label">ค่าเช่าห้องพัก</label>
                <div class="col-xs-4">
                  <input type="text" class="form-control" name="Roomlese" value="<?php if (isset($Room_lese)){
                echo " $Room_lese ";}?>" readonly>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">ค่าเช่าเฟอร์นิเจอร์</label>
              <div class="col-sm-10">
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="FornLease" value="<?php 
               if ($getmynow == true){
                  echo  $forn_lese;
                 }
               else{
                  if (isset($fornlese)) 
                  {echo $forn_lese;}
                  else
                  { echo "0.00";}
                }?>" placeholder="ระบุตัวเลข" required>

                </div>
                <label for="inputPassword3" class="col-sm-3 control-label">ค่าบริการ</label>
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="ServLese" value="<?php 
               if ($getmynow == true){
                echo  $serv_lese;
                 }else{
                if (isset($serv_lese)) {
                echo $serv_lese;}else{ echo "0.00";}}?>" placeholder="ระบุตัวเลข" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">มิเตอร์น้ำเริ่มต้น</label>
              <div class="col-sm-10">
                <div class="col-xs-4">
                  <!--<input type="number" class="form-control" name="Water_unit" value="" placeholder="ระบุตัวเลข" required>-->
                  <input type="number" class="form-control" name="Water_unit" min="0" id="Water_unit" onKeyPress="if(this.value.length==4) return false;"
                    value="<?php echo $waterunit ?>" placeholder="ระบุตัวเลข" required>
                </div>
                <label for="inputPassword3" class="col-sm-3 control-label">มิเตอร์น้ำสิ้นสุด</label>
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="Water_unitEnd" min="0" onKeyPress="if(this.value.length==4) return false;"
                    Onchange="JavaScript:return fnccheck();" value="<?php echo $waterunitEnd ?>" placeholder="ระบุตัวเลข" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">มิเตอร์ไฟเริ่มต้น</label>
              <div class="col-sm-10">
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="Eletric_unit" min="0" onKeyPress="if(this.value.length==4) return false;"
                    value="<?php 
               if ($getmynow == true){
                echo  $eletricunit;
                 }else{
                if (isset($eletricunitEnd)) {
                echo  $eletricunitEnd ;}else{echo " ";}}?>" placeholder="ระบุตัวเลข" required>
                </div>
                <label for="inputPassword3" class="col-sm-3 control-label">มิเตอร์ไฟสิ้นสุด</label>
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="Eletric_unitEnd" min="0" onKeyPress="if(this.value.length==4) return false;"
                    Onchange="JavaScript:return fnccheck2();" value="<?php 
               if ($getmynow == true){
                echo  $eletricunitEnd;
                 }else{
                if (isset($eletricunit)) {
                echo  $eletricunit ;}else{echo " ";}}?>" placeholder="ระบุตัวเลข" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">ค่าโทรศัพท์</label>
              <div class="col-sm-10">
                <div class="col-xs-4">
                  <input type="number" class="form-control" name="PhoneLese" min="0" value="<?php 
               if ($getmynow == true){
                echo  $phone_lese;
                 }else{
                if (isset($phone_lese)) {
                echo  $phone_lese ;}else{echo "0.00";}}?>" placeholder="ระบุตัวเลข" required>
                </div>


              </div>
            </div>
          </div>
          <div class="col-md-1"></div>
        </div>
        <!-- /.box-body -->
        <center>
          <div class="box-footer">
            <?php 
                
            if ($flag == "Edit"){             
             echo  "<button type=\"submit\" name=\"edit\" value=\"edit\" class=\"btn btn-success btn-flat \">แก้ไข</button>";
            }else{
              echo  "<button type=\"submit\" name=\"submit\" value=\"save\" class=\"btn btn-success btn-flat \">บันทึก</button>";
            }           
            ?>
          </div>
        </center>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>