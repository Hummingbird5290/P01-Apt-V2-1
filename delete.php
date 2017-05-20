<?php  
 //delete.php  

$connect = mysqli_connect("localhost", "apt", "apt1234", "hoteldb_dev"); 
mysqli_set_charset($connect, "utf8");
$data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $id = $data->id;  
      $query = "UPDATE bill_other SET Delete_Date = NOW()  WHERE id='$id'";  
      if(mysqli_query($connect, $query))  
      {  
           echo 'ลบข้อมูลสำเร็จ...!!'; 
          
      }  
      else  
      {  
           echo 'ไม่สามารถลบได้...!!';  
      }  

 }  
 ?>
 