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

  function fnccheck3() {
    var t1;
    var t2;
    var sum;
    t1 = parseInt(document.form1.Eletric2_unit.value);
    t2 = parseInt(document.form1.Eletric2_unitEnd.value);
    if (t2 < t1) {
      alert('เกิดข้อผิดพลาด กรุณาตรวจสอบข้อมูล!!!');
      document.form1.Eletric2_unitEnd.focus();
    }
    return false;
  }
</script>
<div class="row">
<?php  echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4><i class='icon fa fa-ban'></i> บันทึกค่าใช้จ่าย !!!</h4>
        คือการบันทึกค่าใช้จ่ายต่างๆ ของแต่ละห้อง เพื่อคำนวณค่าห้องของแต่ละเดือน และออกบิลต่อไป</div></div><br>";
?>
  <?php 
    require("controllers/SumconfigCls.php");
    $Configtype = new sumconfigallHm();
    if(!isset($_SESSION)){ 
        session_start(); 
    }
      $Billid=null;
      $flag=null;
      $Roomid=null;
      $sr=null;
      $ReadOnly=True;
      $rowid = null;
      $_SESSION['RoomId']=null;
    if (isset($_GET['flag'])) {
      if (isset($_GET['bid']))  {$Billid = $_GET['bid'];}
      if (isset($_GET['flag'])) {$flag = $_GET['flag'];}
      if (isset($_GET['sr']))   {$sr = $_GET['sr'];} 
      if (isset($_GET['id']))   {$Roomid = $_GET['id']; 
      $_SESSION['RoomId'] = $Roomid;
      $Roomid = $_SESSION['RoomId'];}
      // if (isset($_GET['row']))  {$rowid= $_GET['row'];}
      if (isset($_GET['TyTab']))  {$tytap= $_GET['TyTab'];}

      $unitW = $Configtype->Showdata()->Water;
      $unitE = $Configtype->Showdata()->Electricity;   

      if ($flag == "Edit" or $flag == "Select"or $flag == "Save"){
          $roomnum = $Configtype->Getroom_number($Roomid);
          $Rtype_id = $roomnum->RoomType_Id;  
          $Room_num = $roomnum->Room_No;
          
          $Room_lese = $Configtype->Getpriceroom($Rtype_id)->Room_Rates;                 //ราคาห้อง
          $BillRoomId = $Configtype->GetIdBillRoom($Roomid);
          //echo $BillRoomId;
          $Billid = null;
          $waterlese = $Configtype->GetWaterlese($Billid,$BillRoomId);          //ค่าน้ำ
          $electriclese = $Configtype->GetElectriclese($Billid,$BillRoomId);    //ค่าไฟ
          $forn_lese = $Configtype->GetFornlese($Billid,$BillRoomId);          //ค่าเฟอร์นิเจอร์
          $serv_lese = $Configtype->GetServlese($Billid,$BillRoomId);           //ค่าบริการ
          $phone_lese = $Configtype->GetPhone($Billid,$BillRoomId);             //ค่าโทรศัพท์
          $roomclean = $Configtype->GetRoomclean($BillRoomId);
          $otherdamage = $Configtype->GetOtherdamage($BillRoomId);
          if($sr == 1 and $flag == "Select"){
            if(!empty($forn_lese->Forniture_Lease)){$forn_lese = $forn_lese->Forniture_Lease;}
            if(!empty($serv_lese->Service_Lease)){$serv_lese = $serv_lese->Service_Lease;}
            if(!empty($phone_lese->Phone_Lease)){$phone_lese = $phone_lese->Phone_Lease;}
          }elseif($sr == 1 and $flag == "Edit"){
            $forn_lese = $Configtype->GetFornlese($Billid,$BillRoomId)->Forniture_Lease;            //ค่าเฟอร์นิเจอร์
            $serv_lese = $Configtype->GetServlese($Billid,$BillRoomId)->Service_Lease;             //ค่าบริการ
            $phone_lese = $Configtype->GetPhone($Billid,$BillRoomId)->Phone_Lease;              //ค่าโทรศัพท์
          }elseif($sr == 4){
            if(!empty($roomclean->Roomclean_Lease)){$room_clean = $roomclean->Roomclean_Lease;}
            if(!empty($otherdamage->Damage_Lease)){$other_damage = $otherdamage->Damage_Lease;
           }     
          }
        if ($flag == "Select"or $flag == "Save"){
            $checkrow = $Configtype->CheckMonthNow($Roomid); //Check month now
            //echo $checkrow;
            if($checkrow == TRUE){
               $checkrow = $Configtype->GetFirstExpen($Roomid); //Check month frist : ถ้าไม่มีการกรอกค่าห้องมาก่อนเลยไม่ต้องโชว์ค่าให้
              //echo $checkrow;                
              if($checkrow == FALSE){ 
                $ReadOnly=FALSE;
                $waterunit= $waterlese->Water_Unit_End;
                $waterunitEnd =$waterunit;
                $electricity_unit = $electriclese->Electricity_Unit_End;
                //echo $eletricunit;
                $electricity_unitEnd = $electricity_unit;
                $electricity2_unit = $electriclese->Electricity2_Unit_End;
                $electricity2_unitEnd = $electricity2_unit; 
                //echo $Roomid;
                $eletricunit = $electriclese->Electricity_Unit_End;
                //echo $eletricunit ."| " ; 
                $forn_lese = $Configtype->GetFornlese($Billid,$BillRoomId)->Forniture_Lease;            //ค่าเฟอร์นิเจอร์
                $serv_lese = $Configtype->GetServlese($Billid,$BillRoomId)->Service_Lease;             //ค่าบริการ
                $phone_lese = $Configtype->GetPhone($Billid,$BillRoomId)->Phone_Lease;              //ค่าโทรศัพท์
              }              
            }else{
              $waterunit = $waterlese->Water_Unit;
              $waterunitEnd = $waterlese->Water_Unit_End;
              $electricity_unit = $electriclese->Electricity_Unit;
              $electricity_unitEnd = $electriclese->Electricity_Unit_End;
              $electricity2_unit = $electriclese->Electricity2_Unit;
              $electricity2_unitEnd = $electriclese->Electricity2_Unit_End;
                //echo $Roomid;
              $eletricunit = $electriclese->Electricity_Unit_End;
              //echo $eletricunit ."|| " ; 
            }
          }
          else{
              $waterunit = $waterlese->Water_Unit;
              $waterunitEnd = $waterlese->Water_Unit_End;
              $electricity_unit = $electriclese->Electricity_Unit;
              $electricity_unitEnd = $electriclese->Electricity_Unit_End;
              $electricity2_unit = $electriclese->Electricity2_Unit;
              $electricity2_unitEnd = $electriclese->Electricity2_Unit_End;
              $eletricunit = $electriclese->Electricity_Unit_End;
          }
      }

      if ($flag == "Delete"){
        $clicktype = "delete";
        $result = $Configtype->DeleteOtherexpenbill($Roomid,$tytap);
         //echo $result;
        if ($result) {
            echo "<div class='col-md-12'></div>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> ลบข้อมูลสำเร็จ!</h4>ลบข้อมูลพิมพ์ใบอื่นๆสำเร็จ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'></div><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> ลบข้อมูลไม่สำเร็จ!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
             }
      }            
    } 
    if (isset($_REQUEST['submit'])) { 
           $namelog = $_SESSION['Uid'];
           $BillNo = $Configtype->Getmaxbill();
           $Eletric_unit = $_REQUEST['Eletric_unit'];
           $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
           $Eletric2_unit = $_REQUEST['Eletric2_unit'];
           $Eletric2_unitEnd = $_REQUEST['Eletric2_unitEnd'];
           $Water_unit = $_REQUEST['Water_unit'];
           $Water_unitEnd = $_REQUEST['Water_unitEnd'];
           $Roomcleanlese = $_REQUEST['Room_Clean'];
           $Damagelese = $_REQUEST['Other_Damage'];
           $clicktype = "submit";
           $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
           $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
           $sumeletric2 = ($Eletric2_unitEnd - $Eletric2_unit) * $unitE;
           $total =  $sumwater + $sumeletric + $sumeletric2 + $Roomcleanlese + $Damagelese  ;
           $result = $Configtype->Save_expenroomother($Roomid,$BillNo,$Eletric_unit,$Eletric_unitEnd,
           $Eletric2_unit,$Eletric2_unitEnd,$Water_unit,$Water_unitEnd,$Roomcleanlese,$Damagelese,$sumwater,
           $sumeletric,$sumeletric2,$total,$namelog,$clicktype);
         if ($result) {
            echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ(แจ้งออก)!</h4>บันทึกพิมพ์ใบแจ้งหนี้อื่นๆ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ(แจ้งออก)!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
             }
    } 
    if (isset($_REQUEST['edit'])){
      $namelog = $_SESSION['Uid'];
      $BillNo = $Configtype->Getmaxbill();
      $Eletric_unit = $_REQUEST['Eletric_unit'];
      $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
      $Eletric2_unit = $_REQUEST['Eletric2_unit'];
      $Eletric2_unitEnd = $_REQUEST['Eletric2_unitEnd'];
      $Water_unit = $_REQUEST['Water_unit'];
      $Water_unitEnd = $_REQUEST['Water_unitEnd'];
      $Roomcleanlese = $_REQUEST['Room_Clean'];
      $Damagelese = $_REQUEST['Other_Damage'];
      $clicktype = "edit";
      $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
      $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
      $sumeletric2 = ($Eletric2_unitEnd - $Eletric2_unit) * $unitE;
      $total =  $sumwater + $sumeletric + $sumeletric2 + $Roomcleanlese + $Damagelese  ;
      $result = $Configtype->Save_expenroomother($Roomid,$BillNo,$Eletric_unit,$Eletric_unitEnd,
      $Eletric2_unit,$Eletric2_unitEnd,$Water_unit,$Water_unitEnd,$Roomcleanlese,$Damagelese,$sumwater,
      $sumeletric,$sumeletric2,$total,$namelog,$clicktype);
      //echo $result;
      if ($result) {
            echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>บันทึกแก้ไขพิมพ์ใบอื่นๆสำเร็จ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
             }
    }  
    if (isset($_REQUEST['Delete'])){
        $clicktype = "delete";
        $result = $Configtype->DeleteOtherexpenbill($Roomid);
        //echo $result;
        if ($result) {
            echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> ลบข้อมูลสำเร็จ!</h4>บันทึกพิมพ์ใบแจ้งหนี้อื่นๆ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> ลบข้อมูลไม่สำเร็จ!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
             }
      }        
    if (isset($_REQUEST['Save_sr1'])) {
           $namelog = $_SESSION['Uid'];
           $BillNo = $Configtype->Getmaxbill();
           $Eletric_unit = $_REQUEST['Eletric_unit'];
           $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
           $Eletric2_unit = $_REQUEST['Eletric2_unit'];
           $Eletric2_unitEnd = $_REQUEST['Eletric2_unitEnd'];
           $Water_unit = $_REQUEST['Water_unit'];
           $Water_unitEnd = $_REQUEST['Water_unitEnd'];
           $fonniture_Lease = $_REQUEST['FornLease'];
           $sevice_Lease = $_REQUEST['ServLese'];
           $phone_Lease = $_REQUEST['PhoneLese'];
           $clicktype = "submit";
           $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
           $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
           $sumeletric2 = ($Eletric2_unitEnd - $Eletric2_unit) * $unitE;
           $total = $Room_lese + $fonniture_Lease + $sevice_Lease + $sumwater + $sumeletric + $sumeletric2 + $phone_Lease ;
           
           $result = $Configtype->Save_expenroom($Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,$Eletric2_unit,$Eletric2_unitEnd,$Water_unit,$Water_unitEnd,$fonniture_Lease,$sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$sumeletric2,$total,$namelog,$clicktype);
           
           //echo $Roomid."|".$BillNo."|".$Room_lese."|".$Eletric_unit."|".$Eletric_unitEnd."|".$Eletric2_unit."|".$Eletric2_unitEnd."|".$Water_unit."|".$Water_unitEnd."|".$fonniture_Lease."|".$sevice_Lease."|".$phone_Lease."|".$sumwater."|".$sumeletric."|".$sumeletric2."|".$total."|".$namelog."|".$clicktype;
         
            if ($result) {
              echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>การบันทึกค่าใช้จ่ายสำเร็จ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
            }   
         }
    if(isset($_REQUEST['Edit_sr1'])){
          $namelog = $_SESSION['Uid'];
          $BillNo = $Configtype->Getmaxbill();
          $Eletric_unit = $_REQUEST['Eletric_unit'];
          $Eletric_unitEnd = $_REQUEST['Eletric_unitEnd'];
          $Eletric2_unit = $_REQUEST['Eletric2_unit'];
          $Eletric2_unitEnd = $_REQUEST['Eletric2_unitEnd'];
          $Water_unit = $_REQUEST['Water_unit'];
          $Water_unitEnd = $_REQUEST['Water_unitEnd'];
          $fonniture_Lease = $_REQUEST['FornLease'];
          $sevice_Lease = $_REQUEST['ServLese'];
          $phone_Lease = $_REQUEST['PhoneLese'];
          $clicktype = "edit";
          $sumwater = ($Water_unitEnd - $Water_unit) * $unitW ;
          $sumeletric = ($Eletric_unitEnd - $Eletric_unit ) * $unitE;
          $sumeletric2 = ($Eletric2_unitEnd - $Eletric2_unit) * $unitE;
          $total = $Room_lese + $fonniture_Lease + $sevice_Lease + $sumwater + $sumeletric + $sumeletric2 + $phone_Lease ;
          $result = $Configtype->Save_expenroom($Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,$Eletric2_unit,$Eletric2_unitEnd,$Water_unit,$Water_unitEnd,$fonniture_Lease,$sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$sumeletric2,$total,$namelog,$clicktype);
          //echo $Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,
          // $Eletric2_unit,$Eletric2_unitEnd,$Water_unit,$Water_unitEnd,
          // $fonniture_Lease,$sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$sumeletric2,$total,$namelog,$clicktype;
            if ($result) {
              echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>การบันทึกแก้ไขค่าใช้จ่ายสำเร็จ
              </div></div><br>";  
              
              }else{
                echo "<div class='col-md-12'><div class='alert callout callout-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                กรุณาตรวจสอบข้อมูล</div></div><br>";
              }
          }                
                          
                             
  ?>
  <!--//table-->
    <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">เลือกห้องที่ต้องการทำรายการ</h3>
              </div>
              <div class="box-body">  
              <div class="box-body table-responsive">
              <!--<div class="col-md-12">-->
                <table id="myTable2" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>
                        <div align="center">ห้อง</div>
                      </th>  
                      <th>
                        <div align="center">ประเภทห้อง/สถานะห้องพัก</div>
                      </th>
                      <!--<th>
                        <div align="center" ></div>
                      </th>-->
                      <th>
                    <div align="center" >เงิน</div>
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
                        <div align="center">ประเภทห้อง/สถานะห้องพัก</div>
                      </th>
                      <!--<th>
                        <div align="center">สถานะห้องพัก</div>
                      </th>-->
                      <th>
                        <div align="center">เงิน</div>
                      </th>
                      <th>
                        <div align="center">เลือก</div>
                      </th>
                    </tr>
                  </tfoot>
                </table>
              <!--</div>-->
            </div>              
            </div>
          </div>
    </div>
  <!--//table-->
