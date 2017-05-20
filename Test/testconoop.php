<?php
require('../Model/ConfigOOP.php');

//**** New class database ****//
// $strHost = "localhost";
// $strDB = "myDB";
// $strUser = "root";
// $strPassword = "rootpassword";
// $clsMyDB = new MyDatabase($strHost,$strDB,$strUser,$strPassword);
$clsMyDB = new MyDatabase();
//**** Call to function select record ****//
$clsMyDB->strTable = "customer";
$objSelect = $clsMyDB->fncSelectRecordAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>testconobj</title>
</head>
<body>
    <?php 
    require_once ('../Model/config.php');
        $result = $conn->query("SELECT * FROM register;");
        $row = $result->fetch_object();
        $id = $row->Id;
        $user = $row->Name;
        $pass = $row->Password;
        
        echo "<pre>" .print_r($user)."</pre>";
     ?>
</body>
</html>
