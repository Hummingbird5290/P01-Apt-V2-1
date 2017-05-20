<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-download"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">ห้องว่าง</span>
        <span class="info-box-number"> 
                  <?php
                  include_once ('controllers/DashBoardCls.php');
                  $DashBoard = new DashBoard();
                  //$totalData = $DashBoard->GetStatus_Room();
                  $id=2;
                  echo  $DashBoard->GetStatus_Room($id) ." ห้อง";
                  ?>
          </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-sign-out"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">แจ้งออก</span>
        <span class="info-box-number"><?php
                  include_once ('controllers/DashBoardCls.php');
                  $DashBoard = new DashBoard();
                  //$totalData = $DashBoard->GetStatus_Room();
                  $id=4;
                  echo  $DashBoard->GetStatus_Room($id) ." ห้อง";
                  ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">จ่ายแล้ว</span>
        <span class="info-box-number"><?php
                  include_once ('controllers/DashBoardCls.php');
                  $DashBoard = new DashBoard();
                  //$totalData = $DashBoard->GetStatus_Room();
                  $id=2;
                  echo  $DashBoard->GetStatus_Room($id) ." ห้อง";
                  ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">ยังไม่ชำระ</span>
        <span class="info-box-number"><?php
                  include_once ('controllers/DashBoardCls.php');
                  $DashBoard = new DashBoard();
                  //$totalData = $DashBoard->GetStatus_Room();
                  $id=2;
                  echo  $DashBoard->GetStatus_Room($id) ." ห้อง";
                  ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- Small boxes (Stat box) -->