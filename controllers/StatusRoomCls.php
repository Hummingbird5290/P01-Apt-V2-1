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
	4 => 'Room_Rates',
	5 => 'Sort'
);

// getting total number records without any search
$sql = "SELECT Room.Id,Room_No, RoomType_Id, room.Status_Room Status_Room, RoomType, RoomDetail, Room_Rates, rt.flag , 
(CASE 
        WHEN b.id IS null THEN CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name) 
        ELSE CONCAT(b.Title,' ',b.Name, ' ',b.Last_Name) END) As FullName,
        rs.RoomStatusDetail statusroom,room.Book_Id Book_Id,Sort 
        FROM room 
        INNER JOIN roomstatus rs ON room.Status_Room = rs.Id 
        INNER JOIN roomtype rt ON room.RoomType_Id = rt.Id 
        LEFT JOIN contract c ON c.RoomId= room.Id 
        LEFT JOIN customer cm ON cm.Id = c.Customer_id 
        LEFT JOIN booking b ON room.Book_Id = b.Id 
        WHERE c.Delete_Date is null 
";
//LEFT JOIN bill_room br ON room.Id = br.Bill_Room_Id
$sqlquery = $sql;
$query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//$sql .= " ORDER BY  content_id DESC";
//$sql .= " LIMIT 0,10";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" and ( Room_No LIKE '".$requestData['search']['value']."%'  )";}
$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");

$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 

				//$nestedData[] = "<a href=\"http://www.siamfocus.com/".  $row["sku"] . "/" .  $row["bb"] .".htm\" target=\"_blank\" title=\"". $row["content_title"] ."\">" . $row["content_title"] . "</a>";
                                $Book_Id =  $row["Book_Id"];
                                $RoomType_Id =$row["RoomType_Id"];
				$nestedData[] = $row["Room_No"];
				$nestedData[] = $row["FullName"];
                                $Room_Rates =$row["Room_Rates"];
				$print = " <a href='pages/examples/invoice-print.html' target='_blank class='btn btn-danger'><i class='fa fa-print'></i> Print</a>";
				 if( $RoomType_Id<=3)
                                        {$nestedData[] = "<span class=\"label label-success\">" . $row["RoomType"] . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>  &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
                                elseif( $RoomType_Id>=4 and$RoomType_Id<=6) 
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["RoomType"] . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>  &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
                                elseif(  $RoomType_Id>=7 and$RoomType_Id<=9) 
                                        {$nestedData[] = "<span class=\"label label-danger\">" . $row["RoomType"] . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>  &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
                                elseif(  $RoomType_Id>=10) 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>  &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
                                else 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>  &nbsp;  &nbsp;<span class=\"label label-default\">" . $row["RoomDetail"] . "</span>";}
                                
                               if($row["Status_Room"]==1)
                                        {$nestedData[] = "<span class=\"label label-success\">" . $row["statusroom"] . "</span>" ;}
                                elseif($row["Status_Room"]==2) 
                                 if(isset($Book_Id))
                                    {
                                        $nestedData[] = "<span class=\"label label-info\">" . $row["statusroom"] . "</span> <span class=\"label label-warning\">จอง</span>";
                                    }else{
                                        $nestedData[] = "<span class=\"label label-info\">" . $row["statusroom"] . "</span>" ;
                                    }
                                elseif($row["Status_Room"]==3)  
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}	
                                elseif($row["Status_Room"]==4)  
                                        {
                                        if(isset($Book_Id))
                                                {
                                                        $nestedData[] = "<span class=\"label label-danger\">" . $row["statusroom"] . "</span> <span class=\"label label-warning\">จอง</span>";
                                                }else
                                                {
                                                        $nestedData[] = "<span class=\"label label-danger\">" . $row["statusroom"] . "</span>";
                                                }    
                                        }
                                        
                                else  
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}	
				
				$nestedData[] ="";	
				$nestedData[] = "";			
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
