    <?php
   require( "Model/db_config.php");

	class DashBoard{
		
		public $db;
		public function __construct(){
			$this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
		}
       
       public function GetStatus_Room($id)
            {       
            //$password = md5($password);
			//$sql2="SELECT uid from users WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";
			
			//checking if the username is available in the table
        	// $result = mysqli_query($this->db,$sql2);
        	// $user_data = mysqli_fetch_array($result);
        	// $count_row = $result->num_rows;

                    $sql = "SELECT *
                    FROM room where Status_Room = $id
                    ";
                    $query = mysqli_query($this->db, $sql) or die("ไม่สามารถติดต่อฐานข้อมูลได้ 1");
                   return $totalData = $query->num_rows;
            }
        
        }
    ?>