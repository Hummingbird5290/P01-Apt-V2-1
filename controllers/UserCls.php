<?php 
	require( "Model/db_config.php");

	class User{
		
		public $db;
		public function __construct(){
			$this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
			// $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);		
			// if(mysqli_connect_errno()) {echo "Error: Could not connect to database.";
			// mysqli_set_charset($this->db, "utf8");
			//mysqli_query("SET NAMES UTF8"); 
			//exit; 
			//}
		}

	/*** for registration process ***/
		public function reg_user($name,$fullname,$password,$email,$CardId){
			
			$password = md5($password);
			$sql="SELECT * FROM users WHERE uname='$name' OR uemail='$email'";
			
			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET uname = '$name' , upass = '$password' , fullname = '$fullname' , uemail = '$email' , ucardid = '$CardId'";
				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}

		/*** for EditProfile process ***/
		public function EditProfile($Name,$FullName,$Password ,$Email,$CardId,$Uid){
				$password = md5($Password);
				
				$sql1="UPDATE users SET uname='$Name',fullname='$FullName',uemail='$Email',ucardid='$CardId' WHERE uid = $Uid";				
				$result1 = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result1;
		}

		//Check pass process
		public function CheckPass($name,$password){
			$password = md5($password);
			$sql="SELECT * FROM users WHERE uname='$name' OR uemail='$email'";
			//checking if the pass is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;
			//if the pass is not in db then insert to the table
			if ($count_row > 0){return true;}
			else { return false;}
		}

		/*** for login process ***/
		public function check_login($emailusername, $password){
        	
        	$password = md5($password);
			$sql2="SELECT uid from users WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";
			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_object($result);
        	$count_row = $result->num_rows;
			//$name = $user_data->uname;
	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $Login =  $_SESSION['Login'];
				$Username =  $_SESSION['Username'];
				$UserEmail =  $_SESSION['UserEmail'];
				$UserFullname =  $_SESSION['UserFullname'];
				$UserGroup =  $_SESSION['UserGroup'];                  
	            return true;
	        }
	        else{
			    return false;
			}
    	}
		//Get user table where login
		public function GetUser($name, $password)        
        {
			$password = md5($password);
			$sql="SELECT * from users WHERE uemail='$emailusername' or uname='$name' and upass='$password'";	
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);        				
        	return $user_data;			 
		}
		//Get profile data 
		public function GetProfile($name)        
        {			
			$sql="SELECT * from users WHERE  uname='$name' ";	
			$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_object($result);        				
        	return $user_data;			 
		}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($uid){
    		$sql3="SELECT fullname FROM users WHERE uid = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}
  
    	/*** starting the session ***/
	    public function get_session_login(){    
	        return $_SESSION['login'];
	    }

		public function get_session_name(){    
	        return $_SESSION['Username'];
	    }


	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>