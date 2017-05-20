 <link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<section class="content">
<div class="row">
  <div class="box">              
                  <div class="box-header">
                    <h3 class="box-title">สถานะห้อง</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                                   
                    <table id="myTable2" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th><div align="center">ห้อง</div></th>
                          <th><div align="center">ชื่อ-นามสกุล</div></th>
                          <th><div align="center">ประเภทห้อง</div></th>
                          <th><div align="center">สถานห้องพัก</div></th>
                          <th><div align="center">สถานะการจ่าย</div></th>
                          <th><div align="center">เลือก</div></th>
                        </tr>
                      </thead>
                  <!--footer-->
                      <tfoot>
                        <tr>
                          <th><div align="center">ห้อง</div></th>
                          <th><div align="center">ชื่อ-นามสกุล</div></th>
                          <th><div align="center">ประเภทห้อง</div></th>
                          <th><div align="center">สถานห้องพัก</div></th>
                          <th><div align="center">สถานะการจ่าย</div></th>
                          <th><div align="center">เลือก</div></th>
                        </tr>
                      </tfoot>
                    </table>                    
                  </div><!-- /.box-body -->
                </div>
                 <!--<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
      <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->
      <script type="text/javascript" language="javascript" >
        $(document).ready(function() {          
          var dataTable = $('#myTable2').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
              url :"controllers/SupplyroomCls.php", // json datasource
              type: "post",  // method  , by default get
              error: function(){  // error handling
                $(".employee-grid-error").html("");
                $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">ไม่พบข้อมูล</th></tr></tbody>');
                $("#employee-grid_processing").css("display","none");                
              }
            }            
          } );
        } );
      </script>
 <br>
  <?php 
      if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
    ?> 
  <div class="box box-primary" id="detail_data">
             <div class="box-header with-border">
                  <h3 class="box-title">บันทึกค่าใช้จ่ายของแต่ละห้อง</h3></div>
                <div class="box-body">
                <br>
                 <div class="col-md-1"></div>
                <div class="col-md-10">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horizontal Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">หมายเลขห้อง</label>
                      <div class="col-sm-10">
                        <div class="col-xs-4">
                        <input type="email" class="form-control" id="Numroom" value="
                        <?php
                         if($_SESSION['roomid']!="") 
                          {              
                          $idnumroom = $_SESSION['roomid'];                          
                            echo "$idnumroom" ;
                          }
                         ?>                        
                        " placeholder="หมายเลขห้อง" readonly >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">มิเตอร์น้ำเริ่มต้น</label>
                      <div class="col-sm-10">
                        <div class="col-xs-4">
                        <input type="email" class="form-control" id="Startwater" placeholder="ระบุตัวเลข">
                        </div> 
                         <label for="inputPassword3" class="col-sm-3 control-label">มิเตอร์น้ำสิ้นสุด</label>
                        <div class="col-xs-4">
                        <input type="email" class="form-control" id="Startwater" placeholder="ระบุตัวเลข">
                        </div>   
                      </div>
                      </div>                   
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">มิเตอร์ไฟเริ่มต้น</label>
                      <div class="col-sm-10">
                        <div class="col-xs-4">
                        <input type="email" class="form-control" id="Startwater" placeholder="ระบุตัวเลข">
                        </div> 
                         <label for="inputPassword3" class="col-sm-3 control-label">มิเตอร์ไฟสิ้นสุด</label>
                        <div class="col-xs-4">
                        <input type="email" class="form-control" id="Startwater" placeholder="ระบุตัวเลข">
                        </div>   
                      </div>
                      </div>   
                  </div><!-- /.box-body -->
                  </form>
              </div><!-- /.box -->
              <div class="col-md-4"></div>
              <div class="col-md-3">
                   <button type="submit" name="submit" value="save"  class="btn btn-success btn-block">บันทึก</button>
                    </div>
                  </div><!-- /.box-body -->   
              </div><!-- /.box -->
            </div>
            <br>          
            </div>
            </section>
            