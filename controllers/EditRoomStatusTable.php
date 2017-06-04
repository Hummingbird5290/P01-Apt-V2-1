  <?php
                require_once ('../Model/config.php');   
                          
                $requestData = $_REQUEST;
                $columns = array( 
                        0 => 'Room_No', 
                        //1 => 'FullName',
                        1 => 'FullName',
                        2 => 'RoomType_Id', 
                        3 => 'Status_Room',
                        4 => 'Status_Room'
                );
                // $sql = "SELECT Room.Id Id,room.Room_No Room_No, RoomType_Id, Start_date, End_Date, Status_Room, RoomType, RoomDetail, Room_Rates, rt.flag ,
                // rs.RoomStatusDetail statusroom,CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name)As FullName,c.Id ConId,rb.Id brid
                // FROM room 
                // INNER JOIN contract c ON c.RoomId= room.Id
                // INNER JOIN customer cm ON cm.Id = c.Customer_id
                // INNER JOIN roomtype rt ON room.RoomType_Id = rt.Id 
                // INNER JOIN bill_room rb ON rb.Room_Id = room.Id 
                // INNER JOIN roomstatus rs ON rb.Br_Status = rs.Id               
                // WHERE  (room.Status_Room in(1,4)) AND 
                //  (CASE WHEN c.Delete_Date is null THEN c.Delete_Date is null ELSE c.Id = (select c1.Id from contract c1 where c1.RoomId =  room.Id   ORDER BY c1.Id DESC LIMIT 1) END)
                // ";
                $sql = "SELECT r.Id Id,r.Room_No Room_No,r.RoomType_Id RoomType_Id,Start_date, End_Date, r.Status_Room Status_Room , 
                RoomType, RoomDetail, Room_Rates ,rt.flag flag, rs.RoomStatusDetail statusroom,CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name) As FullName,
                (SELECT br.Id  FROM bill_room br WHERE br.Room_Id = r.Id ORDER BY br.Id DESC LIMIT 1) brid,
                c.Id ConId,
                (SELECT rst.RoomStatusDetail  FROM bill_room br 
                INNER JOIN roomstatus rst ON rst.RoomStatusId = br.Br_Status 
                WHERE  br.Room_Id = r.Id and DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')  ORDER BY br.Id DESC LIMIT 1) roomstatus
                FROM room r
                INNER JOIN roomstatus rs ON r.Status_Room = rs.Id 
                INNER JOIN roomtype rt ON r.RoomType_Id = rt.Id 
                INNER JOIN contract c ON r.Id = c.RoomId
                INNER JOIN customer cm ON c.Customer_id = cm.Id
                WHERE (CASE WHEN c.Delete_Date is null THEN c.Delete_Date is null ELSE c.Id = 
                (select c1.Id from contract c1 where c1.RoomId =  r.Id  ORDER BY ID DESC LIMIT 1) END)
                
                ";
                $sqlquery = $sql;
                $query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
                $totalData = mysqli_num_rows($query);
                $totalFiltered = $totalData; 
                if( !empty($requestData['search']['value']) ) { 
                        $sql.=" and ( r.Room_No LIKE '".$requestData['search']['value']."%'  )";}
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");
                $totalFiltered = mysqli_num_rows($query); 
                $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
                $data = array();
                while( $row=mysqli_fetch_array($query) ) {  // preparing an array
                                $roomID =  $row["Id"];
                                $ConId =  $row["ConId"];
                                $brid =  $row["brid"];
                                $RoomType_Id =$row["RoomType_Id"];
                                $roomstatus = $row["roomstatus"]==null ?"ยังไม่มีการบันทึก":$row["roomstatus"];
                                $nestedData=array();                                              
                                $nestedData[] = $row["Room_No"];
                                $nestedData[] = $row["FullName"];                                
                                $print = " <a href='pages/examples/invoice-print.html' target='_blank class='btn btn-danger'><i class='fa fa-print'></i> Print</a>";
                                // if( $RoomType_Id<=3)
                                //         {$nestedData[] = "<span class=\"label label-success\">" . $row["RoomType"] . "</span>";}
                                // elseif( $RoomType_Id>=4 and $RoomType_Id<=6) 
                                //         {$nestedData[] = "<span class=\"label label-warning\">" . $row["RoomType"] . "</span>";}
                                // elseif(  $RoomType_Id>=7 and $RoomType_Id<=9) 
                                //         {$nestedData[] = "<span class=\"label label-danger\">" . $row["RoomType"] . "</span>";}
                                // elseif(  $RoomType_Id>=10) 
                                //         {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>";}
                                // else 
                                //         {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>";}
                                
                                if($row["Status_Room"]==1)
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>&nbsp;<span class=\"label label-success\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $roomstatus . "</span>" ;}
                                elseif($row["Status_Room"]==2)                                 
                                        $nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>&nbsp;<span class=\"label label-info\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $roomstatus . "</span>" ;
                                elseif($row["Status_Room"]==3)  
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>&nbsp;<span class=\"label label-warning\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $roomstatus . "</span>" ;}	
                                elseif($row["Status_Room"]==4)  
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>&nbsp;<span class=\"label label-danger\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $roomstatus . "</span>";}                                        
                                else{
                                        $nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>&nbsp;<span class=\"label label-warning\">" . $row["statusroom"] . "</span>&nbsp;<span class=\"label label-default\">" . $roomstatus . "</span>" ;}
                                        $Flag = "Save";  
                                        //$nestedData[] = $row["FullName"];                                     
                                        $nestedData[] = "<a href = 'EditRoomStatus.php?id=$roomID&brid=$brid&flag=$Flag '>เลือก</a>"; 
                                		
                                $data[] = $nestedData;
                        }
                $json_data = array(
                                "draw"            => intval( $requestData['draw'] ), 
                                "recordsTotal"    => intval( $totalData ),  // total number of records
                                "recordsFiltered" => intval( $totalFiltered ), 
                                "data"            => $data   // total data array
                                        );
                 echo json_encode($json_data); 
        
        ?>