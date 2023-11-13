<?php
    $server = "localhost";
    $dbName = "pos";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($server, $username, $password, $dbName); 
    if(mysqli_connect_errno())
    {
        echo "Failed to Connect ot MYSQL: ".mysqli_connect_error();
        exit();
    }
?>