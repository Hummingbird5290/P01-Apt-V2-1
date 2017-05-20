<form role="form" name="CreateBook" action="" method="post" >
<div class="row">
<?php
echo "<br><div class='col-md-12'><div class='alert callout callout-info'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-ban'></i> บันทึกการเข้าพัก !!!</h4>
                          คือการนำลูกค้าที่มีการ จอง ห้องพักไว้ เพื่อทำการยืนยันการเข้าพัก และทำสัญญา การเข้าพัก</div></div><br>";  
    require_once("controllers/CreateCustomerCls.php");   
    require_once("controllers/CreateBookCls.php"); 
    require_once("controllers/RoomCls.php");    
            $RoomCls = new Room();
            $CreateBook = new CreateBook();            
            $Customer = new Customer(); 
            //Check Get post 
            if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }   
            if (isset($_GET['id'] ) or isset($_GET['idb']) or isset($_GET['flag']))
            {
               $Id = $_GET['id'];
               $flag = $_GET['flag'];
               if ($flag=="Edit")
               {
                  $Idb = $_GET['idb'];
                  $bookobj = $CreateBook->GetBooking($Idb);
                  $Book_Amount =$bookobj->Book_Amount;
                  $Title=$bookobj->Title;
                  $Name=$bookobj->Name;
                  $Last_Name=$bookobj->Last_Name;
                  $CardId=$bookobj->CardId;
                  $Email=$bookobj->Email;
                  $Tel=$bookobj->Tel;
                  $Tel2=$bookobj->Tel2;
                  $Address=$bookobj->Address;
                  $Bookdate=$bookobj->Book_Date;
               } 
            } 
             $result = null; 
            if (isset($_REQUEST['Edit'])) { 
              extract($_REQUEST);
              $Customer = new Customer();     
              $user =$_SESSION['Username'];  
              //echo "$Id-$Book_Amount - $Title - $Name - $Name - $Last_Name - $CardId - $Email- $Tel-$Tel2-$Address- $Bookdate-||$Idb-||";   
              $result = $Customer->CreateCustomar($Id,$Title, $Name, $Last_Name, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Book_Amount,$Bookdate,$Idb);
              //echo $result; 
              //echo $RoomId,$Title, $Name, $Lastname, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Amount_book;
              //23 kimimaro1 นามทดสอบ 7-7777-77-777-77-7 (777) 777-7777 88 kimimaro 50000      
              //$result = $Customer->GetCustomer($Id);
              //$result = $Customer->UdateStatusBooking($Idb);          
              //$result = $Customer->CreateContract($Id,$user,$Bookdate,$Book_Amount);
              //$result = $Customer->UdateStatusRoom($Id);
              //echo $result;    
            }            
            if (isset($result)) {
               if ($result){ 
                 $Id =null;                 
                  // save Success              
                  echo "<div class='col-md-12'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกสำเร็จ!</h4>
                    การบันทึกผู้เข้าใช้สำเร็จ
                  </div></div><br>";                  
                } else {
                    // save Failed 
                    echo "<div class='col-md-12'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> บันทึกไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><br>";
                }
            }
            //
            else if (isset($_REQUEST['Del'])) { 
              extract($_REQUEST);             
              //session_start();
              $user =$_SESSION['Username'];
              $result = $CreateBook->BookDel($Idb,$Id,$user);
              //echo $result;
              if (isset($result)) {
               if ($result){
                 $flag = "Save";//clear textbox
                  // save Success              
                  echo "<div class='col-md-12'>
                  <div class='alert callout callout-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> ลบข้อมูลสำเร็จ!</h4>
                   !!! การลบข้อมูลสำเร็จ
                  </div></div><br>";                  
                } else {
                    // save Failed 
                    echo "<div class='col-md-12'><div class='alert callout callout-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> ลบข้อมูลไม่สำเร็จ!!!</h4>
                     กรุณาตรวจสอบข้อมูล</div></div><br>";
                }
            }
          }            
  ?>    

