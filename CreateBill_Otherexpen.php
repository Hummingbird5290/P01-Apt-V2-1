<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('CreateBillOther_expen');
$page->startBody();
?>
<!--body-->       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              หน้าหลัก 
              <small>พิมพ์ใบแจ้งหนี้อื่นๆ</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="view/BackEnd.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
              <li class="active">พิมพ์ใบแจ้งหนี้อื่นๆ</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
          <?php 
          require('view/Formcreateotherexpenbill.php');
          ?>          
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
<!--Footer-->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
if (isset($_SESSION['RoomId']))   {$Roomid = $_SESSION['RoomId']; }else{$Roomid=0;}
?>

<script type="text/javascript" language="javascript">
      $(document).ready(function () {
        var dataTable = $('#myTable2').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {            
            url: "controllers/GetgridotherexpenCls.php",
            type: "post",  // method  , by default get
            error: function () {  // error handling
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">ไม่พบข้อมูล</th></tr></tbody>');
              $("#employee-grid_processing").css("display", "none");
            }
          }
        }); 
         var dataTable = $('#myTable3').DataTable({
          "processing": true,
          "serverSide": true,
          "searching": false,
          "ajax": {           
            url: "controllers/GetgridotherexpenbyroomCls.php<?php echo "?roomid=".$Roomid."" ?>",           
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

   
