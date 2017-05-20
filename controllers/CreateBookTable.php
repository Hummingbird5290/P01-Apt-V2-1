  <?php
                require_once ('../Model/config.php');   
                          
                $requestData = $_REQUEST;
                $columns = array( 
                        0 => 'Room_No', 
                        //1 => 'FullName',
                        1 => 'RoomType_Id',
                        2 => 'Status_Room', 
                        //3 => 'Room_Rates',
                        3 => 'Book_Id,Sort'
                );
                $sql = "SELECT Room.Id Id,Room_No, RoomType_Id, Start_date, End_Date, Status_Room, RoomType, RoomDetail, Room_Rates, rt.flag ,
                rs.RoomStatusDetail statusroom ,Book_Id,Sort
                FROM room 
                INNER JOIN roomstatus rs ON room.Status_Room = rs.Id
                INNER JOIN roomtype rt ON room.RoomType_Id = rt.Id
                LEFT JOIN booking b ON b.Room_Id= room.Id 
                Where ( room.Status_Room <> 1  ) 
                or    (b.id is null and b.Status_Book = 0 and b.delete_by is null)";
                // and b.Status_Book = 0 
                $sqlquery = $sql;
                $query=mysqli_query($db, $sqlquery) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
                $totalData = mysqli_num_rows($query);
                $totalFiltered = $totalData; 
                if( !empty($requestData['search']['value']) ) { 
                        $sql.=" where ( Room_No LIKE '".$requestData['search']['value']."%'  )";}
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 2");
                $totalFiltered = mysqli_num_rows($query); 
                $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
                $query=mysqli_query($db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 3");
                $data = array();
                while( $row=mysqli_fetch_array($query) ) {  // preparing an array
                                $roomID =  $row["Id"];
                                $Book_Id =  $row["Book_Id"];
                                $RoomType_Id =$row["RoomType_Id"];
                                $Room_Rates =$row["Room_Rates"];
                                $nestedData=array();                                              
                                $nestedData[] = $row["Room_No"];
                                //$nestedData[] = $row["FullName"];
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
                                //$nestedData[] = $row["Room_Rates"];
                                if($row["Status_Room"]==2 or $row["Status_Room"]==4)
                                {
                                        $Flag = "Save";
                                        if(!isset($Book_Id))
                                                {$nestedData[] = "<a href = 'CreateBook.php?id=$roomID&idb=$Book_Id&flag=$Flag '>เลือก</a>";}
                                        else 
                                        {
                                                $Flag = "Edit";
                                                $nestedData[] = "<a href = 'CreateBook.php?id=$roomID&idb=$Book_Id&flag=$Flag'>แก้ไข</a>"; 
                                        }
                                
                                }else {$nestedData[] = "";}			
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