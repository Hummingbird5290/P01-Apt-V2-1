<?php
require_once( "Model/db_config.php");
class Contract{
		
		public $db;
		public function __construct(){
			$this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
		}
          /*** for Getdata in table room process ***/
		public function GetContractAll()        
        {
			$sql="SELECT * FROM contract where ";			
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
		public function GetContract($Id)         
        {
			$sql  = "SELECT * FROM contract WHERE Id =$Id;";			
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
        public function GetContractByRoomId($RId)         
        {
			$sql  = "SELECT * FROM contract WHERE RoomId =$RId ORDER BY Id DESC LIMIT 1;";			
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
      

}

?>