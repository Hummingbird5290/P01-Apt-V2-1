<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('Create RoomType');
$page->startBody();
?>
  <!--body-->       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              หน้าหลัก 
              <small>สร้างประเภทห้อง</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="BackEnd.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
              <li class="active">สร้างประเภทห้อง</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
          <?php require('view/CreateRoomType.php'); ?> 
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
?> 
<script type="text/javascript" language="javascript">
      $(document).ready(function () {
        var dataTable = $('#myTableRoomType').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
          "ajax": {
            url: "controllers/CreateRoomTypeTable.php", // json datasource           
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
   