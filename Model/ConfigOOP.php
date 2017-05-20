<?php
/**** Class Database ****/
 Class MyDatabase
{
/**** function connect to database ****/
//function MyDatabase($strHost,$strDB,$strUser,$strPassword)
function MyDatabase()
{
// $this->objConnect = mysql_connect($strHost,$strUser,$strPassword);
// mysql_query("SET NAMES TIS620");
// $this->DB = mysql_select_db($strDB);
        error_reporting(E_ALL);
        /* Database connection start */
        $servername = "localhost";
        $username = "apt";
        $password = "apt1234";
        $dbname = "hoteldb";       
        //$mysqli = new mysqli($servername, $username, $password, $dbname);
        $conn = mysqli_connect($servername, $username, $password, $dbname)        
        or die("Connection failed: " . mysqli_connect_error());
        mysqli_set_charset($conn,"utf8");
        $this->DB = mysqli_select_db($conn,$dbname);
}

/**** function select record ****/

// function fncSelectRecordAll()
// {
// $strSQL = "SELECT * FROM $this->strTable ";
// $objQuery = @mysql_query($strSQL);
// return @mysql_fetch_array($objQuery);
// }
function fncSelectRecordAll()
{
$strSQL = "SELECT * FROM $this->strTable ";
$objQuery = @mysqli_query($strSQL);
return @mysqli_fetch_assoc($objQuery);
}


// /*** end class auto disconnect ***/
// function __destruct() {
// return @mysql_close($this->objConnect);
// }
}

?>
