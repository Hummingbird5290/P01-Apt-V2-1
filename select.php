<?php  
$connect = mysqli_connect("localhost", "apt", "apt1234", "hoteldb_dev");
mysqli_set_charset($connect,"utf8"); 
$output = array(); 
//$data = json_decode(file_get_contents("php://input"));  
// $data = json_decode(file_get_contents("php://input")); 
// $Roomid =$data->Roomid;
$room_id= null;
if (isset($_GET['id'])) {$room_id = $_GET['id'];}

//$room_id =  $data->id;  
 $query = "SELECT bo.* ,rm.Room_No as roomno
 FROM bill_other  bo 
 LEFT JOIN room rm ON rm.Id = bo.Room_Id
 WHERE bo.Room_Id='$room_id' AND bo.Status_Bill = 0  AND bo.Delete_Date IS NULL ";  
//  $result = mysqli_query($connect, $query);  
//  //echo $query ;
//  if(mysqli_num_rows($result) > 0)  
//  {  
//       while($row = mysqli_fetch_array($result))  
//       {  
//            $output[] = $row;  
//       }  
//       echo json_encode($output);  
//  }else{
//      $output[] = null;
   
//       echo json_encode($output);
//  } 
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }
 ?>
 