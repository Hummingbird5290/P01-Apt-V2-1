<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('Create - BillBooking');
$page->startBody();
?>
<!--body-->       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              หน้าหลัก 
              <small>พิมพ์ใบจองห้องพัก</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
              <li class="active">พิมพ์ใบจองห้องพัก</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
          <?php          
          require('view/Formbookingroom.php');
          ?>          
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
<!--Footer-->
<!--<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
?>
 <script type="text/javascript" language="javascript">
      $(document).ready(function () {
        var dataTable = $('#myTable2').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
            url: "controllers/GetgridbookingroomCls.php", // json datasource
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
    <br>