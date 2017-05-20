

<!--<link href="dist/css/style.css" rel="stylesheet" type="text/css" />-->
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
        require("controllers/SumconfigCls.php");
        $Configtype = new sumconfigallHm();
        if (isset($_GET['id'])) {
          $Roomid = $_GET['id'];
          $type = $_GET['type'];
          $billId = $_GET['bid'];
          $_SESSION['Roomid'] = $Roomid;     
          $detailroom = $Configtype->Getroom_number($Roomid);
          $getroombill = $Configtype->GetId_roombillById($billId);
          $typebill = $Configtype->GetBilltype($type);
         
          
          //-------------------------------------------------------
          $Type_bill = $typebill->Bill_Type;
          $Book_No = str_pad($getroombill->Bill_No, 10, '0', STR_PAD_LEFT);//here 10 is padding length;
          $Create_bill = new DateTime();
          $Create_bill =  $Create_bill->format('d/m/Y');
          $Room_num = $detailroom->Room_No;
          $Name_cus = $Configtype->Getnamecustomer($Roomid);

          // $firstDay=date('d/m/Y',strtotime("first day of this month")); 
          // $lastDay=date('d/m/Y',strtotime("last day of this month"));
          
         $firstDay = date('d/m/Y', strtotime('first day of next month'));
         $lastDay=date('d/m/Y',strtotime("last day of next month"));        
          
          $total = number_format($getroombill->Total_Amount, 2, '.', ',');
          //$totalthai = $Configtype->num2wordsThai($total);                  
        }    
    ?>
          <!--<div style="height:50%" class="panel panel-primary">-->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h4 class="page-header">
                เพชร ทาวเวอร์ อพาร์ทเม้นท์
                <p class="pull-right"><?php if(isset($Type_bill)){
              echo "$Type_bill";} ?></p>
              <br> PETCH TOWER APARTMENT RECEIPT
              </h4>
            </div>
          </div>
          <div class="col-md-12">
            <div>
              <p class="pull-right">
                เลขที่ :&nbsp;<?php if(isset($Book_No)){
              echo " $Book_No ";} ?><br/>
                ณ วันที่ :&nbsp;<?php if(isset($Create_bill)){
              echo "$Create_bill";} ?> <br/>
                หมายเลขห้อง :&nbsp;<?php if(isset($Room_num)){
              echo "$Room_num";} ?> <br/>
              </p>
            </div>
            <div >
              <br>
              รายการประจำเดือน :&nbsp;<?php if(isset($firstDay)){
              echo "$firstDay";}?> - <?php if(isset($lastDay)){
              echo "$lastDay";}?><br>
             ชื่อลูกค้า :&nbsp;<?php if(isset($Name_cus)){
               echo "$Name_cus";}?><br> 
            </div>
          </div>
            <!-- /.col -->
          <!--</div>-->
          <!-- /.row -->
          <!-- Table row -->
          <div class="row">
            <div >
            <!--class="col-xs-12 table-responsive"-->
              <center>
              <!--<table class="table table-bordered"> -->
               <table border="1" width="90%" height="auto">
                <thead> 
                  <tr>
                    <th style="width:400px;height:30px;text-align:center;font: 15px tomaho, Serif;">รายการ</th>
                    <!--style="width:400px;text-align:center;"-->
                    <th style="width:100px;height:30px;text-align:center;font: 15px tomaho, Serif;">จำนวนเงิน</th>
                    <!--style="width:90px;text-align:center;"-->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $int = 0;
                  $Detail = $Configtype->GetDataformbill($Roomid,$billId,$type);
                  $count_row = $Detail->num_rows; 
                              if($count_row){                          
                                foreach($Detail as $row)
                                  {                                   
                                            $int = $int + 1;  
                                             if ($count_row  != $int  )
                                             {
                                                echo "<tr class=\"item-row\">
                                                    <td class=\"item-name\"> 
                                                      <div class=\"col-md-12\" style=\"text-align:left;border: 0;font: 14px tomaho, Serif;\">
                                                      $row[Bill_Detail]
                                                      </div>
                                                    </td> ";
                                               echo "<td class=\"description\" style=\"text-align:right;font: 14px tomaho, Serif;\">
                                              $row[Price]&nbsp; 
                                                    </td>
                                              </tr>";
                                             }  else
                                             {
                                            echo "<tr class=\"item-row\">
                                                  <td class=\"item-name\"> 
                                                  <div class=\"col-md-10\" style=\"text-align:left;font: 14px tomaho, Serif;\">
                                                    $row[Bill_Detail]
                                                    </div>
                                                    <div class=\"col-md-1\" style=\"text-align:right;font: 14px tomaho, Serif;\">
                                                    รวม
                                                    </div>                                                   
                                                  </td> ";
                                            echo "<th class=\"description\" style=\"text-align:right;font: 14px tomaho, Serif;\">
                                              $row[Price]&nbsp; 
                                                    </th>
                                              </tr>";

                                             }                                         
                                  }
                                } 
                              else {echo "<option value='0'>ไม่มีข้อมูลห้องพัก</option>";}                           
                  ?>
                   
                </tbody>
              </table>
              </center>
            </div>
            <!-- /.col -->
          </div>
  
          <div class="col-xs-9">
            <p><h5>
              หมายเหตุ : โปรดชำระเงินภายในวันที่ 1-5 ของทุกเดือน
                 มิฉะนั้นท่านจะต้องเสียค่าปรับวันละ 100 บาท จนกว่าจะชำระครบ 
                 <br> PLEASE PAY THE AMOUNT FROM 1st THRU 5th OF THE MONTH OTHERWISE,<br>YOU MUST PAY THE PENALTY OF 100 BAHT THRU THE AMOUNT
                PAID IN FULL</h5>
              </p>
          </div>
            <div class="col-xs-3">
              <br>
              <p class="pull-left">
              <h4>...............................</h4>
              <center>
                <p>ผู้แจ้ง</p>
                </p>
              </center>
            </div>

          <!--</div>-->
          <!-- /.row -->
          <!-- this row will not appear when printing -->
          <br>
          <div class="row no-print">
            <div class="col-xs-12">
              <center>
                <button type="submit" class="btn btn-success" value="Print" onclick="window.print();"><i class="fa fa-print"></i> พิมพ์ใบแจ้งหนี้</button>
              </center>
            </div>
          </div>
        </section>
        <!--</div>       -->
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>