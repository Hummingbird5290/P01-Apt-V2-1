<!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">รายการพิมพ์ใบเสร็จ</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <br>
      <?php 
     require("controllers/SumconfigCls.php");
     $Configtype = new sumconfigallHm();
      if(!isset($_SESSION)){
        session_start();
      }
       if (isset($_GET['id']) OR isset($_GET['mode'])) {
         $Roomid = $_GET['id'];
         $idbill = $_GET['bid'];
         $_SESSION['Roomid'] = $Roomid; 
         $Roomid =  $_SESSION['Roomid'];
         if($_REQUEST['mode'] == 'update8'){
         $result = $Configtype->UpdateFlagStatus8($idbill);
         if($result){
           echo "<div class='col-md-2'></div><div class='col-md-8'>
           <div class='alert callout callout-success'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
           <h4><i class='icon fa fa-ban'></i> ยืนยันสำเร็จ!</h4>ยืนยันพิมพ์ใบเสร็จสำเร็จ
           </div></div><div class='col-md-2'></div><br>";   
         }else{
           echo "<div class='col-md-2'></div><div class='col-md-8'><div class='alert callout callout-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>กรุณาตรวจสอบข้อมูล
            </div></div><div class='col-md-2'></div><br>";
          }
        }
    }     
    ?>
     <div class="col-md-12"> 
        <table id="myTable2" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>
                <div align="center">เลขที่ห้อง</div>
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
                <div align="center">เลขที่ห้อง</div>
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
          </tfoot>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <br>
  </div>
</div>