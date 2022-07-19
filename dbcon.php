<?php
        $hostname = "localhost";
        $user="binyedik";
        $pwd = "M824bm1xYo";
        $db = "binyedik_binyedik";
        
    $con = mysqli_connect($hostname,$user,$pwd,$db);
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>