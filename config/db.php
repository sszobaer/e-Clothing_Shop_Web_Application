<?php
function getConnection(){
    $hostName  = "localhost";
    $userName  = "root";
    $password  = "";
    $dbName = "velora";

    $conn = mysqli_connect($hostName, $userName, $password, $dbName);

    if($conn){
        // echo "Connection Successful";
        return $conn;
    } else{
        die("Connection failed: " . mysqli_connect_error());
        return false;
    }
}
?>