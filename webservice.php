<?php

/****************************************
*######## RESTful WEB SERVICE ##########*
*                                         *
* Client process the request VIA URL      *
* http://address.com/webservice.php?id=1  *
* and gets the JSON result.               *
* Leave id empty to get all trips         *
*                                         *
*******************************************/

// header("Content-Type:application/json");

require_once 'components/db_connect.php';

$sql = '';


    $sql = "SELECT * FROM trips";


$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($connect);

if($result->num_rows > 0){
    response(200, "trip(s) found" , $row);
} else {
    response(400, "Invalid request", NULL);
}

// Function for delivering a JSON response
function response($status,$status_message, $array){
      
   // $response array
   $response['status']=$status;
   $response['status_message']=$status_message;
   $response['trips']=$array;

   //Generating JSON from the $response array
   $json_response=json_encode($response);

   // Outputting JSON to the client
   echo $json_response;
}

?>