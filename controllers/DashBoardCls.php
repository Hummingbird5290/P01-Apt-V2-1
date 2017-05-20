    <?php
   require( "Model/db_config.php");

	class DashBoard{
		
		public $db;
		public function __construct(){
			$this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
		}
       
       public function GetStatus_Room($id,$brs)
            {      
                if(empty($brs))
                {
                    $sql = "SELECT *
                    FROM room 
                    where room.Status_Room = $id
                    ";
                    $query = mysqli_query($this->db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");                    
                    return $totalData = $query->num_rows;                   
                }else 
                {
                    $sql = "SELECT *
                    FROM room 
                    LEFT JOIN bill_room br on room.Id = br.Room_Id where br.Br_Status = '$brs'
                    AND DATE_FORMAT(CAST(br.Create_Date	 as DATE), '%m/%Y') = DATE_FORMAT( CAST(NOW() as DATE), '%m/%Y')";
                    $query = mysqli_query($this->db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");                    
                    return $totalData = $query->num_rows;

                }
            }
        
        }
      
    ?>