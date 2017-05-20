<?php 
	require( "Model/db_config.php");

    class config{

        public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database."; 
			exit;
			}
		}
        // SELECT DATA TABLE CONFIG TO SHOW INPUT TEXT 
        public function Showdata (){
        $sql ="SELECT * FROM configobj";
        $result =$this->db->query($sql);
        $row = $result->fetch_object();
        $count_row = $result->num_rows;
            return $row;                    
        }
        // CHECK TYPE CONFIG DATA WHEN CLICK BUTTON SAVE 
        // IF NOT HAVE DATA TYPE INSERT BUT HAVE DATA TYPE UPDATE
        public function Checktype_config($numwater,$numeletric){
            $sql ="SELECT * FROM configobj";
            $result = $this->db->query($sql);
            $count_row = $result->num_rows;           
            if ($count_row == 0){           
				$sql1="INSERT INTO configobj SET Water = $numwater, Electricity=$numeletric, Flag ='1'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;    
			}
			else {                
                $sql1 ="UPDATE configobj SET Water = $numwater, Electricity = $numeletric ";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
                return $result;
                }  
                
         }
 } 
?>
