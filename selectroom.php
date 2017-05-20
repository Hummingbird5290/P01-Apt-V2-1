<?php

//require_once ('../Model/config.php');

// $sql = "SELECT Room.Id as roomid FROM room ";
// $output = array(); 
// $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
//  if(mysqli_num_rows($query) > 0)  
//  {  
//       while($row = mysqli_fetch_array($query))  
//       {  
//            $output[] = $row;  
//       }  
//       echo json_encode($output);  
//  }else{
//      $output[] = $row;
//       echo json_encode($output);
//  }  
$connect = mysqli_connect("localhost", "apt", "apt1234", "hoteldb_dev");
mysqli_set_charset($connect,"utf8"); 
$output = array(); 
//if (isset($_GET['id'])) {$Roomid = $_GET['id'];}
//echo $Roomid ;
 $query = "SELECT  rm.Id as roomid ,rm.Room_No as roomno ,rt.RoomType as roomtype ,rt.RoomDetail as roomdel,
 rs.RoomStatusDetail as roomsta
 FROM room  rm
 LEFT JOIN roomtype rt ON rt.Id = rm.RoomType_Id 
 LEFT JOIN roomstatus rs ON rs.RoomStatusId = rm.Status_Room
 ORDER BY roomid ASC ";  
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }else{
     $output[] = $row;
      echo json_encode($output);
 }  
?>