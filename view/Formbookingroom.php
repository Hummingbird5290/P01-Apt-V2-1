<!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">รายการพิมพ์ใบจองห้องพัก</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
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
                <div align="center">สถานห้องพัก</div>
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
    <!--<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->
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
    <?php 
      if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
    ?>

  </div>
</div>