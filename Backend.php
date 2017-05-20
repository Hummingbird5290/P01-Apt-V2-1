<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('BackEnd');
$page->startBody();
?>
<!--body--> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>
  หน้าหลัก 
  <small>สถานะห้องพัก</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
  <li class="active">สถานะห้องพัก</li>
</ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <?php 
    //echo "\"Test Section : [Login,Username] \"".$Login." : \"$Username\"";
    require('view/dashboard.php');
    require('view/room_status.php');
    ?>    
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
<!--Footer-->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
?>
<!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
     <script type="text/javascript" language="javascript">
      $(document).ready(function () {
        var dataTable = $('#myTable').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
            url: "controllers/StatusRoomCls.php", // json datasource
            type: "post",  // method  , by default get
            error: function () {  // error handling
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">ไม่พบข้อมูล</th></tr></tbody>');
              $("#employee-grid_processing").css("display", "none");
            }
          }
        });
      });
    </script> 
