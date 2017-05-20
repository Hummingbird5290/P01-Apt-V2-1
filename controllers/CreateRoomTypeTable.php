  <?php
                require_once ('../Model/config.php');   
                          
                $requestData = $_REQUEST;
                $columns = array( 
                        0 => 'Id', 
                        //1 => 'FullName',
                        1 => 'RoomType',
                        2 => 'RoomDetail', 
                        //3 => 'Room_Rates',
                        3 => 'Room_Rates',
                        4 => 'flag'
                );
                $sql = "SELECT Id,RoomType,RoomDetail,Room_Rates,flag
                FROM roomtype WHERE flag = true ";
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
                $int = 0;
                while( $row=mysqli_fetch_array($query) ) {  // preparing an array
                                $int = $int+1;
                                $roomID =  $row["Id"];
                                $RoomType =  $row["RoomType"];
                                $RoomDetail =$row["RoomDetail"];
                                $Room_Rates =$row["Room_Rates"];
                                $nestedData=array();                                              
                                $nestedData[] = $roomID;                               
                                 if( $roomID<=3)
                                        {$nestedData[] = "<span class=\"label label-success\">" . $RoomType . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>";}
                                elseif( $roomID>=4 and $roomID<=6) 
                                        {$nestedData[] = "<span class=\"label label-warning\">" . $RoomType . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>";}
                                elseif(  $roomID>=7 and $roomID<=9) 
                                        {$nestedData[] = "<span class=\"label label-danger\">" . $RoomType . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>";}
                                elseif(  $roomID>=10) 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $RoomType . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>";}
                                else 
                                        {$nestedData[] = "<span class=\"label label-info\">" . $RoomType . "</span> <span class=\"label label-danger\">" . $Room_Rates . "฿</span>";}
                               
                                $nestedData[] = "<span class=\"label label-default\">" . $RoomDetail . "</span>" ;
                                $Flag = "Edit"; 
                                $nestedData[] = $Room_Rates;                              
                                $nestedData[] = "<a href = 'CreateRoomType.php?id=$roomID&flag=$Flag'>แก้ไข</a>";			
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