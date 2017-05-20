<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Data Table With Bootstrap</title>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<style type="text/css" media="all">
	body{ font-size:14px; font-family:Tahoma, Geneva, sans-serif;  color:#000; margin:0 auto; padding:50px;}
</style>
</head>

<body>
           <div class="box">
              <div align="center">
              <!--<img src="http://www.siamfocus.com/siafmocus_facebook_cover.jpg" />-->
              </div>
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th><div align="center">ชื่อบทความ</div></th>
                        <th><div align="center">หมวดหมู่บทความ</div></th>
                        <th><div align="center">วันที่สร้าง</div></th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th><div align="center">ชื่อบทความ</div></th>
                        <th><div align="center">หมวดหมู่บทความ</div></th>
                        <th><div align="center">วันที่สร้าง</div></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>

		<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				
				var dataTable = $('#myTable').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax_data_table.php", // json datasource
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
        
        <hr />
<p>Reference Code : <a href="http://coderexample.com/datatable-demo-server-side-in-phpmysql-and-ajax/ " target="_blank">http://coderexample.com/datatable-demo-server-side-in-phpmysql-and-ajax/</a></p>
<p><br />
  <strong>รับทำเว็บไซต์,Google Ads,Facebook Ads<br />
‪#‎โปรโมทโพส‬ ‪#‎ราคาถูกสุดๆ‬ เพียง 3,000 บาทเท่านั้น</strong><br />
► WEBSITE : <a href="http://www.siamfocus.com/">http://www.siamfocus.com/</a><br />
► TEL : 080-086-5972<br />
► LINE : <a href="http://line.me/ti/p/@siamfocus.com">http://line.me/ti/p/@siamfocus.com</a><br />
</p>
</body>
</html>
