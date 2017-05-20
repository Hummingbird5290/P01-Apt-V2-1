<?php
require_once ('../Model/config.php');
 
// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'Bill_Detail', 
	1 => 'Price'
	// 2 => 'RoomType_Id',
	// 3 => 'Status_Room', 
	// 4 => 'total',
	// 5 => 'Room_No'
);
// $Roomid =0;
// $BiRoId = 0;
if ($_GET['roomid']!=0){
	$Roomid = $_GET['roomid'];	
	$sql = "SELECT Id FROM bill_room WHERE Room_Id = '$Roomid' AND Br_Status = '5' ORDER BY ID DESC LIMIT 1";
	$result = mysqli_query($db,$sql);
	$id_roombill = mysqli_fetch_object($result);
        $count_row = $result->num_rows;
        if ($count_row > 0){  
           $BiRoId = $id_roombill->Id;
			//echo  "BiRoId" & $BiRoId;
			$sql = "SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 4),' ',
					'(',bw.Water_Unit,'-',bw.Water_Unit_End,')' ) Bill_Detail,FORMAT(bw.Water_Price,2) Price ,
					br.Id billId,bw.Id rowId
			FROM bill_room br INNER JOIN bill_water bw ON bw.Bill_Room_Id = br.Id WHERE br.Id = '$BiRoId'
					UNION ALL
			SELECT CONCAT((SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 5),'  ',
					'(',be.Electricity_Unit,'-',be.Electricity_Unit_End,')' ,' ',
						CASE WHEN be.Electricity2_Unit_End = 0 THEN ' '
						ELSE  CONCAT ('(',be.Electricity2_Unit,'-',be.Electricity2_Unit_End,')')  END 
						) Bill_Detail,FORMAT(Sum(be.Electricity_Price)+Sum(be.Electricity2_Price),2) Price ,
						br.Id billId,be.Id rowId
			FROM bill_room br INNER JOIN bill_electricity be ON be.Bill_Room_Id = br.Id WHERE br.Id = '$BiRoId'
			UNION ALL
			SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 9) Bill_Detail,
			FORMAT(bc.Roomclean_Lease,2) Price,br.Id billId,bc.Id rowId
			FROM bill_room br INNER JOIN bill_roomclean bc ON bc.Bill_Room_Id = br.Id WHERE br.Id = '$BiRoId'
			UNION ALL
			SELECT (SELECT Bill_Detail FROM bill_groupdetail WHERE Bill_GroupDetail_No = 10) Bill_Detail,
			FORMAT(bd.Damage_Lease,2) Price,br.Id billId ,bd.Id rowId
			FROM bill_room br INNER JOIN bill_otherdamage bd ON bd.Bill_Room_Id = br.Id WHERE br.Id = '$BiRoId'
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
							$billId =  $row["billId"];
							$rowId = $row["rowId"];
							$Detail = $row["Bill_Detail"];	
							$Price = $row["Price"];	
							$nestedData[] = $Detail;
							$nestedData[] = $Price;
							if ($Price != NULL){
								$nestedData[] ="<a href ='CreateBill_Otherexpen.php?id=$Roomid&bid=$billId&row=$rowId&flag=Edit'><font color='green'>แก้ไข</font></a>";
								$nestedData[] ="<a href ='CreateBill_Otherexpen.php?id=$Roomid&bid=$billId&row=$rowId&flag=Delete' onclick=\"return confirm('ยืนยันลบรายการ!!!')\"><font color='red'>ลบ</font></a>";
							}						
					$data[] = $nestedData;
				}	
			$json_data = array(
						"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
						"recordsTotal"    => intval( $totalData ),  // total number of records
						"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
						"data"            => $data   // total data array
						);
        }else{
        $nestedData=array(); 
		$nestedData[] = "";
		$nestedData[] = "";	
		$nestedData[] = "";	
		$nestedData[] = "";
		$data[] = $nestedData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => "0",  // total number of records
			"recordsFiltered" => "", // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data  // total data array
			);} 
}else{
		$nestedData=array(); 
		$nestedData[] = "";
		$nestedData[] = "";	
		$nestedData[] = "";	
		$nestedData[] = "";
		$data[] = $nestedData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => "0",  // total number of records
			"recordsFiltered" => "", // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data  // total data array
			);}
echo json_encode($json_data);  // send data as json format

?>