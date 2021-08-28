<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "fswd13_cr12_mount_everest_patrickk" ;
            
$connect = new mysqli($hostname, $username, $password, $dbname);
            
// check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
    }/* else {
    echo "Connected successfully";
    } */
?>