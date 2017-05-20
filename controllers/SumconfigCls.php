<?php 
require( "Model/db_config.php");
class sumconfigallHm {
    public $db;
    public function __construct(){
       $this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
    }
    //Show data to input text 
    public function Showdata (){
        $sql ="SELECT * FROM configobj";
        $result =$this->db->query($sql);
        $row = $result->fetch_object();
        $count_row = $result->num_rows;
            return $row;
    }   
    //Check type config data when click button session_save_path.
    //If not have data type insert but have data type update       
    public function Checktype_config($numwater,$numeletric){
            $sql ="SELECT * FROM configobj";
            $result = $this->db->query($sql);
            $count_row = $result->num_rows;           
            if ($count_row == 0){           
				$sql="INSERT INTO configobj SET Water = $numwater, Electricity=$numeletric, Flag ='1'";
				$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;    
			}
			else {                
                $sql ="UPDATE configobj SET Water = $numwater, Electricity = $numeletric ";
                $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot update");
                return $result;
                }                  
    }
    //Get room number of per room show to textbox
    public function Getroom_number($Roomid){
            $sql="SELECT * FROM room WHERE  Id='$Roomid' ";	
			$result = mysqli_query($this->db,$sql);
        	$room_data = mysqli_fetch_object($result);        				
        	return $room_data;	        
    }
    //Check month and year of input data and diff month and year per room
    public function CheckMonthYear($Roomid){
             $sql="SELECT * FROM bill_room WHERE  Room_Id ='$Roomid' ";
             $result = mysqli_query($this->db,$sql);
        	 $bill_data = mysqli_fetch_object($result);
             $datecreate = $bill_data->Create_Date; 
             $newDateCreate = Datetime::createFromFormat('Y-m-d H:i:s', $datecreate)->format('m-Y');
             $datenow = new DateTime();  
             $datenow =  $datenow->format('m-Y'); 
             if ($newDateCreate == $datenow){
                 return "TRUE";
             }else{
                return "FALSE";
             }                    	

    }
    //Get month and year of per room
    public function GetMYNow($Roomid){
        $sql="SELECT * FROM bill_room WHERE  Room_Id = '$Roomid' AND 
        DATE_FORMAT(CAST(Create_Date as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y') ";
        $result = mysqli_query($this->db,$sql);
        $bill_data = mysqli_fetch_object($result);
        $month = $bill_data;
        return $month;
    }
    //check month frist
     public function GetFirstExpen($Roomid){
             $sql = "SELECT * FROM bill_room WHERE Room_Id = '$Roomid' ";
             $result = mysqli_query($this->db,$sql);
             $bill_data = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 1){  
                  return false;
              }else{
                  return true;
              }
    }
   
    //Get max value from bill per room per month
    public function Getmaxbill(){
             $sql = "SELECT MAX(Bill_No) Bill_No FROM bill_room  ";           
             $result = mysqli_query($this->db,$sql);
             $maxbill = mysqli_fetch_object($result);            
              if ($maxbill == null){  
                  return 1;
              }else{
                  $maxs = (int)$maxbill->Bill_No;
                  return $maxs + 1 ;
              } 
    }
    //Get price of per room 
    public function Getpriceroom($Rtype_id){
             $sql = "SELECT * FROM roomtype WHERE Id ='$Rtype_id' ";
             $result = mysqli_query($this->db,$sql);
             $detail_priceroom = mysqli_fetch_object($result);        				
        	return $detail_priceroom;             
    }
    //Use Formexpenroom.php Insert expen of per  room 
    public function Save_expenroom($Roomid,$BillNo,$Room_lese,$Eletric_unit,$Eletric_unitEnd,$Water_unit,$Water_unitEnd,$fonniture_Lease,
    $sevice_Lease,$phone_Lease,$sumwater,$sumeletric,$total,$namelog,$clicktype){      
        if ($clicktype != "submit"){
         $idroombill = $this->GetId_roombill($Roomid);
         $id = $idroombill->Id;
         $sql = "UPDATE bill_forniture SET Forniture_Lease = $fonniture_Lease WHERE Bill_Room_Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "UPDATE bill_service SET Service_Lease = $sevice_Lease WHERE Bill_Room_Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "UPDATE bill_water SET Water_Unit = $Water_unit ,
         Water_Unit_End = $Water_unitEnd , Water_Price =$sumwater WHERE Bill_Room_Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "UPDATE bill_electricity SET Electricity_Unit = $Eletric_unit ,
         Electricity_Unit_End = $Eletric_unitEnd , Electricity_Price  =$sumeletric WHERE Bill_Room_Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "UPDATE  bill_phone SET Phone_Lease = $phone_Lease WHERE Bill_Room_Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "UPDATE  bill_room SET Total_Amount = $total WHERE Id  = $id ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

        }else{
         $sql = "INSERT INTO bill_room SET Room_Id = $Roomid,Bill_No = $BillNo, Br_Status = '5', 
         Create_Date = NOW(), Create_By = $namelog,Total_Amount = $total ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $idroombill = $this->GetId_roombill($Roomid);
         $id = $idroombill->Id;

         $sql = "INSERT INTO bill_priceroom SET Bill_Room_Id  = $id ,Priceroom = $Room_lese ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "INSERT INTO bill_forniture SET Bill_Room_Id  = $id ,Forniture_Lease = $fonniture_Lease ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 

         $sql = "INSERT INTO bill_service SET Bill_Room_Id  = $id ,Service_Lease = $sevice_Lease ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "INSERT INTO bill_water SET Bill_Room_Id  = $id ,Water_Unit = $Water_unit ,
         Water_Unit_End = $Water_unitEnd , Water_Price =$sumwater ";

         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
         $sql = "INSERT INTO bill_electricity SET Bill_Room_Id  = $id ,Electricity_Unit = $Eletric_unit ,
         Electricity_Unit_End = $Eletric_unitEnd , Electricity_Price  =$sumeletric ";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");

         $sql = "INSERT INTO bill_phone SET Bill_Room_Id  = $id ,Phone_Lease = $phone_Lease ";				
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");    
        }
         return $result; 
    }
    //Calculate total expen of per room 
    public function GetId_roombill($Roomid){
             $sql = "SELECT * FROM bill_room WHERE Room_Id = '$Roomid' AND Br_Status = '5' ORDER BY ID DESC LIMIT 1";
             $result = mysqli_query($this->db,$sql);
             $id_roombill = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $id_roombill;
              }else{
                  return null;
              }
    }
    //get id bill_room by id
     public function GetId_roombillById($bid){
             $sql = "SELECT * FROM bill_room WHERE Id = '$bid' ";
             $result = mysqli_query($this->db,$sql);
             $id_roombill = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $id_roombill;
              }else{
                  return null;
              }
    }
    public function GetFornlese($Billid){
             $sql = "SELECT * FROM bill_forniture WHERE Id = '$Billid'";
             $result = mysqli_query($this->db,$sql);
             $Forniture = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $Forniture;
              }else{
                  return null;
              }
    }
    public function GetServlese($Billid){
             $sql = "SELECT * FROM bill_service WHERE Id = '$Billid'";
             $result = mysqli_query($this->db,$sql);
             $Service = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $Service;
              }else{
                  return null;
              }
    }
    public function GetWaterlese($Billid){
             $sql = "SELECT * FROM bill_water WHERE Id = '$Billid' ";
             $result = mysqli_query($this->db,$sql);
             $Water = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $Water;
              }else{
                  return null;
              }
    }
    public function GetElectriclese($Billid){
             $sql = "SELECT * FROM bill_electricity WHERE Id = '$Billid' ";
             $result = mysqli_query($this->db,$sql);
             $Electric = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $Electric;
              }else{
                 return null;
              }
    }
    public function GetPhone($Billid){
             $sql = "SELECT * FROM bill_phone WHERE Id = '$Billid' ";
             $result = mysqli_query($this->db,$sql);
             $Phone = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $Phone;
              }else{
                  return null;
              }
    }
    
    //Get title name lastname of customer 
    public function Getnamecustomer($Roomid){
        $sql="SELECT cm.Title as Title,cm.Name as Name ,cm.Last_Name as Last_Name  FROM room 
        LEFT JOIN contract c ON c.RoomId= room.Id 
        LEFT JOIN customer cm ON cm.Id = c.Customer_id 
        WHERE  room.Id ='$Roomid' ";	
        $result = mysqli_query($this->db,$sql);
        while($row = mysqli_fetch_array($result)){
           $Name_cus=array();
           $Name_cus= $row["Title"]." ".$row["Name"]." ".$row["Last_Name"];
        }
        return $Name_cus;
    }
    //Update flag when click print invoice per room
    public function UpdateFlagStatus7($idbill){
        $sql ="UPDATE bill_room SET  Br_Status = '7'  WHERE Id = '$idbill' ORDER BY ID DESC LIMIT 1 ";
        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot update");
        return $result;
    }
    public function UpdateFlagStatus8($idbill){
        $sql ="UPDATE bill_room SET  Br_Status = '8'  WHERE Id = '$idbill' ORDER BY ID DESC LIMIT 1 ";
        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot update");
        return $result;
    }
    public function UpdateFlagStatus9($idbill){
        $sql ="UPDATE bill_room SET  Br_Status = '9'  WHERE Id = '$idbill' ORDER BY ID DESC LIMIT 1 ";
        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot update");
        return $result;
    }
    
    //Get detaildata room type 3 when customer room booking 
    //---------------------- Get function data form print --------
    public function GetRoombooking($billId){
        $sql="SELECT * FROM booking WHERE  Id = '$billId' ";	
		$result = mysqli_query($this->db,$sql);
             $booking_data = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $booking_data;
              }else{
                  return false;
              }
    }
    public function GetBilltype($type){
            $sql="SELECT * FROM bill_type WHERE Bill_No ='$type' ";	
			$result = mysqli_query($this->db,$sql);
        	$billtype_data = mysqli_fetch_object($result);        				
        	return $billtype_data;
    }
    public function GetDataformbill($Roomid,$billId,$type){
     if($type == 1 ){
        $totalamount = $this->GetId_roombillById($billId);
        $totalnum = number_format($totalamount->Total_Amount, 2, '.', ',');
        $totalamountthai =  $this->num2wordsThai(number_format($totalamount->Total_Amount, 2, '.', ','));

        $sql = "SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 1) Bill_Detail, FORMAT(bp.Priceroom,2) Price
        FROM bill_room br INNER JOIN bill_priceroom bp ON bp.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 2) Bill_Detail,FORMAT(bf.Forniture_Lease,2) Price
        FROM bill_room br INNER JOIN bill_forniture bf ON bf.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 3) Bill_Detail,FORMAT(bs.Service_Lease,2) Price
       FROM bill_room br INNER JOIN bill_service bs ON bs.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 4),' ',
        '(',bw.Water_Unit,'-',bw.Water_Unit_End,')' ) Bill_Detail,FORMAT(bw.Water_Price,2) Price
        FROM bill_room br INNER JOIN bill_water bw ON bw.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 5),'  ',
        '(',be.Electricity_Unit,'-',be.Electricity_Unit_End,')' ) Bill_Detail,FORMAT(be.Electricity_Price,2) Price
        FROM bill_room br INNER JOIN bill_electricity be ON be.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 6) Bill_Detail,FORMAT(bh.Phone_Lease,2) Price
        FROM bill_room br INNER JOIN bill_phone bh ON bh.Bill_Room_Id = br.Id WHERE br.Id = '$billId'  
        UNION ALL  
        SELECT CONCAT('(','$totalamountthai',')'),'$totalnum'  ";
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
    }elseif($type == 2){
        $totalamount = $this->GetRoombooking($billId);
        $totalnum = number_format($totalamount->Book_Amount, 2, '.', ',');
        $totalamountthai =  $this->num2wordsThai(number_format($totalamount->Book_Amount, 2, '.', ','));
        $sql = "SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 7) Bill_Detail,
        FORMAT(bk.Book_Amount,2) Price FROM booking bk WHERE bk.Id = '$billId'
        UNION ALL
        SELECT CONCAT('(','$totalamountthai',')'),'$totalnum' ";
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
    }elseif($type == 3){
        $totalamount = $this->GetId_roombillById($billId);
        $totalnum = number_format($totalamount->Total_Amount, 2, '.', ',');
        $totalamountthai =  $this->num2wordsThai(number_format($totalamount->Total_Amount, 2, '.', ','));

        $sql = "SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 1) Bill_Detail, FORMAT(bp.Priceroom,2) Price
        FROM bill_room br INNER JOIN bill_priceroom bp ON bp.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 2) Bill_Detail,FORMAT(bf.Forniture_Lease,2) Price
        FROM bill_room br INNER JOIN bill_forniture bf ON bf.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 3) Bill_Detail,FORMAT(bs.Service_Lease,2) Price
       FROM bill_room br INNER JOIN bill_service bs ON bs.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 4),' ',
        '(',bw.Water_Unit,'-',bw.Water_Unit_End,')' ) Bill_Detail,FORMAT(bw.Water_Price,2) Price
        FROM bill_room br INNER JOIN bill_water bw ON bw.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 5),'  ',
        '(',be.Electricity_Unit,'-',be.Electricity_Unit_End,')' ) Bill_Detail,FORMAT(be.Electricity_Price,2) Price
        FROM bill_room br INNER JOIN bill_electricity be ON be.Bill_Room_Id = br.Id WHERE br.Id = '$billId'
        UNION ALL
        SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 6) Bill_Detail,FORMAT(bh.Phone_Lease,2) Price
        FROM bill_room br INNER JOIN bill_phone bh ON bh.Bill_Room_Id = br.Id WHERE br.Id = '$billId'  
        UNION ALL  
        SELECT CONCAT('(','$totalamountthai',')'),'$totalnum'  ";
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
    }elseif($type == 4){
        $totalamount = $this->SumpriceOtherbill($billId);
        $totalnum = number_format($totalamount->sumprice, 2, '.', ',');
        $totalamountthai =  $this->num2wordsThai(number_format($totalamount->sumprice, 2, '.', ','));
        $sql = "SELECT 	Detail Bill_Detail,FORMAT(Price,2) Price FROM bill_other  WHERE Room_id = '$billId'
        UNION ALL
        SELECT CONCAT('(','$totalamountthai',')'),'$totalnum' ";
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
    }
    
    public function GetMaxOtherbill($id){
        $maxbill = 0;
        $sql = "SELECT  MAX(Bill_No) as Bill_No ,Id FROM bill_other 
        WHERE Room_Id = $id and Status_Bill = 0 and Delete_Date is null "; 
               
        $result =  $this->db->query($sql) ;
        $count_row = $result->num_rows;
        if($count_row>0)
        {
            //กรณีกรอกข้อมูลแล้วยังไม่พิมพ์เลยเอาเลข max เดียวกัน
            $maxbill = mysqli_fetch_object($result);
            $maxs = (int)$maxbill->Bill_No;
            if($maxs ==0){$maxs=$maxs+1;}
            return $maxs;
        }else
        {
            //กรณีไม่มีการกรอกข้อมูลมาก่อน
            $sql = "SELECT  MAX(Bill_No) as Bill_No  FROM bill_other 
            WHERE Delete_Date is null ";           
            $result = mysqli_query($this->db,$sql);
            $count_row = $result->num_rows;                        
              if ($count_row == 0){  
                  return 1;
              }else{
                  $maxbill = mysqli_fetch_object($result);
                  $maxs = (int)$maxbill->Bill_No;
                  return $maxs + 1 ;
              } 
        }




             

    }
    public function GetOtherbill($billId){
        $sql="SELECT * FROM bill_other WHERE  Room_Id = '$billId' ";	
		$result = mysqli_query($this->db,$sql);
             $booking_data = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $booking_data;
              }else{
                  return false;
              }
    }
    public function SumpriceOtherbill($billId){
        $sql="SELECT SUM(Price) as sumprice FROM bill_other WHERE  Room_Id = '$billId'   ";	
		$result = mysqli_query($this->db,$sql);
             $booking_data = mysqli_fetch_object($result);
             $count_row = $result->num_rows;
              if ($count_row > 0){  
                  return $booking_data;
              }else{
                  return false;
              }
    }
    public function InsertOtherbill($id,$room_id,$bll_no,$first_name,$last_name,$btn_name){
        if($btn_name == "บันทึกข้อมูล"){
            $sql = "INSERT INTO bill_other SET Room_Id  = $room_id ,Bill_No = $bll_no,Detail=$first_name,
            Price =$last_name,Create_Date = NOW() ";
            $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");       
        }else{
            //$btn_name == 'แก้ไขข้อมูล' 
            $sql = "UPDATE bill_other SET first_name = '$first_name', last_name = '$last_name',Create_Date = NOW() WHERE Id = '$id' ";
            $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");      
        }
        
    }
    //-------------------------------------------------------------
    //Convert sumtotal from number to wordthai    
    public function num2wordsThai($number){
       $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
       $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
       $number = str_replace(",","",$number); 
       $number = str_replace(" ","",$number); 
       $number = str_replace("บาท","",$number); 
       $number = explode(".",$number);
       if(sizeof($number)>2){
           return 'ทศนิยมหลายตัวนะจ๊ะ'; 
           exit;
       }
       $strlen = strlen($number[0]); 
       $convert = ''; 
       for($i=0;$i<$strlen;$i++){
           $n = substr($number[0], $i,1);
           if($n!=0){
               if($i==($strlen-1) AND $n==1){
                   $convert .= 'เอ็ด';
               }elseif($i==($strlen-2) AND $n==2){
                   $convert .= 'ยี่';
               }elseif($i==($strlen-2) AND $n==1){
                   $convert .= '';
               }else{
                   $convert .= $txtnum1[$n];
               }
               $convert .= $txtnum2[$strlen-$i-1];
           }
       }
       $convert .= 'บาท';
       if($number[1]=='0' OR $number[1]=='00' OR $number[1]==''){
           $convert .= 'ถ้วน';
       }else{
           $strlen = strlen($number[1]);
           for($i=0;$i<$strlen;$i++){
               $n = substr($number[1], $i,1);
               if($n!=0){
                   if($i==($strlen-1) AND $n==1){
                       $convert .= 'เอ็ด';
                   }elseif($i==($strlen-2) AND $n==2){
                       $convert .= 'ยี่';
                   }elseif($i==($strlen-2) AND $n==1){
                       $convert .= '';
                   }else{
                       $convert .= $txtnum1[$n];
                   }
                   $convert .= $txtnum2[$strlen-$i-1];
               }
           }
           $convert .= 'สตางค์';
       }

       return $convert; 
    }
}
?>