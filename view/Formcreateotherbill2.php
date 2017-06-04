<div class="row">
<?php  echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4><i class='icon fa fa-ban'></i> พิมพ์ใบอื่นๆ !!!</h4>
        คือการออกบิลค่าเสียหายอื่นๆ ของแต่ละห้อง </div></div><br>";
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
      $_SESSION['RoomId']=null;
    if (isset($_GET['flag'])) {
      if (isset($_GET['bid']))  {$Billid = $_GET['bid'];}
      if (isset($_GET['flag'])) {$flag = $_GET['flag'];}
      if (isset($_GET['id']))   {$Roomid = $_GET['id']; 
      $_SESSION['RoomId'] = $Roomid;
      $Roomid = $_SESSION['RoomId'];
      }
      if ($flag == "Select"){
        $roomnum = $Configtype->Getroom_number($Roomid);
        $Rtype_id = $roomnum->RoomType_Id;  
        $Room_num = $roomnum->Room_No;
      }

      if ($flag == "Edit"){
        $detailbillother = $Configtype->GetOtherbillById($Billid);
        $roomnum = $Configtype->Getroom_number($Roomid);
        $Rtype_id = $roomnum->RoomType_Id;  
        $Room_num = $roomnum->Room_No;

        if(!empty($detailbillother->Detail)){
          $Name_bill = $detailbillother->Detail;
         
          }

        if(!empty($detailbillother->Price)){
          $Price_bill = $detailbillother->Price;
          }
      }

      if ($flag == "Delete"){
        $detailbillother = $Configtype->GetOtherbillById($Billid);
        $BillNo = $Configtype->GetMaxOtherbill($Roomid);
        $Namebill = $detailbillother->Detail;
        $Pricebill = $detailbillother->Price; 
        $clicktype = "delete";
        $result = $Configtype->ManageOtherbill($Roomid,$BillNo,$Namebill,$Pricebill,$clicktype,$Billid);
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
         $BillNo = $Configtype->GetMaxOtherbill($Roomid);
         $Namebill = $_REQUEST['Namebill'];
         $Pricebill = $_REQUEST['Pricebill'];
         $clicktype = "submit";
         $result = $Configtype->ManageOtherbill($Roomid,$BillNo,$Namebill,$Pricebill,$clicktype,$Billid);
         //echo $result;
         if ($result) {
            echo "<div class='col-md-12'>
              <div class='alert callout callout-success'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>บันทึกพิมพ์ใบอื่นๆสำเร็จ
              </div></div><br>"; 
              }else{ // Insert Failed 
              echo "<div class='col-md-12'><div class='alert callout callout-danger'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
              กรุณาตรวจสอบข้อมูล</div></div><br>";
             }
  } 
  if (isset($_REQUEST['edit'])){
     $BillNo = $Configtype->GetMaxOtherbill($Roomid);
     $Namebill = $_REQUEST['Namebill'];
     $Pricebill = $_REQUEST['Pricebill'];
     $clicktype = "edit";
      $result = $Configtype->ManageOtherbill($Roomid,$BillNo,$Namebill,$Pricebill,$clicktype,$Billid);
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
  ?>
    <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">เลือกห้องที่ต้องการทำรายการ</h3>
            </div>
            <div class="box-body">  
            <div class="box-body table-responsive no-padding">
            <div class="col-md-12">
              <table id="myTable2" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>
                      <div align="center">ห้อง</div>
                    </th>  
                    <th>
                      <div align="center">ประเภทห้อง</div>
                    </th>
                    <th>
                      <div align="center">สถานะห้องพัก</div>
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
                      <div align="center">ประเภทห้อง</div>
                    </th>
                    <th>
                      <div align="center">สถานะห้องพัก</div>
                    </th>
                    <th>
                      <div align="center">เลือก</div>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>              
          </div>
        </div>
   </div>
  
    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">รายการพิมพ์ใบอื่นๆ</h3>
          </div>
          <form class="form-horizontal" method="post" name="form1">
            <div class="box-body">
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">ห้องพักเลขที่</label>
                <div class="col-sm-8">     
                    <input type="text" class="form-control" name="Numroom" 
                    value="<?php if (isset($Room_num)){echo "$Room_num";}?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">ชื่อรายการ</label>
                <div class="col-sm-8">     
                  <input type="text" name="Namebill" id="Namebill" class="form-control" 
                  value="<?php if (isset($Name_bill)){echo "$Name_bill";}?>"
                  placeholder="ระบุชื่อรายการ" required />
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">จำนวนเงิน</label>
                <div class="col-sm-8">     
                  <input type="number" name="Pricebill" id="Pricebill"  class="form-control"
                   value="<?php if (isset($Price_bill)){echo "$Price_bill";} ?>"
                   placeholder="ระบุตัวเลข" required>
                </div>
              </div>

              <div class="form-group">
                <center>
                  <?php  
                    if ($flag == "Edit"){             
                    echo  "<button type=\"submit\" name=\"edit\" value=\"edit\" class=\"btn btn-info  \">แก้ไขข้อมูล</button>";
                    }else{
                     
                      echo  "<button type=\"submit\" name=\"submit\" value=\"save\" class=\"btn btn-success  \">บันทึกข้อมูล</button>";
                    } 
                    ?>
                    &nbsp;
                    <?php
                     $detailbillother = $Configtype->GetOtherbill($Roomid);
                     if ($detailbillother == true){
                       //$updateflagotherbill = $Configtype->UpdateFlagStatusBillOther($Roomid);
                       echo "<a href=\"Formprintreceipt.php?id=$Roomid&bid=$Billid&type=4\" 
                            onclick=\"window.open(this.href,'window','width=840,height=880,resizable,scrollbars,toolbar,menubar') ;return false;
                            \"target=\"_blank\" class=\"btn btn-primary\">พิมพ์</a>";
                     }          
                  ?>
                  </center>
              </div>

              <table id="myTable3" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                  <th>
                      <div align="center">ชื่อรายการ</div>
                    </th>
                    <th>
                      <div align="center">จำนวนเงิน</div>
                    </th>
                    <th>
                      <div align="center"></div>
                    </th>
                    <th>
                      <div align="center"></div>
                    </th>   
                  </tr>
                </thead>
                <!--footer-->
                <tfoot>
                  <tr>
                 <th>
                      <div align="center">ชื่อรายการ</div>
                    </th>
                    <th>
                      <div align="center">จำนวนเงิน</div>
                    </th>
                    <th>
                      <div align="center"></div>
                    </th>
                    <th>
                      <div align="center"></div>
                    </th>  
                  </tr>
                </tfoot>
              </table>
              
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
