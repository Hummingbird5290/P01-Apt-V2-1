<?php
require_once( "Model/db_config.php");
class Room{
		
		public $db;
		public function __construct(){
			$this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
		}
		/*** for insert in table room process ***/
		public function InsertRoom($RoomNO,$RoomType)        
        {
				$sql1="INSERT INTO  room (Room_No, RoomType_Id, Status_Room) 
				VALUES ('$RoomNO','$RoomType','2')";				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
		/*** for insert in table room process ***/
		public function UpdateRoom($Id,$RoomNO,$RoomType)        
        {
				$sql1="UPDATE room set Room_No ='$RoomNO', RoomType_Id='$RoomType'
				Where Id = $Id ;";				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
		/*** for insert in table room process ***/
		public function DelRoom($id)        
        {
				$sql1="DELETE FROM  room WHERE Id = $id;";				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
		/*** for insert in table roomtype process ***/
		public function InsertRoomType($RoomType,$RoomDetail,$RoomRates)        
        {
				$sql1="INSERT INTO  roomtype (RoomType, RoomDetail, Room_Rates,flag) 
				VALUES ('$RoomType','$RoomDetail','$RoomRates','1')";				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
        /*** for Getdata in table room process ***/
		public function GetRoomAll()        
        {
			$sql="SELECT Id, Room_No, RoomType_Id, Start_date, End_Date, Status_Room FROM room where Status_Room = 3";			
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;
			
			if ($count_row > 0)
            {				
        		return $result;
			}
			else 
            { 
                return false;
            }
		}
		//get data table room where id
		public function GetRoom($Id)         
        {
			$sql  = "SELECT * FROM room WHERE Id =$Id;";			
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;			
			if ($count_row > 0)
            {				
        		return $user_data;
			}
			else 
            { 
                return false;
            }
		}
		public function GetRoomForBook()        
        {
			$sql="SELECT Id, Room_No, RoomType_Id, Start_date, End_Date, Status_Room FROM room where Book_Id IS null and ( Status_Room = 2 Or Status_Room = 4 )";			
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;
			
			if ($count_row > 0)
            {				
        		return $result;
			}
			else 
            { 
                return false;
            }
		}
		/*** for Getdata in table room Type ***/
		public function GetRoomType()         
        {
			$sql  = "SELECT Id,RoomType,RoomDetail,Room_Rates,flag FROM roomtype WHERE flag = true";			
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;			
			if ($count_row > 0)
            {				
        		return $result;
			}
			else 
            { 
                return false;
            }
		}
		/*** for Getdata in table room Type ***/
		public function GetRoomTypeBy($id)         
        {
			$sql  = "SELECT Id,RoomType,RoomDetail,Room_Rates,flag FROM roomtype WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;
			
			if ($count_row > 0)
            {				
        		return $user_data;
			}
			else 
            { 
                return false;
            }
		}
		public function UpdateRoomtype($id,$RoomType,$RoomDetail,$Room_Rates)         
        {
			$sql  = "UPDATE roomtype set RoomType ='$RoomType',RoomDetail='$RoomDetail'
			,Room_Rates = '$Room_Rates' WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}
		public function DeleteRoomtype($id)         
        {
			$sql  = "DELETE FROM roomtype WHERE Id = $id;";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}		
		public function UpdateRoomStatus($id,$ids)         
        {
			
			$sql  = "UPDATE room set 	Status_Room ='$ids' WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
			
		}
		public function UpdateContract($id,$User,$flag)         
        {
			if($flag=="Delete")
			{
			$sql  = "UPDATE contract set Delete_By ='$User' ,Delete_Date=NOW() WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
			}else 
			{
			$sql  = "UPDATE contract set Delete_By =null ,Delete_Date=null WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;	
			}
		}
		public function GetBillStatus()         
        {
			$sql  = "SELECT * FROM roomstatus WHERE Id in(5,7,8,9) Order by Id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}
		public function UpdateBillStatus($id,$ids)         
        {
			$sql  = "UPDATE bill_room set Br_Status ='$ids' WHERE Id = $id; ";			
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}


}

?>