<?php

require_once ('../Model/config.php');
// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'Room_No', 
	1 => 'FullName',
	2 => 'RoomType_Id',
	3 => 'Status_Room', 
	4 => 'billId',
	5 => 'Room_No'
);

// getting total number records without any search
$sql = "SELECT Room.Id as roomid,Room_No, RoomType_Id,Status_Room, RoomType, RoomDetail, Room_Rates, rt.flag ,
CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name) As FullName,bo.Id as billId 
FROM room 
INNER JOIN roomstatus rs ON room.Status_Room = rs.Id 
INNER JOIN roomtype rt ON room.RoomType_Id = rt.Id 
LEFT JOIN contract c ON c.RoomId= room.Id 
LEFT JOIN customer cm ON cm.Id = c.Customer_id 
LEFT JOIN bill_other bo ON  bo.Room_Id =  room.Id  ";
$sqlquery = $sql;
$query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//$sql .= " ORDER BY  content_id DESC";
//$sql .= " LIMIT 0,10";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" where ( Room_No LIKE '".$requestData['search']['value']."%'  )";
	}
$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");

$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */

$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 

				//$nestedData[] = "<a href=\"http://www.siamfocus.com/".  $row["sku"] . "/" .  $row["bb"] .".htm\" target=\"_blank\" title=\"". $row["content_title"] ."\">" . $row["content_title"] . "</a>";
				$nestedData[] = $row["Room_No"];
				$nestedData[] = $row["FullName"];

				$print = " <a href='pages/examples/invoice-print.html' target='_blank class='btn btn-danger'><i class='fa fa-print'></i> Print</a>";
				if($row["RoomType_Id"]==1)
					{$nestedData[] = "<span class=\"label label-success\">" . $row["RoomType"] . "</span>   &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
					else 
					{$nestedData[] = "<span class=\"label label-danger\">" . $row["RoomType"] . "</span>   &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
				
				// if($row["Status_Room"]==1)
				// 	{$nestedData[] = "<span class=\"label label-success\">" . $row["statusroom"] . "</span>" ;}
				// 	elseif($row["Status_Room"]==2) 
				// 	{$nestedData[] = "<span class=\"label label-info\">" . $row["statusroom"] . "</span>" ;}
				// 	elseif($row["Status_Room"]==3)  
				// 	{$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}	
				// 	elseif($row["Status_Room"]==4)  
				// 	{$nestedData[] = "<span class=\"label label-danger\">" . $row["statusroom"] . "</span>";}
				// 	else  
				// 	{$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}		
				
				// $nestedData[] = $row["billId"];	
				$roomID =  $row["roomid"];
				$billId = $row["billId"];
                // $_SESSION['roomid']  = $roomID;
				//  $nestedData[] = "<a href='CreateSupplyRoom.php?$roomID'>เลือก</a>" ;
				//$nestedData[] ="<a href=\"Formprintreceipt.php?id=$roomID&bid=$billId&type=4\"onclick=\"window.open(this.href,'window','width=840,height=880,resizable,scrollbars,toolbar,menubar') ;return false;\">เลือก<a>";
				  $nestedData[] ="<a href ='CreateBill_Other.php?id=$roomID&bid=$billId&type=4'>เลือก</a>";
				
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