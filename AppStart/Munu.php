<?php
// Check if user is logged in using the session variable
// if ( $_SESSION['logged_in'] != 1 ) {
//   $_SESSION['message'] = "You must log in before viewing your profile page!";
//   header("location: error.php");    
// }
require('appstart/buldle.php');
?>
<header class="main-header">
        <!-- Logo -->
        <a href="BackEnd" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>A</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Phet </b>Home <small>System</small></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img//user.png" class="user-image" alt="User Image" />
                  <span class="hidden-xs">Profile</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                   
                  <li class="user-header">
                    <i class="fa fa-angle-left pull-right"></i><img src="dist/img/user512.png" class="img-circle" alt="User Image" />
                    <p>
                      Apartment<br>
                      Name : <?php 
                      echo $_SESSION['Username'];  ?>
                      <small><?php echo "";?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <!--<div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="Profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="Home" class="btn btn-default btn-flat">ออกจากระบบ</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"> 
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">เมนูหลัก</li>
            <?php 
            if ($_SESSION['UserGroup']=="99" or $_SESSION['UserGroup']=="2"){
             echo "<li class=' treeview'>
              <a href=''>
                <i class='fa fa-edit'></i> <span>บันทึกข้อมูล</span><i class='fa fa-angle-left pull-right'></i>
              </a>
              <ul class='treeview-menu'>               
                <li><a href='Room'><i class='fa fa-circle-o'></i> บันทึกห้องพัก</a></li>
                <li><a href='Supply'><i class='fa fa-circle-o'></i> บันทึกค่ามิเตอร์</a></li>
                <li><a href='RoomType'><i class='fa fa-circle-o'></i> บันทึกประเภทห้อง</a></li>
                <li><a href='CustomerToRoom'><i class='fa fa-circle-o'></i> บันทึกการเข้าพักครั้งแรก</a></li> 
                <li><a href='RoomStatus'><i class='fa fa-circle-o'></i> เปลี่ยนแปลงสถานะห้อง</a></li> 
              </ul>
            </li>";
            }
            ?>                    
            <li class="active treeview">
              <a href="#"><i class="fa fa-laptop"></i><span>บันทึกห้องพัก</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li><a href="Booking"><i class="fa fa-circle-o"></i> บันทึกการจอง</a></li> 
                <li><a href="Customer"><i class="fa fa-circle-o"></i> บันทึกการเข้าพัก</a></li> 
                <li><a href="RoomStatusOut"><i class="fa fa-circle-o"></i> บันทึกการแจ้งออก</a></li>                
                <li><a href="SupplyRoom"><i class="fa fa-circle-o"></i> บันทึกค่าใช้จ่ายของแต่ละห้อง</a></li>
                <li><a href="CreateBill_Otherexpen.php"><i class="fa fa-circle-o"></i> บันทึกใบแจ้งหนี้(แจ้งออก)</a></li>
              </ul>
            </li>           
            <li class="treeview">
              <a href="#"><i class="fa fa-pie-chart"></i> <span>รายงาน</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="BillBooking"><i class="fa fa-circle-o"></i> พิมพ์ใบจองห้องพัก</a></li>
                <li><a href="Bill"><i class="fa fa-circle-o"></i> พิมพ์ใบแจ้งหนี้</a></li>                
                <li><a href="BillReceive"><i class="fa fa-circle-o"></i> พิมพ์ใบเสร็จ</a></li> 
                <li><a href="BillOther"><i class="fa fa-circle-o"></i> พิมพ์ใบค่าอื่นๆ</a></li> 
                <!--<li><a href="CreateBill_Otherexpen.php"><i class="fa fa-circle-o"></i> พิมพ์ใบแจ้งหนี้(แจ้งออก)</a></li>-->
                
              </ul>
            </li> 
            <?php 
            if ($_SESSION['UserGroup']=="99" or $_SESSION['UserGroup']=="2"){
             echo "<li class='treeview'>
              <a href=''><i class='fa fa-edit'></i><span>จัดการระบบ</span><i class='fa fa-angle-left pull-right'></i></a>
                <ul class='treeview-menu'>
                  <li><a href='AddUser'><i class='fa fa-circle-o'></i> สร้างผู้ใช้งาน</a></li>                  
                </ul>
              </li>                
            </ul>";
            }            
            ?>
        </section>
        <!-- /.sidebar -->
      </aside>