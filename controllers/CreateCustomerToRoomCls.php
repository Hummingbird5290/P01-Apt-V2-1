<?php
require_once( "Model/db_config.php");
class CustomerToRoom{
		
		public $db;
		public function __construct(){
	
                        $this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
			
		}
	//insert Customer	       
public function CreateCustomarToRoom($RoomId,$Title, $Name, $Lastname, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Book_Amount,$DateCon,$Idb)
        {      
                $sql = "INSERT INTO customer 
                (Room_Id,Title, Name, Last_Name, CardId, Email, Tel, Tel2, Address, Create_By, Create_Date, Update_By, Update_Date) 
                VALUES 
                ('$RoomId','$Title','$Name','$Lastname','$CardId','$Email','$Tel','$Tel2','$Address','$user',NOW(),'$user',NOW())";                
                $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                if ($result)
                {                        
                        $result = $this->CreateContract($RoomId,$user,$DateCon,$Book_Amount);                        
                }
                if ($result)
                {
                        if ($Idb!=null)
                        {
                        $result =$this->UdateStatusBooking($Idb);
                        }
                }
                if ($result)
                {
                $result =$this->UdateStatusRoom($RoomId);
                }
                return $result;
                //return $sql;  
                mysqli_close($this->db); 
        } 
        //insert Contract   
public function CreateContract($RoomId,$user,$DateCon,$Book_Amount)
        {     
                $ContractNo=1;  
                $sql="SELECT Max(ContractNo) ContractNo FROM contract Order by Id Desc limit 1 ;";		
		$Max =  $this->db->query($sql) ;
                $count_row = $Max->num_rows;
                if (isset($count_row)){ 
                        $obj = mysqli_fetch_object($Max);
                        $ContractNo = $obj->ContractNo + 1;                       
                }
                $CusId=0;
                // $T = "customer";
                // $WId ="Id";
                // $Id = $RoomId;
                // $OId = "Id";
                $CusId = $this->GetCustomer($RoomId);
                // $obj=$this->GetDataDesc($T,$WId,$Id,$OId);
                // $CusId=$obj->Id;
                // if ($CusId==0) {
                //         return false;
                // }	 
               //$DateCon = Datetime::createFromFormat('Y-m-d H:i:s', $DateCon)->format('d/m/y');
                $sql = "INSERT INTO contract (ContractNo, RoomId, Customer_id,Contract_Date,Book_Amount, Create_By, Create_Date, Update_By, Update_Date) VALUES ('$ContractNo','$RoomId','$CusId',STR_TO_DATE('$DateCon 01:00:00 AM', '%d/%m/%Y %r'),$Book_Amount,'$user',now(),'$user',now())";
                $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                        // if ($result){ return $result;}else{return false;}                        
                        return $sql;  
                        mysqli_close($this->db); 
        }
public function UdateStatusBooking($Idb)
        {     
                $result = false;                 
                $sql="UPDATE booking Set Status_Book = 1 where Id =$Idb ;";		
		$result =  $this->db->query($sql) ;
                //$count_row = $Maxs->num_rows;
                $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                //return  $sql;
                if ($result){return $result;}else{return false;}
                mysqli_close($this->db);  
        }
public function UdateStatusRoom($Id)
        {     
                $result = false;                 
                $sql="UPDATE room Set Status_Room = 1 ,Book_Id = null where Id =$Id ;";		
		$result =  $this->db->query($sql) ;
                //$count_row = $Maxs->num_rows;
                $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                //return  $sql;
                if ($result){return $result;}else{return false;}
                mysqli_close($this->db);  
        }      
        //Get data Customer
public function GetCustomer($RoomId)
        {     
                $result = false;                 
                $sql="SELECT *  FROM customer where Room_Id = $RoomId Order by Id Desc limit 1 ;";		
		$Maxs =  $this->db->query($sql) ;
                $count_row = $Maxs->num_rows;
                if (isset($count_row)){ 
                        $obj = mysqli_fetch_object($Maxs);
                        $result = $obj->Id;  
                   }   
                return $result;
                mysqli_close($this->db); 
        }   
public function GetDataDesc($T,$WId,$Id,$OId)
        {     
                $result = 0;  
                $sql="SELECT *  FROM $T where $WId  = $Id Order by $OId Desc limit 1;";
                        ////Check Customer is not in db then insert to the table
                        $Query =  $this->db->query($sql) ;
                        $count_row = $Query->num_rows;
                        if (isset($count_row)){ 
                                $obj = mysqli_fetch_object($Query);
                                $result = $obj;                     
                        } 	 
                return $result;       
                mysqli_close($this->db); 
        }                     
        //Process Update booking
public function CusUpdate($Idb,$RoomId,$Title, $Name, $Lastname, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Amount_book,$DateBook)
        {  
          $sql = "UPDATE booking Set Room_Id='$RoomId',Title='$Title',Name='$Name',Last_Name='$Lastname',CardId='$CardId',Email='$Email',Tel='$Tel',Tel2='$Tel2',Address='$Address',Update_By='$user', Update_Date=NOW(),Book_Amount='$Amount_book',Book_date = STR_TO_DATE('04/04/2012 04:03:35 AM', '%d/%m/%Y %r')
           Where Id ='$Idb';";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
         //return  $sql;
         if ($result){return $result;}else{return false;}
          mysqli_close($this->db); 
        }
        //Process Del
public function BookDel($Idb,$RoomId,$user)
        {  
           $sql = "UPDATE booking Set Delete_By='$user',Delete_Date=NOW(),Update_By='$user', Update_Date=NOW() Where Id ='$Idb';";
           $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
           
           if ($result){
                   $sql = "UPDATE room Set Book_Id = null Where Id ='$RoomId';";
                   $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                    if ($result){ return $result;}else{return false;}}else{return false;}
           mysqli_close($this->db); 
        }
        //Get data on booking where id
public function GetBooking($Idb)
        {       
                $sql="SELECT * FROM booking Where Id='$Idb' ;";		
		$Query =  $this->db->query($sql) ;
                $count_row = $Query->num_rows;
                if (isset($count_row)){                         
                     return mysqli_fetch_object($Query);
                }
                else{return false;}   
               mysqli_close($this->db); 
        }
}
?>