<!--table-->
  <div class="col-md-7">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">เลือกห้องที่ต้องการเข้าพัก</h3>
      </div>   
      <!-- form start -->
       <br>    
        <div class="box-body"> 
      <!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->
      <div class="col-md-12">        
      <div class="box-body table-responsive no-padding">
        <table id="myTableBook" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>
                <div align="center">ห้อง</div>
              </th>
              <!--<th>
                <div align="center">ชื่อ-นามสกุล</div>
              </th>-->
              <th>
                <div align="center">ประเภทห้อง</div>
              </th>
              <th>
                <div align="center">สถานะห้องพัก</div>
              </th>
              <!--<th>
                <div align="center">สถานะการจ่าย</div>
              </th>-->
              <th>
                <div align="center">เลือก</div>
              </th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>
                <div align="center">ห้อง</div>
              </th>
              <!--<th>
                <div align="center">ชื่อ-นามสกุล</div>
              </th>-->
              <th>
                <div align="center">ประเภทห้อง</div>
              </th>
              <th>
                <div align="center">สถานะห้องพัก</div>
              </th>
              <!--<th>
                <div align="center">สถานะการจ่าย</div>
              </th>-->
              <th>
                <div align="center">เลือก</div>
              </th>
            </tr>
          </tfoot>
        </table>   
      </div> 
      </div> 
     <div class="col-md-2"></div>
     <div class="box-footer">        
          <!--<center><button type="submit" name="submit" value="CreateBook" class="btn btn-primary">บันทึก</button></center>-->
        </div>
     </div>
 </div> 
</div>

