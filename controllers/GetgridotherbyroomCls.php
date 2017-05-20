<?php
require_once ('../Model/config.php');
// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'Id', 
	1 => 'Price'
	// 2 => 'RoomType_Id',
	// 3 => 'Status_Room', 
	// 4 => 'total',
	// 5 => 'Room_No'
);
$Roomid =0;
if (isset($_GET['roomid']))   {$Roomid = $_GET['roomid'];}
// getting total number records without any search
$sql = "SELECT *
FROM bill_other
WHERE Room_Id ='$Roomid' AND Delete_Date IS NULL AND Status_Bill =0
 ";
$sqlquery = $sql;
$query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.="AND  ( Id LIKE '".$requestData['search']['value']."%'  )";
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
				$billId =  $row["Id"];
				$Detail = $row["Detail"];	
				$Price = $row["Price"];				
						
				$nestedData[] = $Detail;
				$nestedData[] = $Price;
				if ($Price != NULL){
					$nestedData[] ="<a href ='CreateBill_Other.php?id=$Roomid&bid=$billId&flag=Edit'><font color='green'>แก้ไข</font></a>";
					$nestedData[] ="<a href ='CreateBill_Other.php?id=$Roomid&bid=$billId&flag=Delete' onclick=\"return confirm('ยืนยันลบรายการ!!!')\"><font color='red'>ลบ</font></a>";
				}							
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