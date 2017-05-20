    <?php
        error_reporting(E_ALL);        
        /* Database connection start */
        $servername = "localhost";
        $username = "apt";
        $password = "apt1234";
        $dbname = "hoteldb_dev";        
        $db = mysqli_connect($servername, $username, $password, $dbname)        
        or die("Connection failed: " . mysqli_connect_error());
        mysqli_set_charset($db,"utf8");       
        ?>