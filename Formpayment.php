<!-- Bootstrap 3.3.4 -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<div class="row">
  <div class="col-md-12">
    <div class="box-body">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php 
      if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
  
    require("controllers/SumconfigCls.php");
    $Configtype = new sumconfigallHm();
     if (isset($_GET['id'])) {
              $Roomid = $_GET['id'];
              $_SESSION['Roomid'] = $Roomid; 
              // $Roomid =  $_SESSION['Roomid'];          
              $detailroom = $Configtype->Getroom_number($Roomid);
              $detailbill = $Configtype->Getdata_billroomall($Roomid);      
              $Waterunit = $Configtype->Showdata()->Water;
              $Eletricunit = $Configtype->Showdata()->Electricity;
              //-------------------------------------------------------
              $BillNo = str_pad($detailbill->Bill_No, 10, '0', STR_PAD_LEFT);//here 10 is padding length;
              $Create_bill = $detailbill->Bill_Date;
              $Create_bill = new DateTime();
              $Create_bill =  $Create_bill->format('d/m/Y');
              $Room_num = $detailroom->Room_No;
              $Name_cus = $Configtype->Getnamecustomer($Roomid);

              $BillNo = str_pad($detailbill->Bill_No, 10, '0', STR_PAD_LEFT);//here 10 is padding length;
              $Create_bill = $detailbill->Bill_Date;
              $Create_bill = new DateTime();
              $Create_bill =  $Create_bill->format('d/m/Y');
              $Room_num = $detailroom->Room_No;
              $Name_cus = $Configtype->Getnamecustomer($Roomid);
              $firstDay=date('d/m/Y',strtotime("first day of this month")); 
              $lastDay=date('d/m/Y',strtotime("last day of this month"));
              $Rtype_id = $detailroom->RoomType_Id;           
              $Room_lese = number_format($Configtype->Getpriceroom($Rtype_id)->Room_Rates, 2, '.', ',');
              $Fonniture_Lease = number_format($detailbill->Forniture_Lease, 2, '.', ',');
              $sevice_Lease = number_format($detailbill->Service_Lease, 2, '.', ',');
              $Wstart = $detailbill->Water_Unit;
              $Wend =  $detailbill->Water_Unit_End; 
              $sumwater = number_format((float)(($Wend - $Wstart) * $Waterunit), 2, '.', ',');          
              $Estart = $detailbill->Electricity_Unit;
              $Eend = $detailbill->Electricity_Unit_End;
              $sumeletric =  number_format((float)(($Eend - $Estart) * $Eletricunit), 2, '.', ',');
              $phone_Lease = number_format($detailbill->Phone_Lease, 2, '.', ',');
              $orther_Lease = number_format($detailbill->Other_Amount, 2, '.', ',');
              $total = number_format($detailbill->Total_Amount, 2, '.', ',');
              $totalthai = $Configtype->num2wordsThai($total);                     
     }    
    ?>

        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                เพชร ทาวเวอร์ อพาร์ทเม้นท์
                <p class="pull-right">ใบเสร็จ/RECEIPT</p><br> PETCH TOWER APARTMENT RECEIPT
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <!--<div class="row invoice-info">-->
            <div class="col-sm-7 invoice-col">
              <br>
              <b>รายการประจำเดือน :&nbsp;<?php if(isset($firstDay)){
              echo "$firstDay";}?> - <?php if(isset($lastDay)){
              echo "$lastDay";}?><br>
              <b>ชื่อลูกค้า :&nbsp;<?php if(isset($Name_cus)){
              echo "$Name_cus";} ?></b>
            </div>
            <!-- /.col -->
           <div class="col-sm-1 invoice-col">
            <p class="pull-right"></p>         
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            <p class="pull-right">
              <b>เลขที่ :&nbsp;<?php if(isset($BillNo)){
              echo " $BillNo ";} ?></b><br/>
              <b>ณ วันที่ :&nbsp;<?php if(isset($Create_bill)){
              echo "$Create_bill";} ?></b> <br/>
              <b>หมายเลขห้อง :&nbsp;<?php if(isset($Room_num)){
              echo "$Room_num";} ?></b> <br/> 
              </p>   
            </div>
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped" width="70%"  >
                <thead>
                  <tr>
                    <th></th>
                    <th>รายการ</th>
                    <th></th>
                    <th class="pull-right"> จำนวนเงิน</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td ><h5>ค่าเช่าห้องพัก (ROOM LEASE)</h5></td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($Room_lese)){
                    echo "$Room_lese";} ?></h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>ค่าเช่าเฟอร์นิเจอร์ (FURNITURE LEASE)</h5></td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($Fonniture_Lease)){
                    echo "$Fonniture_Lease";} ?><h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>ค่าบริการ (SERVICE)</h5></td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($sevice_Lease)){
                    echo "$sevice_Lease";} ?></h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>ค่าประปา (WATER CHARGE)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    ( <?php if(isset($Wstart)){ echo "$Wstart";} ?> - <?php if(isset($Wend)){ echo "$Wend";} ?>)</h5> </td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($sumwater)){ 
                    echo "$sumwater";} ?></h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>ค่าไฟฟ้า (ELECTRICITY CHARGE)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ( <?php if(isset($Estart)){ echo "$Estart";} ?> - <?php if(isset($Eend)){ echo "$Eend";} ?>)</h5> </td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($sumeletric)){
                    echo "$sumeletric";} ?></h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>ค่าโทรศัพท์ (TELEPHONE CHARGE)</h5></td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($phone_Lease)){
                    echo "$phone_Lease";} ?></h5></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h5>อื่นๆ (ORTHER CHARGE)</h5></td>
                    <td></td>
                    <td class="pull-right"><h5><?php if(isset($orther_Lease)){
                    echo "$orther_Lease";} ?></h5></td>
                  </tr>       
                  <tr>
                    <td></td>
                    <td><b><h5>(<?php if(isset($totalthai)){
                    echo "$totalthai";} ?>)</h5></b></td>
                    <td><b><h5>รวม</h5></b></td>
                    <td class="pull-right"><b><h5><?php if(isset($total)){
                    echo "$total";} ?></h5></b></td>  
                  </tr>          
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-6">
              <p>
                ชำระโดย : [X] เงินสด [ ] เช็ค  [ ] บัตรเครดิต
              </p>
            </div>
            <div class="col-xs-3">
              <br>
              <h4>...............................</h4>
              <center>
                <p>ผู้รับเงิน</p>
              </center>
            </div>
             <div class="col-xs-3">
              <br>
              <h4>...............................</h4>
              <center>
                <p>ผู้จัดการ</p>
              </center>
            </div>
          </div>
          <!-- /.row -->
          <!-- this row will not appear when printing -->
          <br>
          <div class="row no-print">
            <div class="col-xs-12">
              <center>
                <button type="submit" class="btn btn-success" value="Print" onclick="window.print();"><i class="fa fa-print"></i> พิมพ์ใบเสร็จ</button>
              </center>
            </div>
          </div>
        </section>       
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>