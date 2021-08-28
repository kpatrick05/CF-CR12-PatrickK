<?php

require_once 'components/db_connect.php';

$sql ="SELECT * FROM trips";

    $result = mysqli_query($connect, $sql);

    $body = "";
    $nOR = mysqli_num_rows($result);

    if($nOR == 0) {
        $body = "No results";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($rows as $val) {
            $body .= '<div class=" mb-5 col col-12 col-sm-12 col-md-6 col-lg-3 d-flex align-items-stretch">
            <div class="row g-1 container-fluid card shadow-lg bg-card-color">
            <div class="";">
            <img style="width:100%; height:220px; object-fit: cover;" src=pictures/'.$val["picture"].' class="card-img-top img-fluid" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$val["location_name"].'</h5>
              <hr>
              <p class="card-text">'.$val["price"].'</p>
              <a href="update.php?id='.$val["id"].'" class="m-1 btn btn-success">Update</a>
              <a href="delete.php?id='.$val["id"].'" class="m-1 btn btn-danger">Delete</a>
              <a href="details.php?id='.$val["id"].'" class="m-1 btn btn-warning">Details</a>
              
            </div>
            </div>
            </div>
          </div>
          ';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mount Everest</title>
<?php require_once 'components/boot.php'?>

</head>
<body>

<?php require_once 'components/navbar.php' ?>


<div class="container">
    <h1 class="text-center m-5">Check Our Trips Around The World</h1>
    
    <div class="row">
    <?= $body ?>


</div>
</div>
<?php require_once'components/footer.php'; ?>
</body>
</html>