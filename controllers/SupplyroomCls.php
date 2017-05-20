<?php 
	require( "Model/db_config.php");
    class supplyroom{
        public $db;
		public function __construct(){
			// $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			// if(mysqli_connect_errno()) {
			// 	echo "Error: Could not connect to database."; 
			// exit;
			// }
            $this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
		}
        public function Getroomnotsave (){
        $sql ="SELECT * FROM room";
        $result =$this->db->query($sql);
        $row = $result->fetch_object();
        // $count_row = $result->num_rows;
            return $row; 
        }

















    }
    ?>