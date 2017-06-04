<?php
require_once ('../Model/config.php');
// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'Room_No', 
	1 => 'RoomType_Id',
	2 => 'Status_Room',
	3 => 'Status_Room'
);
if(!isset($_SESSION)) 
                  { 
                      session_start(); 
                  } 
// getting total number records without any search
/*$sql = "SELECT r.Id  roomid,r.Room_No Room_No,r.RoomType_Id RoomType_Id, r.Status_Room Status_Room , 
RoomType, RoomDetail ,
rs.RoomStatusDetail statusroom,
(SELECT rst.RoomStatusDetail  FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) flag,
(SELECT br.Id FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) billId
FROM room r
INNER JOIN roomstatus rs ON r.Status_Room = rs.Id 
INNER JOIN roomtype rt ON r.RoomType_Id = rt.Id 
INNER JOIN contract c ON r.Id = c.RoomId
LEFT JOIN bill_room rb ON  rb.Room_Id = r.Id   
WHERE (CASE WHEN c.Delete_Date is null THEN c.Delete_Date is null ELSE c.Id = (select c1.Id from contract c1 where c1.RoomId =  r.Id  ORDER BY ID DESC LIMIT 1) END) 
AND r.Status_Room  IN (4) AND rb.Br_Status  IN (5)    ";*/
$sql = "SELECT r.Id Id,r.Room_No Room_No,r.RoomType_Id RoomType_Id, r.Status_Room Status_Room , 
RoomType, RoomDetail, Room_Rates ,CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name) As FullName,
rs.RoomStatusDetail statusroom,
(SELECT br.Total_Amount FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y') ORDER BY br.Id DESC LIMIT 1) TotalAmount,
(SELECT rst.RoomStatusDetail  FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) flag,
(SELECT br.Br_Status  FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) flag2,
(SELECT br.Id FROM bill_room br 
INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) billId
FROM room r
INNER JOIN roomstatus rs ON r.Status_Room = rs.Id 
INNER JOIN roomtype rt ON r.RoomType_Id = rt.Id 
inner JOIN contract c ON r.Id = c.RoomId
inner JOIN customer cm ON c.Customer_id = cm.Id
WHERE (CASE WHEN c.Delete_Date is null THEN c.Delete_Date is null ELSE c.Id = (select c1.Id from contract c1 where c1.RoomId =  r.Id  ORDER BY ID DESC LIMIT 1) END)
";
$sqlquery = $sql;
$query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//$sql .= " ORDER BY  content_id DESC";
//$sql .= " LIMIT 0,10";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" and ( Room_No LIKE '".$requestData['search']['value']."%'  )";
	}
$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");

$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 
				// $nestedData[] = "<a href=\"http://www.siamfocus.com/".  $row["sku"] . "/" .  $row["bb"] .".htm\" target=\"_blank\" title=\"". $row["content_title"] ."\">" . $row["content_title"] . "</a>";
				$roomID =  $row["Id"];
				$billId = $row["billId"];
				$Status_Room = $row["Status_Room"];
				$RoomType_Id = $row["RoomType_Id"];
				$RoomType = $row["RoomType"];
				$flag = $row["flag"];
				// $nestedData[] = $row["FullName"];
				$print = " <a href='pages/examples/invoice-print.html' target='_blank class='btn btn-danger'><i class='fa fa-print'></i> Print</a>";
				
				// if($row["RoomType_Id"]==1)
				// 	{
				// 		$nestedData[] = "<span class=\"label label-success\">" . $row["RoomType"] . "</span>";}
				// 	else 
				// 	{
				// 		$nestedData[] = "<span class=\"label label-danger\">" . $RoomType_Id  . "</span>";}
				$nestedData[] = $row["Room_No"];
				//********************************************************************************************************				
				if ($flag==NULL){
					$flag = "ยังไม่ได้บันทึก";
				}else{
					$flag = $row["flag"];
				}	
				if($row["Status_Room"]==1)
				{$nestedData[] = "<span class=\"label label-danger\">" . $RoomType  . "</span>&nbsp;<span class=\"label label-success\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $flag . "</span>";}
				elseif($row["Status_Room"]==2) 
				{$nestedData[] = "<span class=\"label label-danger\">" . $RoomType  . "</span>&nbsp;<span class=\"label label-info\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $flag . "</span>";}
				elseif($row["Status_Room"]==3)  
				{$nestedData[] = "<span class=\"label label-danger\">" . $RoomType  . "</span>&nbsp;<span class=\"label label-warning\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $flag . "</span>";}	
				elseif($row["Status_Room"]==4)  
				{$nestedData[] = "<span class=\"label label-danger\">" . $RoomType  . "</span>&nbsp;<span class=\"label label-danger\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $flag . "</span>";}
				else  
				{$nestedData[] = "<span class=\"label label-danger\">" . $RoomType  . "</span>&nbsp;<span class=\"label label-warning\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $flag . "</span>";}	
				//********************************************************************************************************
				if ($row["TotalAmount"] == NUll ){
					$nestedData[] = "0.00";
				}else{
					$nestedData[] = $row["TotalAmount"];
				}	
				//********************************************************************************************************						
				$roomID =  $row["Id"];
				$billId = $row["billId"];
				if($Status_Room == 4)	{				
				if ($row["TotalAmount"]==NULL){
					$nestedData[] = "<a href ='CreateBill_Otherexpen.php?id=$roomID&bid=$billId&flag=Save&sr=$Status_Room'>เลือก</a>";
				 }else{
					$nestedData[] = "<a href ='CreateBill_Otherexpen.php?id=$roomID&bid=$billId&flag=Edit&sr=$Status_Room'><font color='red'>แก้ไข</font></a>";
				 }
				}else {	
					if ($row["flag2"]== 8 or $row["flag2"]== 9 ){
						$nestedData[] = "<span class=\"label label-danger\">ยีนยันแล้ว</span>";
					}else{
						if ($row["TotalAmount"]==NULL){
							$nestedData[] = "<a href ='CreateBill_Otherexpen.php?id=$roomID&bid=$billId&flag=Save&sr=$Status_Room'>เลือก</a>";
							}else{
								$nestedData[] = "<a href ='CreateBill_Otherexpen.php?id=$roomID&bid=$billId&flag=Edit&sr=$Status_Room'><font color='red'>แก้ไข</font></a>";
								}
						}			
				}		
				//********************************************************************************************************
								
		$data[] = $nestedData;
	}
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format
?>