<?php 
if (isset($Id)){
echo "<div class=\"col-md-5\">         
<div class=\"box box-primary\">
      <div class=\"box-header with-border\">
        <h3 class=\"box-title\">บันทึกการเข้าพัก</h3>
      </div>   
 <div class=\"box-body\">      
       <div class=\"col-md-6\">
         <div class=\"form-group\">                                  
            <label for=\"ห้อง\">ห้อง</label> 
               <select class=\"form-control\" name = \"RoomIdr\" required Disabled>";
                    if (isset ($Id)){
                            $RoomObj = $RoomCls->GetRoom($Id);
                              echo "<option value=$RoomObj->Id> $RoomObj->Room_No</option>";
                          }else{
                              echo "<option value='0'>กรุณาเลือกห้อง</option>";
                              $Room_Data = $RoomCls->GetRoomForBook();
                              $count_row = $Room_Data->num_rows; 
                              if($count_row){                          
                                foreach($Room_Data as $row)
                                  { 
                                    echo "<option value=$row[Id]> $row[Room_No]</option>";
                                  }
                                } 
                              else {echo "<option value='0'>ไม่มีข้อมูลห้องพัก</option>";}
                            }  
                      echo "</select>                  
            </div>    
         </div>                     
              <div class=\"col-md-6\">        
                <div class=\"form-group\">
                  <label for=\"ค่ามัดจำ\">ค่ามัดจำ</label>
                  <div class=\"input-group\">
                        <div class=\"input-group-addon\"><i class=\"fa fa-bitcoin\"></i></div>
                  <input type=\"input\" class=\"form-control\" name=\"Amount_bookr\" 
                  value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                          $result =$Book_Amount;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"ค่ามัดจำ\" required Disabled>
                  </div>
                </div>
              </div>
             <div class=\"col-md-12\">        
                <div class=\"form-group\">
                  <label for=\"วันที่เข้าอยู่\">วันที่เข้าอยู่</label>
                  <div class=\"input-group\">
                      <div class=\"input-group-addon\">
                        <i class=\"fa fa-calendar\"></i>
                      </div>
                      <input class=\"form-control\" Name=\"DateConr\" id =\"datebook\" 
                        value=\"";   
                          if (isset($flag))
                          {
                            if ($flag=="Edit")
                                {                          
                                $result = $Bookdate;
                                $result = Datetime::createFromFormat('Y-m-d H:i:s', $result)->format('d/m/Y');
                                $result=trim($result);                                
                                echo "$result";
                                }     
                          }                        
                          echo "\" Disabled/>
                    </div>
                </div>
              </div> 
             <hr>
            <div class=\"col-md-5\">
              <div class=\"form-group\">
                <label for=\"คำนำ\">คำนำ</label>
                <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-user\"></i></div>
                <input type=\"input\" class=\"form-control\" name=\"Titler\" 
                value=\"";   
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        {                          
                         $result = $Title;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"คำนำ\" required Disabled>
                </div>
              </div>
            </div>
            <div class=\"col-md-7\">
              <div class=\"form-group\">
                <label for=\"ชื่อ\">ชื่อ</label>                
                <input type=\"input\" class=\"form-control\" name=\"Namer\" value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Name";
                         $result =$Name;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"ชื่อ\" required Disabled>                
              </div>
            </div>
            <div class=\"col-md-12\">
              <div class=\"form-group\">
                <label for=\"นามสกุล\">นามสกุล</label>
                <input type=\"input\" class=\"form-control\" name=\"Lastnamer\" value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Last_Name";
                         $result =$Last_Name;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"นามสกุล\" required Disabled>
                </div> 
            </div>
            
            <div class=\"col-md-6\">
              <div class=\"form-group\">
                <label for=\"รหัสบัตรประชาชน\">รหัสบัตรประชาชน</label>
                <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-credit-card\"></i></div>
                <input type=\"input\" class=\"form-control\" name=\"CardIdr\" value=\"";   
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->CardId";
                         $result = $CardId;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"รหัสบัตรประชาชน\" data-inputmask='\"mask\": \"9-9999-99-999-99-9\"' data-mask Disabled>
                </div>
              </div>
            </div>
            <div class=\"col-md-6\">
              <div class=\"form-group\">
                <label for=\"อีเมลล์\">อีเมลล์</label>
                 <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-envelope\"></i></div>
                <input type=\"Email\" class=\"form-control\" name=\"Emailr\" value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Email";
                         $result =$Email;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"อีเมลล์\" Disabled>
                </div>
              </div>
            </div>
            <div class=\"col-md-6\">
              <div class=\"form-group\">
                <label for=\"เบอร์โทรศัพท์\">เบอร์โทรศัพท์</label>
                <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-phone\"></i></div>
                <input type=\"input\" class=\"form-control\" name=\"Telr\" value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Tel";
                         $result =$Tel;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"เบอร์โทรศัพท์\" data-inputmask='\"mask\": \"(999) 999-9999\"' data-mask required Disabled> 
                </div>                
              </div>
            </div>
            <div class=\"col-md-6\">
              <div class=\"form-group\">
                <label for=\"เบอร์โทรศัพท์2\">เบอร์โทรศัพท์(สำรอง)</label>
                <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-phone\"></i></div>
                <input type=\"input\" class=\"form-control\" name=\"Tel2r\" value=\"";    
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Tel";
                         $result =$Tel2;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "\" placeholder=\"เบอร์โทรศัพท์(สำรอง)\" data-inputmask='\"mask\": \"(999) 999-9999\"' data-mask Disabled>
                </div>
              </div>
            </div>           
            <div class=\"col-md-12\">
              <div class=\"form-group\">
                <label for=\"Address\">ที่อยู่ตามทะเบียนบ้าน</label>
                <div class=\"input-group\">
                      <div class=\"input-group-addon\"><i class=\"fa fa-home\"></i></div>
                <!--<input type=\"input\" class=\"form-control\" name=\"Address\" placeholder=\"ที่อยู่ตามทะเบียนบ้าน\" required>-->
                <textarea class=\"form-control\" name=\"Addressr\" placeholder=\"ที่อยู่ตามทะเบียนบ้าน\" Disabled>";   
                  if (isset($flag))
                  {
                    if ($flag=="Edit")
                        { 
                         //echo "$bookobj->Address";
                        $result =$Address;$result=trim($result);
                         echo "$result";
                        }     
                  }                        
                  echo "</textarea>
                </div>
              </div>
            </div>
          </div> 
        <!-- /.box-body -->
        <div class=\"box-footer\">";
        if (isset($flag))
        {
           if ($flag=="Save")
              { 
                echo "<center><button type=\"submit\" name=\"Save\" value=\"Save\" class=\"btn btn-primary\">บันทึก</button></center>";
              }  else {
                echo "<center><button type=\"submit\" name=\"Edit\" value=\"Edit\" class=\"btn btn-primary\"data-toggle=\"tooltip\" title=\"เพื่อสร้างสัญญาการเข้าพัก\">ยืนยันการเข้าพัก</button>
                <button type=\"submit\" name=\"Del\" value=\"Del\" class=\"btn btn-danger\" onclick=\"return  confirm('!!!ต้องการลบข้อมูลหรือไม่')\">ยกเลิกการสัญญา</button>
                </center>";
              }       
        } 
    echo "</div>
    </div>
    <!-- /.box -->"; }?>
</div>

</form>
  
    
