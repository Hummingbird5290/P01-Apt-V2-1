<?php  
require("controllers/SumconfigCls.php");
$Configtype = new sumconfigallHm();  
//$connect = $this->db;
$connect = mysqli_connect("localhost", "apt", "apt1234", "hoteldb_dev"); 
mysqli_set_charset($connect, "utf8");
$data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {    
      //$roomid=1;
      //$roomid  = mysqli_real_escape_string($connect, $data->id);
      //$roomid = $data->roomid; 
      $room_id =  $data->roomid;  
      $first_name = mysqli_real_escape_string($connect, $data->firstname1);       
      $last_name = mysqli_real_escape_string($connect, $data->lastname);  
      $btn_name = $data->btnName;  

      $id  =  $room_id; 
      //$id  =  $first_name;      
      $bill_no =$Configtype->GetMaxOtherbill($id);
      if($btn_name == "บันทึกข้อมูล")  
      {   
           $query = "INSERT INTO bill_other (Room_Id,Bill_No,Detail, Price,Create_Date) 
           VALUES ('$id','$bill_no','$first_name', '$last_name',NOW())";  
           if(mysqli_query($connect, $query))  
           {  
                echo "บันทึกข้อมูลสำเร็จ...";  
           }  
           else  
           {  
                echo 'ไม่สามรถบันทึกข้อมูลได้!!!'; 
                echo $query; 
           }  
      }  
      if($btn_name == 'แก้ไขข้อมูล')  
      {  
          //  $id = $data->id;  
           $query = "UPDATE bill_other SET Detail = '$first_name', Price = '$last_name',Create_Date = NOW() WHERE id = '$id'";  
           if(mysqli_query($connect, $query))  
           {  
                echo 'แก้ไขการบันทึกข้อมูลสำเร็จ...';  
           }  
           else  
           {  
                echo 'ไม่สามรถบันทึกข้อมูลได้!!!';  
           }  
      }  
 }  

 
 ?>
 