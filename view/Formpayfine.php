
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">รายการพิมพ์ใบค่าปรับ</h3>
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
                <div align="center">สถานะห้องพัก</div>
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
                <div align="center">สถานะห้องพัก</div>
              </th>
              <th>
                <div align="center">จำนวนเงิน</div>
              </th>
              <th>
                <div align="center">เลือก</div>
              </th>
          </tfoot>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <?php 
      if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
    ?>
    <div class="box ">
      <div class="box-header ">
        <h3 class="box-title"></h3>
      </div>
      <br>
      <?php             
            require("controllers/SumconfigCls.php");
            $Configtype = new sumconfigallHm();
            $getmynow = FALSE;
            if (isset($_GET['id'])) {
              $Roomid = $_GET['id'];
              $_SESSION['Roomid'] = $Roomid; 
              $Roomid =  $_SESSION['Roomid'];          
              $detailroom = $Configtype->Getroom_number($Roomid);
              $detailbill = $Configtype->Getdata_billroomall($Roomid); 
              $Room_num = $detailroom->Room_No;     //Check max expen of room  
             //--------------------------------------------------------
             $cmynow = $Configtype->GetMYNow($Roomid);
              if(!empty($cmynow->Fine)){
                 $getmynow = TRUE;
              }
             if (!empty($detailbill->Fine)) {               
              $finevalue = $detailbill->Fine;             
             }
            }
            //------------Click Update  data-------------
            if(isset($_REQUEST['submit'])){
              $Roomid = $_SESSION['Roomid'];
              $finevalue = $_REQUEST['Fine_value'];
              $result = $Configtype->UpdateFineValue($Roomid,$finevalue);
              if ($result) {
                $detailroom = $Configtype->Getroom_number($Roomid);
                $detailbill = $Configtype->Getdata_billroomall($Roomid); 
                if(!empty($cmynow->Fine)){
                 $getmynow = TRUE;
                 }
                 if (!empty($detailbill->Fine)) { 
                   $Room_num = $detailroom->Room_No;
                   $finevalue = $detailbill->Fine; 
                  // echo $finevalue ;
                 } 
              echo "<div class='col-md-2'></div><div class='col-md-8'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    การบันทึกค่าปรับสำเร็จ
                  </div></div><div class='col-md-2'></div><br>";                   
             }else{ // Insert Failed 
                    echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><div class='col-md-2'></div><br>";
          }
      }
          //-----------------------------------------------------     
      ?>
      <form class="form-horizontal">
        <div class="box-body">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">บันทึกจำนวนค่าปรับ</h3>
              </div>
              <div class="box-body">
                <form role="form">
                  <div class="form-group">
                    <label>หมายเลขห้อง</label>
                    <input type="text" class="form-control" name="Numroom" value="<?php if (isset($Room_num)){
                echo " $Room_num ";}?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>จำนวนค่าปรับ</label>
                    <input type="number" class="form-control" name="Fine_value" min="0" value="<?php 
               if ($getmynow == true){
                echo  $finevalue;
                 }else{
                if (isset($finevalue)) {
                echo " $finevalue ";}else{echo " ";}}?>" placeholder="ระบุตัวเลข" required>
                  </div>
                  <div class="box-footer">
                    <center>
                     <?php          
              echo  "<button type=\"submit\" name=\"submit\" value=\"save\" class=\"btn btn-success btn-flat \">บันทึก</button>";
         
             ?>
                    </center>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
        <!-- /.box-body -->
      </form>
    </div>
  </div>
</div>