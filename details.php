<?php
    require_once 'components/db_connect.php';
    require_once 'components/RESTful.php';
    if($_GET["id"]) {
        $id = $_GET["id"];
        $sql= "SELECT * FROM trips WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
        } else {
            header("location: error.php");
        }
 
    } else {
        header("location: error.php");
    }

    $body="";

        //printing Data from Database
        $body .= '<div class=" mb-5 col col-12 d-flex align-items-stretch">
        <div class="row g-1 container-fluid card shadow-lg bg-card-color">
        <img src=pictures/'.$data["picture"].' class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">'.$data["location_name"].'</h5>
          <hr>
          <p class="card-text">Price: '.$data["price"].'</p>
          <p class="card-text">Description: '.$data["description"].'</p>
          <p class="card-text">Longitude: '.$data["longitude"] .'</p>
          <p class="card-text">Latitude: '.$data["latitude"] .'</p>
          <a href="index.php" class="btn btn-success">Go Back</a>
        </div>
      </div>
      </div>
      ';
    
     

      $text="";

//Weather API
$city= array("$data[longitude],$data[latitude]");

foreach ($city as $val) {
    $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $val . '?exclude=minutely,hourly,daily,alerts,flags';

    $result = curl_get($url);

    $weather = json_decode($result); //it turns the json into an object

    $fahrenheit= $weather->currently->temperature;//fetch the value from the temperature option

    $celsius = round(($fahrenheit - 32) * (5 / 9), 2);//convert fahrenheit into celsius
    
    $text = "
    <div class='shadow'>
    <div class='card text-center text-white weather' style='width: 30rem; font-size: 1.2rem'>

        <p class='card-title'> {$weather->timezone} </p>

        <div class='card-body'>

            <p class='card-text'> {$weather->currently->summary} </p>

            <p class='card-text'>{$celsius}°C</p>

            <p class='card-text'>{$fahrenheit}°F</p>

        </div>
        </div>
    </div>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <link rel="stylesheet" href="style.css">
    <title>Details</title>
</head>
<body>
<?php require_once'components/navbar.php'; ?>
<div class="container">
<button class="btn btn-outline-success" id="btn">Show Forecast</button><br>
<button class="btn btn-outline-danger mt-3" id="btn-hide">Hide Forecast</button>
</div>
<div class="container text-center d-flex align-items-center justify-content-center mb-4">
    <div id="forecast">
        
    </div>
    
    
    </div>
    
<div class="container text-center d-flex align-items-center justify-content-center">
    
<?=$body?>

</div>
<div class="container">
<div id="map" style="height: 500px;"></div>
</div>
<script>
var map;
//Setting up google maps API
function initMap() {
    var location = {
        lat: <?= $data["longitude"] ?>,
        lng: <?= $data["latitude"] ?>
        };

    map = new google.maps.Map(document.getElementById('map'), {

    center: location, zoom: 8

    });
    var pinpoint = new google.maps.Marker({
            position: location,
            map: map
        });

}


function forecast() {
    document.getElementById("forecast").innerHTML=` <?=$text?> <br> `; 
}
function hide() {
    document.getElementById("forecast").innerHTML=""; 
}

document.getElementById("btn").addEventListener("click", forecast);
document.getElementById("btn-hide").addEventListener("click", hide);

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>

<?php require_once'components/footer.php'; ?>
</body>
</html>