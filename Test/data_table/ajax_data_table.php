<?php
/* Database connection start */
  $servername = "localhost";
  $username = "apt";
  $password = "apt1234";
  $dbname = "hoteldb";

  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
  mysqli_set_charset($conn,"utf8");
/* Database connection end */
//require("con.php");

// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'content_title', 
	1 => 'content_group_name',
	2 => 'content_create',
);

// getting total number records without any search
$sql = "SELECT cs.content_id,cs.content_title,cs.content_group_id,c.content_group_name,cs.sku,c.sku FROM tbl_content cs,tbl_content_group c ";
$sql .= " WHERE c.content_group_id=cs.content_group_id";

$query=mysqli_query($conn, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

//$sql = "SELECT cs.content_title, employee_salary, employee_age ";
//$sql.=" FROM employee WHERE 1=1";

$sql = "SELECT cs.content_id,cs.content_title,cs.content_group_id,c.content_group_name,cs.sku as bb,c.sku,cs.content_update FROM tbl_content cs,tbl_content_group c ";
$sql .= " WHERE c.content_group_id=cs.content_group_id";
//$sql .= " ORDER BY  content_id DESC";
//$sql .= " LIMIT 0,10";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( cs.content_title LIKE '".$requestData['search']['value']."%'  )";
}
$query=mysqli_query($conn, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");

$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";


				
				//print "<script language=\"javascript\" type=\"text/javascript\">";
				//print "alert('" .  $sql . "');";
				//print "<script>";
				//die();
				

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = "<a href=\"http://www.siamfocus.com/".  $row["sku"] . "/" .  $row["bb"] .".htm\" target=\"_blank\" title=\"". $row["content_title"] ."\">" . $row["content_title"] . "</a>";
	$nestedData[] = $row["content_group_name"];
	$nestedData[] = $row["content_update"];

	
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