<?php 
  if ($sr==4){ 
   echo "
    <div class=\"col-md-6\">
        <div class=\"box box-warning\">
          <div class=\"box-header with-border\">
            <h3 class=\"box-title\">รายการพิมพ์ใบแจ้งหนี้อื่นๆ</h3>
          </div>
          <form class=\"form-horizontal\" method=\"post\" name=\"form1\">
              <div class=\"box-body\">   
                <div class=\"form-group\">
                  <label for=\"inputPassword3\" class=\"col-sm-4 control-label\">ห้องพักเลขที่</label>
                  <div class=\"col-sm-6\">     
                    <input type=\"text\" class=\"form-control\" name=\"Numroom\" 
                    value=\"";if (isset($Room_num)){echo "$Room_num";} echo "\" readonly>
                   </div>
                 </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์น้ำเริ่มต้น</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Water_unit\" min=\"0\" id=\"Water_unit\" 
                        onKeyPress=\"if(this.value.length==10) return false;\"
                        value=\""; echo $waterunit ; echo "\" placeholder=\"ระบุตัวเลข\" required>
                    </div>
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์น้ำสิ้นสุด</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Water_unitEnd\" min=\"0\" id=\"Water_unitEnd\"
                        onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                        value=\""; echo $waterunitEnd; echo"\" placeholder=\"ระบุตัวเลข\" required>
                    </div>
                 </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟเริ่มต้น</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Eletric_unit\" min=\"0\" id=\"Eletric_unit\" 
                        onKeyPress=\"if(this.value.length==10) return false;\"
                        value=\""; echo $electricity_unit; echo "\" placeholder=\"ระบุตัวเลข\" required>
                    </div>
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟสิ้นสุด</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Eletric_unitEnd\" min=\"0\" id=\"Eletric_unitEnd\"
                        onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                        value=\"";echo $electricity_unitEnd; echo "\" placeholder=\"ระบุตัวเลข\" required>
                    </div>
                 </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\" style=\"font-size:13.5px;\">มิเตอร์ไฟ2เริ่มต้น</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Eletric2_unit\" min=\"0\" id=\"Eletric2_unit\" 
                        onKeyPress=\"if(this.value.length==10) return false;\"
                        value=\""; if(isset($electricity2_unit)){echo $electricity2_unit;}else{echo "0000";} echo
                         "\"
                        placeholder=\"ระบุตัวเลข\" required>
                    </div>
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟ2สิ้นสุด</label>
                    <div class=\"col-xs-3\">
                        <input type=\"number\" class=\"form-control\" name=\"Eletric2_unitEnd\" min=\"0\" id=\"Eletric2_unitEnd\"
                        onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                        value=\""; if(isset($electricity2_unitEnd)){echo $electricity2_unitEnd;}else{echo "0000";} echo "\" placeholder=\"ระบุตัวเลข\" required>
                    </div>
                 </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\" style=\"font-size:13.5px;\">ค่าปรับสภาพห้อง</label>
                    <div class=\"col-sm-3\"> 
                      <input type=\"number\" name=\"Room_Clean\" id=\"Room_Clean\" class=\"form-control\" 
                      value=\""; if (isset($room_clean)) {echo $room_clean;}else{ echo "0.00";} echo "\" 
                      placeholder=\"ระบุตัวเลข\" required />
                    </div>
                  <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">ค่าเสียหายอื่นๆ</label>
                    <div class=\"col-sm-3\"> 
                      <input type=\"number\" name=\"Other_Damage\" id=\"Other_Damage\"  class=\"form-control\"
                      value=\"";if (isset($other_damage)) {echo $other_damage;}else{ echo "0.00";} echo "\"
                      placeholder=\"ระบุตัวเลข\" required>
                    </div>
                 </div>                      
                <div class=\"form-group\">
                 <center>";                      
                        if ($flag == "Edit"){
                        echo  "<button type=\"submit\" name=\"edit\" value=\"edit\" class=\"btn btn-info  \">แก้ไขข้อมูล</button>
                        <button type=\"Delete\" name=\"Delete\" value=\"Delete\" class=\"btn btn-danger  \" onclick=\"return confirm('ยืนยันลบรายการ!!!')\">ลบ</button>";
                        }else{
                          $checkrow = $Configtype->CheckMonthNow($Roomid); //Check month frist            
                            if($checkrow == false){
                                  echo  "<button type=\"submit\" name=\"edit\" value=\"edit\" class=\"btn btn-info  \">แก้ไขข้อมูล</button>
                                  <button type=\"submit\" name=\"Delete\" value=\"Delete\" class=\"btn btn-danger  \"  onclick=\"return confirm('ยืนยันลบรายการ!!!')\">ลบ</button>";

                            }else{
                                  echo  "<button type=\"submit\" name=\"submit\" value=\"save\" class=\"btn btn-success  \">บันทึกข้อมูล</button>";
                            }
                        } 
                      //   if (isset($_GET['id']))   {
                      //   $detailbillotherexpen = $Configtype->GetId_roombill($Roomid);
                      //   $idroombill = $Configtype->GetId_roombill($Roomid);
                      //     if (isset($idroombill)) {
                      //     $billId = $idroombill->Id;
                      //       if ($detailbillotherexpen == true){
                      //       echo "<a href=\"Formprintinvoice.php?id=$Roomid&bid=$billId&type=5\" 
                      //             onclick=\"window.open(this.href,'window','width=840,height=880,resizable,scrollbars,toolbar,menubar') ;return false;
                      //             \"target=\"_blank\" class=\"btn btn-primary\">พิมพ์</a>";
                      //         }
                      //     }
                      // }
                  echo "</center>
                 </div>               
                <table id=\"myTable3\" class=\"table table-bordered table-striped table-hover\">
                    <thead>
                      <tr>
                        <th>
                            <div align=\"center\">ชื่อรายการ</div>
                        </th>
                        <th>
                          <div align=\"center\">จำนวนเงิน</div>
                        </th>
                         <!--<th>
                             <div align=\"center\"></div>
                         </th>-->
                      </tr>
                    </thead>
                    <!--footer-->
                    <tfoot>
                      <tr>
                        <th>
                            <div align=\"center\">ชื่อรายการ</div>
                        </th>
                        <th>
                          <div align=\"center\">จำนวนเงิน</div>
                        </th>
                        <!--<th>
                             <div align=\"center\"></div>
                         </th>-->
                      </tr>                        
                    </tfoot>
                 </table>                
              
               </div>
           </form>
        </div>
    </div>";
  }
  elseif($sr==1){
    echo "<div class=\"col-md-6\">
      <div class=\"box box-info\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">บันทึกค่าใช้จ่ายประจำห้อง</h3>
        </div>      
        <form class=\"form-horizontal\" method=\"post\" name=\"form2\">
          <div class=\"box-body\">
            <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">ห้องพักเลขที่</label>
                    <div class=\"col-sm-3\">     
                      <input type=\"text\" class=\"form-control\" name=\"Numroom\" 
                      value=\"";if (isset($Room_num)){echo "$Room_num";} echo "\" readonly>                      
                    </div>
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">ค่าเช่าห้องพัก</label>
                    <div class=\"col-sm-3\">     
                      <input type=\"text\" class=\"form-control\" name=\"Roomlese\" 
                      value=\"";if (isset($Room_lese)){echo "$Room_lese";} echo "\" readonly>                      
                    </div>                    
                  </div>
                  <div class=\"form-group\">
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\"  >ค่าเช่าเฟอร์นิเจอร์</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"FornLease\" min=\"0\" id=\"FornLease\" value=\""; if (isset($forn_lese)){echo $forn_lese;}else
                          {echo "0.00";} echo "\" placeholder=\"ระบุตัวเลข\" required>
                      </div>
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">ค่าบริการ</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"ServLese\" min=\"0\" id=\"ServLese\"value=\""; if (isset($serv_lese)){echo $serv_lese;}else
                          {echo "0.00";}  echo"\" placeholder=\"ระบุตัวเลข\" required>
                      </div>
                  </div>
                  <div class=\"form-group\">
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์น้ำเริ่มต้น</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Water_unit\" min=\"0\" id=\"Water_unit\" 
                          onKeyPress=\"if(this.value.length==10) return false;\"
                          value=\""; echo $waterunit ; echo "\" placeholder=\"ระบุตัวเลข\" required ";if ($ReadOnly==false){echo "readonly"; } echo ">
                      </div>
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์น้ำสิ้นสุด</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Water_unitEnd\" min=\"0\" id=\"Water_unitEnd\"
                          onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                          value=\""; echo $waterunitEnd; echo"\" placeholder=\"ระบุตัวเลข\" required>
                      </div>
                  </div>
                  <div class=\"form-group\">
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟเริ่มต้น</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Eletric_unit\" min=\"0\" id=\"Eletric_unit\" 
                          onKeyPress=\"if(this.value.length==10) return false;\"
                          value=\""; echo $electricity_unit; echo "\" placeholder=\"ระบุตัวเลข\" required ";if ($ReadOnly==false){echo "readonly"; } echo ">
                      </div>
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟสิ้นสุด</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Eletric_unitEnd\" min=\"0\" id=\"Eletric_unitEnd\"
                          onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                          value=\"";echo $electricity_unitEnd; echo "\" placeholder=\"ระบุตัวเลข\" required>
                      </div>
                  </div>
                  <div class=\"form-group\">
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\" style=\"font-size:13.5px;\">มิเตอร์ไฟ2เริ่มต้น</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Eletric2_unit\" min=\"0\" id=\"Eletric2_unit\" 
                          onKeyPress=\"if(this.value.length==10) return false;\"
                          value=\""; if(isset($electricity2_unit)){echo $electricity2_unit;}else{echo "0000";} echo
                          "\"
                          placeholder=\"ระบุตัวเลข\" required ";if ($ReadOnly==false){echo "readonly"; } echo ">
                      </div>
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">มิเตอร์ไฟ2สิ้นสุด</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"Eletric2_unitEnd\" min=\"0\" id=\"Eletric2_unitEnd\"
                          onKeyPress=\"if(this.value.length==10) return false;\" Onchange=\"JavaScript:return fnccheck();\" 
                          value=\""; if(isset($electricity2_unitEnd)){echo $electricity2_unitEnd;}else{echo "0000";} echo "\" placeholder=\"ระบุตัวเลข\" required>
                      </div>
                  </div>
                <div class=\"form-group\">
                      <label for=\"inputPassword3\" class=\"col-sm-3 control-label\">ค่าโทรศัพท์</label>
                      <div class=\"col-xs-3\">
                          <input type=\"number\" class=\"form-control\" name=\"PhoneLese\" min=\"0\" value=\"";     
                            if (isset($phone_lese)) {
                            echo $phone_lese ;}else{echo "0.00";} echo "\" placeholder=\"ระบุตัวเลข\" required>
                      </div>                    
                </div>           
          </div>       
          <center>
            <div class=\"box-footer\">";           
              if ($flag == "Edit"){             
              echo  "<button type=\"submit\" name=\"Edit_sr1\" value=\"edit\" class=\"btn btn-success btn-flat \">แก้ไขข้อมูล</button>";
              }else{
                echo  "<button type=\"submit\" name=\"Save_sr1\" value=\"save\" class=\"btn btn-success btn-flat \">บันทึก</button>";
              }   
            echo "</div>
          </center>       
        </form>
      </div>";  
  }
  
?>
 </div>