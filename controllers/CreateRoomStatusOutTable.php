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
                $sql = "SELECT Room.Id Id,room.Room_No Room_No, RoomType_Id, Start_date, End_Date, Status_Room, RoomType, RoomDetail, Room_Rates, rt.flag ,
                rs.RoomStatusDetail statusroom,CONCAT(cm.Title,' ',cm.Name, ' ',cm.Last_Name)As FullName,c.Id ConId
                FROM room 
                INNER JOIN contract c ON c.RoomId= room.Id
                INNER JOIN customer cm ON cm.Id = c.Customer_id 
                INNER JOIN roomstatus rs ON room.Status_Room = rs.Id
                INNER JOIN roomtype rt ON room.RoomType_Id = rt.Id                
                Where ( room.Status_Room in(1,4)) 
                and 
                CASE WHEN c.Delete_Date is null THEN c.Delete_Date is null ELSE c.Id = (select c1.Id from contract c1 where c1.RoomId =  room.Id  ORDER BY ID DESC LIMIT 1) END";
                $sqlquery = $sql;
                $query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
                $totalData = mysqli_num_rows($query);
                $totalFiltered = $totalData; 
                if( !empty($requestData['search']['value']) ) { 
                        $sql.=" and ( room.Room_No LIKE '".$requestData['search']['value']."%'  )";}
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");
                $totalFiltered = mysqli_num_rows($query); 
                $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
                $data = array();
                while( $row=mysqli_fetch_array($query) ) {  // preparing an array
                                $roomID =  $row["Id"];
                                $ConId =  $row["ConId"];
                                $RoomType_Id =$row["RoomType_Id"];
                                $nestedData=array();                                              
                                $nestedData[] = $row["Room_No"];
                                $nestedData[] = $row["FullName"];
                                $print = " <a href='pages/examples/invoice-print.html' target='_blank class='btn btn-danger'><i class='fa fa-print'></i> Print</a>";
                                if( $RoomType_Id<=3)
                                        {$nestedData[] = "<span class=\"label label-success\">" . $row["RoomType"] . "</span>";}
                                elseif( $RoomType_Id>=4 and$RoomType_Id<=6) 
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["RoomType"] . "</span>";}
                                elseif(  $RoomType_Id>=7 and$RoomType_Id<=9) 
                                        {$nestedData[] = "<span class=\"label label-danger\">" . $row["RoomType"] . "</span>";}
                                elseif(  $RoomType_Id>=10) 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>";}
                                else 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $row["RoomType"] . "</span>";}
                                
                                if($row["Status_Room"]==1)
                                        {$nestedData[] = "<span class=\"label label-success\">" . $row["statusroom"] . "</span>" ;}
                                elseif($row["Status_Room"]==2)                                 
                                        $nestedData[] = "<span class=\"label label-info\">" . $row["statusroom"] . "</span>" ;
                                elseif($row["Status_Room"]==3)  
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}	
                                elseif($row["Status_Room"]==4)  
                                        {
                                        $nestedData[] = "<span class=\"label label-danger\">" . $row["statusroom"] . "</span>";
                                        }                                        
                                else  
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $row["statusroom"] . "</span>" ;}
                                if($row["Status_Room"]==1 )
                                {
                                        $Flag = "Save";                                       
                                        $nestedData[] = "<center><a href = 'CreateRoomStatusOut.php?id=$roomID&ConId=$ConId&flag=$Flag '>แจ้งออก</a> </center>";
                                }
                                if($row["Status_Room"]==4 )
                                {                                                                         
                                                $Flag = "Edit";
                                                $nestedData[] = "<center><a href = 'CreateRoomStatusOut.php?id=$roomID&ConId=$ConId&flag=$Flag'>แก้ไข</center>";                  
                                }		
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